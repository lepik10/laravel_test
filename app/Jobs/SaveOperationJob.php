<?php

namespace App\Jobs;

use App\Services\Interfaces\UserOperationInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SaveOperationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public $user_id,
        public $amount,
        public $description
    ){}

    /**
     * Execute the job.
     */
    public function handle(UserOperationInterface $userOperationService): void
    {
        $userOperationService->create([
            'user_id' => $this->user_id,
            'amount' => $this->amount,
            'description' => $this->description
        ]);
    }
}
