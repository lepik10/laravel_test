<?php

namespace App\Services\Interfaces;

use App\Models\UserBalanсe;

interface UserBalanceInterface
{
    /**
     * Создаем новый баланс у пользователя
     * @param array $info
     * @return UserBalanсe|null
     */
    public function create(array $info): ?UserBalanсe;

    /**
     * Получаем баланс по id пользователя
     * @param int $id
     * @return UserBalanсe|null
     */
    public function getBalanceByUserId(int $user_id): ?UserBalanсe;
}
