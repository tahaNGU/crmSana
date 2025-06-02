<?php

namespace Modules\User\Services;

use Illuminate\Support\Facades\Hash;
use Modules\User\Repositories\User\UserEloquentInterface;

class UserService
{
    public function __construct(
        private UserEloquentInterface $userEloquent
    )
    {

    }

    public function storeUser(array $data): array
    {
        return $this->userEloquent->store(data: $data);
    }

    public function deleteUser(array $where): bool
    {
        return $this->userEloquent->deleteWhere(where: $where);
    }

    public function updateUser(array $where, array $data): bool
    {
        return $this->userEloquent->updateWhere(data: $data, where: $where);
    }

    public function findUser(array $where): array
    {
        return $this->userEloquent->findWhere(where: $where);
    }

    public function getUser(array $where=[]): array
    {
        return $this->userEloquent->getWhere(where: $where);
    }

    public function loginCheck(array $user,array $data):bool
    {
        return $user && Hash::check($data["password"],$user["password"]);
    }
}
