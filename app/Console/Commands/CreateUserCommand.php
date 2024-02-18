<?php

namespace App\Console\Commands;

use App\Services\Interfaces\UserInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-user {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Создание нового пользователя';

    /**
     * Execute the console command.
     */

    public function handle(UserInterface $userService)
    {
        $info = [
            'email' => trim($this->argument('email')),
            'password' => trim($this->argument('password'))
        ];

        $validator = Validator::make([
            'email' => $info['email'],
            'password' => $info['password']
        ], [
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required']
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                echo $this->error($error);
            }
        } else {
            $userService->create($info);
            echo 'Пользователь успешно создан';
        }
    }
}
