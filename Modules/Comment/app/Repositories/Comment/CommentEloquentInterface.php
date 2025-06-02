<?php

namespace Modules\Comment\Repositories\Comment;

use Modules\Comment\Models\Comment;

interface CommentEloquentInterface
{
    public function store(array $data): Comment;

    public function forCommentable(string $type, int $id);
}
