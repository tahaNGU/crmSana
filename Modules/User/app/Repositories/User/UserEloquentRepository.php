<?php

namespace Modules\User\Repositories\User;

use App\Models\User;

class UserEloquentRepository implements UserEloquentInterface
{
    public function store(array $data): array
    {
        return User::create($data)->toArray();
    }

    public function updateWhere(array $data, array $where): bool
    {
        return User::where($where)->update($data);
    }

    public function getWhere(array $where): array
    {
        return User::where($where)->get()->toArray();
    }

    public function findWhere(array $where): array
    {
        return User::where($where)->first()->toArray();
    }

    public function deleteWhere(array $where): bool
    {
        return User::where($where)->delete();
    }
}
