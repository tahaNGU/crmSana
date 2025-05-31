<?php

namespace Modules\Task\Services;

use Modules\Task\Repositories\Task\TaskEloquentInterface;

class TaskService
{
    public function __construct(
        private TaskEloquentInterface $taskEloquentRepository
    )
    {
    }

    public function storeTask(array $data): array
    {
        return $this->taskEloquentRepository->store(data: $data);
    }

    public function deleteTask(array $where): bool
    {
        return $this->taskEloquentRepository->deleteWhere(where: $where);
    }

    public function updateTask(array $where, array $data): bool
    {
        return $this->taskEloquentRepository->updateWhere(data: $data, where: $where);
    }

    public function findTask(array $where): array
    {
        return $this->taskEloquentRepository->findWhere(where: $where);
    }

    public function getTask(array $where): array
    {
        return $this->taskEloquentRepository->getWhere(where: $where);
    }
}
