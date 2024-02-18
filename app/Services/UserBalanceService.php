<?php

namespace App\Services;

use App\Models\UserBalanсe;
use App\Services\Interfaces\UserBalanceInterface;

class UserBalanceService implements UserBalanceInterface
{
    /**
     * Создаем новый баланс у пользователя
     * @param array $info
     * @return UserBalanсe|null
     */
    public function create(array $info): ?UserBalanсe
    {
        return UserBalanсe::create($info);
    }

    /**
     * Получаем баланс по id пользователя
     * @param int $id
     * @return UserBalanсe|null
     */
    public function getBalanceByUserId(int $user_id): ?UserBalanсe
    {
        return UserBalanсe::where('user_id', $user_id)->first();
    }
}
