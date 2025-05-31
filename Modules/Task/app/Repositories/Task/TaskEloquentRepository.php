<?php

namespace Modules\Task\Repositories\Task;

use Modules\Task\Models\Task;

class TaskEloquentRepository implements TaskEloquentInterface
{
    public function store(array $data): array
    {
        return Task::create($data)->toArray();
    }

    public function updateWhere(array $data, array $where): bool
    {
        return Task::where($where)->update($data);
    }

    public function getWhere(array $where): array
    {
        return Task::where($where)->get();
    }

    public function findWhere(array $where): array
    {
        return Task::where($where)->first()->toArray();
    }

    public function deleteWhere(array $where): bool
    {
        return Task::where($where)->delete();
    }
}
