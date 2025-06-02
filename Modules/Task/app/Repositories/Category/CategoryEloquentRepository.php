<?php

namespace Modules\Task\Repositories\Category;

use Modules\Task\Models\Category;

class CategoryEloquentRepository implements CategoryEloquentInterface
{
    public function store(array $data): array
    {
        return Category::create($data)->toArray();
    }

    public function updateWhere(array $data, array $where): bool
    {
        return Category::where($where)->update($data);
    }

    public function getWhere(array $where): array
    {
        return Category::where($where)->get()->toArray();
    }

    public function findWhere(array $where): array
    {
        return Category::where($where)->first()->toArray();
    }

    public function deleteWhere(array $where): bool
    {
        return Category::where($where)->delete();
    }
}
