<?php

namespace Modules\Comment\Services;

use Modules\Comment\Repositories\Comment\CommentEloquentInterface;
use Modules\Task\Models\Task;

class CommentService
{
    public function __construct(protected CommentEloquentInterface $repository)
    {
    }

    /**
     * @param array $data
     * @return \Modules\Comment\Models\Comment
     */
    public function store(array $data)
    {
        return $this->repository->store($data);
    }

    /**
     * @param $type
     * @param $id
     * @return mixed
     */
    public function getCommentsFor($type, $id)
    {
        $type=$this->mapTypeToClass($type);
        return $this->repository->forCommentable($type, $id);
    }

    /**
     * @param string $type
     * @return string|null
     */
    private function mapTypeToClass(string $type): ?string
    {
        return match ($type) {
            'task' => Task::class,
            default => null,
        };
    }
}
