<?php

namespace Modules\Task\Services;

use Modules\Task\Repositories\Category\CategoryEloquentInterface;

class CategoryTaskService
{
    public function __construct(
        private CategoryEloquentInterface $categoryEloquent
    )
    {

    }

    public function storeCategoryTask(array $data): array
    {
        return $this->categoryEloquent->store(data: $data);
    }

    public function deleteCategoryTask(array $where): bool
    {
        return $this->categoryEloquent->deleteWhere(where: $where);
    }

    public function updateCategoryTask(array $where, array $data): bool
    {
        return $this->categoryEloquent->updateWhere(data: $data, where: $where);
    }

    public function findCategoryTask(array $where): array
    {
        return $this->categoryEloquent->findWhere(where: $where);
    }

    public function getCategoryTask(array $where=[]): array
    {
        return $this->categoryEloquent->getWhere(where: $where);
    }
}
