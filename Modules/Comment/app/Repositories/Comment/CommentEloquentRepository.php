<?php

namespace Modules\Comment\Repositories\Comment;

use Modules\Comment\Models\Comment;

class CommentEloquentRepository implements CommentEloquentInterface
{
    public function store(array $data): Comment
    {
        return Comment::create($data);
    }

    public function forCommentable(string $type, int $id)
    {
        return Comment::where('commentable_type', $type)
            ->where('commentable_id', $id)
            ->with('user')
            ->get();
    }
}
