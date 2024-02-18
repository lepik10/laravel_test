<?php

namespace App\Observers;

use App\Models\UserOperation;
use App\Services\Interfaces\UserBalanceInterface;

class UserOperationObserver
{
    public function __construct(
        private UserBalanceInterface $userBalanceService
    ) {}

    /**
     * Handle the UserOperation "created" event.
     */
    public function created(UserOperation $userOperation): void
    {
        $balance = $this->userBalanceService->getBalanceByUserId($userOperation->user_id);
        $balance->update([
            'amount' => (float)$balance->amount + (float)$userOperation->amount
        ]);
    }

    /**
     * Handle the UserOperation "updated" event.
     */
    public function updated(UserOperation $userOperation): void
    {
        //
    }

    /**
     * Handle the UserOperation "deleted" event.
     */
    public function deleted(UserOperation $userOperation): void
    {
        //
    }

    /**
     * Handle the UserOperation "restored" event.
     */
    public function restored(UserOperation $userOperation): void
    {
        //
    }

    /**
     * Handle the UserOperation "force deleted" event.
     */
    public function forceDeleted(UserOperation $userOperation): void
    {
        //
    }
}
