<?php

namespace Modules\Task\Repositories\Task;

use Illuminate\Support\Facades\DB;
use Modules\Task\Models\Task;

class TaskEloquentRepository implements TaskEloquentInterface
{
    /**
     * @param array $data
     * @return void
     */
    public function store(array $data): array
    {
        $task = Task::create($data);
        $task->categories()->sync($data["categories"]);
        $task->users()->sync($data["users"]);
        return $task->toArray();
    }

    /**
     * @param array $data
     * @param array $where
     * @return bool
     */
    public function updateWhere(array $data, array $where): bool
    {
        $task = Task::where($where)->first();
        $task->categories()->sync($data["categories"]);
        $task->users()->sync($data["users"]);
        return $task->update($data);
    }

    /**
     * @param array $where
     * @return array
     */
    public function getWhere(array $where): array
    {
        return Task::filter($where)->with(["users", "categories"])->orderBy("id", "desc")->get()->toArray();
    }

    /**
     * @param array $where
     * @return array
     */
    public function findWhere(array $where): array
    {
        return Task::where($where)->with(["users", "categories"])->first()->toArray();
    }

    /**
     * @param array $where
     * @return bool
     */
    public function deleteWhere(array $where): bool
    {
        return Task::where($where)->delete();
    }

    /**
     * @param array $where
     * @return array
     */
    public function calculateStatusPercentages(array $where): array
    {
        $tasksQuery = Task::filter($where);
        $total = $tasksQuery->count();
        $statusCounts = Task::filter($where)
            ->select('status', DB::raw('COUNT(*) as count'))
            ->groupBy('status')
            ->pluck('count', 'status');

        $statuses = ['todo', 'in_progress', 'done'];
        $distribution = [];

        foreach ($statuses as $status) {
            $count = $statusCounts[$status] ?? 0;
            $present = $total > 0 ? round(($count / $total) * 100, 2) : 0;
            $distribution[$status] = [
                'count' => $count,
                'percentage' => floatval($present)
            ];
        }

        return $distribution;
    }
}
