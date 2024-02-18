<?php

namespace App\Services;

use App\Models\User;
use App\Services\Interfaces\UserInterface;

class UserService implements UserInterface
{
    /**
     * Создание пользователя по полям email и password
     * @param array $info
     * @return User|null
     */
    public function create(array $info): ?User
    {
        return User::create($info);
    }

    /**
     * Получение пользователя по email
     * @param string $email
     * @return User|null
     */
    public function getByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }
}
