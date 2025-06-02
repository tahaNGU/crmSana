<?php

namespace Modules\Task\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Comment\Models\Comment;

class Task extends Model
{
    use HasFactory,SoftDeletes;

    protected $appends = [
        "userNames",
        "categoryTitles",
        "userIds",
        "categoryIds",
    ];
    protected $fillable = [
        "title",
        "note",
        "file",
        "status",
        "started_at",
        "finished_at",
        "status",
        "file",
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, "task_category");
    }

    public function users()
    {
        return $this->belongsToMany(User::class, "task_user");
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function getUserNamesAttribute()
    {
        $users = $this->users->pluck('name')->toArray();
        if (!empty($users)) {
            return implode(",", $users);
        }
    }
    public function getUserIdsAttribute()
    {
        return $this->users->pluck('id')?->toArray() ?? [];
    }
    public function getCategoryIdsAttribute()
    {
        return $this->categories->pluck('id')->toArray() ?? [];
    }

    public function getCategoryTitlesAttribute()
    {
        $categories = $this->categories->pluck('title')->toArray();
        if (!empty($categories)) {
            return implode(",", $categories);
        }
    }

    public function scopeFilter(Builder $builder, array $params)
    {
        if (!auth()->user()->is_admin) {
            $builder->whereHas('users', function ($query) use ($params) {
                $query->where('users.id', auth()->user()->id);
            });
        }
        if (isset($params["status"]) && !empty($params["status"])) {
            $builder->where("status", $params["status"]);
        }
        if (isset($params["title"]) && !empty($params["title"])) {
            $builder->where("title", "like", "%{$params['title']}%");
            $builder->where("note", "like", "%{$params['title']}%");
        }
        if (!empty($params["category"])) {
            $builder->whereHas('categories', function ($query) use ($params) {
                $query->where('categories.id', $params['category']);
            });
        }
        if (!empty($params["az"]) && !empty($params["ta"])) {
            $builder->whereBetween('started_at', [$params['az'], $params['ta']])
                ->whereBetween('finished_at', [$params['az'], $params['ta']]);
        } elseif (!empty($params['az'])) {
            $builder->where('started_at', '>=', $params['az'])
                ->where('finished_at', '>=', $params['az']);
        } elseif (!empty($params['ta'])) {
            $builder->where('started_at', '<=', $params['ta'])
                ->where('finished_at', '<=', $params['ta']);
        }
    }
}
