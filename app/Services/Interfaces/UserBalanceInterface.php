<?php

namespace App\Services\Interfaces;

use App\Models\UserBalance;

interface UserBalanceInterface
{
    /**
     * Создаем новый баланс у пользователя
     * @param array $info
     * @return UserBalance|null
     */
    public function create(array $info): ?UserBalance;

    /**
     * Получаем баланс по id пользователя
     * @param int $id
     * @return UserBalance|null
     */
    public function getBalanceByUserId(int $user_id): ?UserBalance;
}
