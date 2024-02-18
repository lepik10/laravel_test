<?php

namespace App\Services\Interfaces;

use App\Models\User;

interface UserInterface
{
    /**
     * Создание пользователя по полям email и password
     * @param array $info
     * @return User|null
     */
    public function create(array $info): ?User;

    /**
     * Получение пользователя по email
     * @param string $email
     * @return User|null
     */
    public function getByEmail(string $email): ?User;
}
