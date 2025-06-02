<?php

namespace Modules\Task\Services;

use Carbon\Carbon;
use Modules\Comment\Repositories\Comment\CommentEloquentInterface;
use Modules\Task\Models\Task;
use Modules\Task\Repositories\Task\TaskEloquentInterface;

class TaskService
{

    /**
     * @param TaskEloquentInterface $taskEloquentRepository
     * @param CommentEloquentInterface $commentEloquentRepository
     */
    public function __construct(
        private TaskEloquentInterface $taskEloquentRepository,
        private CommentEloquentInterface $commentEloquentRepository
    )
    {
    }

    /**
     * @param array $data
     * @param string $path
     * @return void
     */
    public function storeTask(array $data, string $path): array
    {
        $data['started_at'] = Carbon::createFromFormat('Y-m-d H', $data['started_at'] . ' ' . $data['start_date_hour']);
        $data['finished_at'] = Carbon::createFromFormat('Y-m-d H', $data['finished_at'] . ' ' . $data['end_date_hour']);
        $data["file"] = $path;
        return $this->taskEloquentRepository->store(data: $data);
    }

    /**
     * @param array $where
     * @return bool
     */
    public function deleteTask(array $where): bool
    {
        return $this->taskEloquentRepository->deleteWhere(where: $where);
    }

    /**
     * @param array $where
     * @param array $data
     * @param string $path
     * @return bool
     */
    public function updateTask(array $where, array $data, string $path = ""): bool
    {
        $data['started_at'] = Carbon::createFromFormat('Y-m-d H', $data['started_at'] . ' ' . $data['start_date_hour']);
        $data['finished_at'] = Carbon::createFromFormat('Y-m-d H', $data['finished_at'] . ' ' . $data['end_date_hour']);
        unset($data["start_date_hour"], $data["end_date_hour"]);
        if (!empty($path)) {
            $data['file'] = $path;
        }
        return $this->taskEloquentRepository->updateWhere(data: $data, where: $where);
    }

    /**
     * @param array $where
     * @return array
     */
    public function findTask(array $where): array
    {

        return $this->taskEloquentRepository->findWhere(where: $where);
    }

    /**
     * @param array $where
     * @return array
     */
    public function getTask(array $where = []): array
    {
        return $this->taskEloquentRepository->getWhere(where: $where);
    }

    /**
     * @param array $where
     * @return array
     */
    public function calculateStatusPercentages(array $where):array
    {
        return $this->taskEloquentRepository->calculateStatusPercentages(where: $where);
    }

    public function addCommentToTask(int $taskId, array $data)
    {
        $data['commentable_type'] = Task::class;
        $data['commentable_id'] = $taskId;
        $data['user_id'] = auth()->user()->id;
        return $this->commentEloquentRepository->store($data);
    }
}
