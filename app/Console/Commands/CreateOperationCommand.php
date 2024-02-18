<?php

namespace App\Console\Commands;

use App\Jobs\SaveOperationJob;
use App\Services\Interfaces\UserBalanceInterface;
use App\Services\Interfaces\UserInterface;
use App\Services\Interfaces\UserOperationInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class CreateOperationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-operation {email} {amount} {description?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Создание операции по логину пользователя';

    /**
     * Execute the console command.
     */
    public function handle(UserInterface $userService,
                           UserBalanceInterface $userBalanceService,
                           UserOperationInterface $userOperationService)
    {
        $email = trim($this->argument('email'));
        $amount = (float)trim($this->argument('amount'));
        $description = trim($this->argument('description'));

        $validator = Validator::make([
            'email' => $email,
            'amount' => $amount,
            'description' => $description
        ], [
            'email' => ['required', 'email', 'exists:users'],
            'amount' => ['required', 'numeric', 'not_in:0'],
            'description' => ['nullable', 'max:255']
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                echo $this->error($error);
            }
        } else {
            $user = $userService->getByEmail($email);
            $userBalance = $userBalanceService->getBalanceByUserId($user->id);

            if(((float)$userBalance->amount + $amount) < 0 ) {
                echo 'Баланс не должен быть меньше нуля';
                return;
            }

            dispatch(new SaveOperationJob($user->id, $amount, $description))->delay(now()->addMinutes(1));

            echo 'Операция успешно создана';
        }
    }
}
