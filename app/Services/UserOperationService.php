<?php

namespace App\Services;

use App\Models\UserOperation;
use App\Services\Interfaces\UserOperationInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class UserOperationService implements UserOperationInterface
{
    /**
     * Создание новой операции
     * @param array $info
     * @return UserOperation|null
     */
    public function create(array $info): ?UserOperation
    {
        return UserOperation::create($info);
    }

    /**
     * Получение операций по id пользователя с количеством записей на странице и возможным поиском
     * @param int $user_id
     * @param int $per_page
     * @param string|string $search
     * @return LengthAwarePaginator|null
     */
    public function getOperationsByUserId(int $user_id, int $per_page, string $search = ''): ?LengthAwarePaginator
    {
        $builder = UserOperation::where('user_id', $user_id)->orderBy('created_at', 'DESC');
        if ($search) {
            $builder = $builder->where('description', 'like', "%{$search}%");
        }
        return $builder->paginate($per_page);
    }

    /**
     * Получение операций по id пользователя с лимитом
     * @param int $user_id
     * @param int $limit
     * @return Collection|null
     */
    public function getOperationsByUserIdWithLimit(int $user_id, int $limit = 5) : ?Collection
    {
        return UserOperation::where('user_id', $user_id)->orderBy('created_at', 'DESC')->limit($limit)->get();
    }
}
