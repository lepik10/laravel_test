<?php

namespace App\Services\Interfaces;

use App\Models\UserOperation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserOperationInterface
{
    /**
     * Создание новой операции
     * @param array $info
     * @return UserOperation|null
     */
    public function create(array $info): ?UserOperation;

    /**
     * Получение операций по id пользователя с количеством записей на странице и возможным поиском
     * @param int $user_id
     * @param int $per_page
     * @param string|string $search
     * @return LengthAwarePaginator|null
     */
    public function getOperationsByUserId(int $user_id, int $per_page, string $search = ''): ?LengthAwarePaginator;

    /**
     * Получение операций по id пользователя с лимитом
     * @param int $user_id
     * @param int $limit
     * @return Collection|null
     */
    public function getOperationsByUserIdWithLimit(int $user_id, int $limit = 5) : ?Collection;
}
