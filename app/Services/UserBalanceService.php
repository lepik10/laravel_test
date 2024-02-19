<?php

namespace App\Services;

use App\Models\UserBalance;
use App\Services\Interfaces\UserBalanceInterface;

class UserBalanceService implements UserBalanceInterface
{
    /**
     * Создаем новый баланс у пользователя
     * @param array $info
     * @return UserBalance|null
     */
    public function create(array $info): ?UserBalance
    {
        return UserBalance::create($info);
    }

    /**
     * Получаем баланс по id пользователя
     * @param int $id
     * @return UserBalance|null
     */
    public function getBalanceByUserId(int $user_id): ?UserBalance
    {
        return UserBalance::where('user_id', $user_id)->first();
    }
}
