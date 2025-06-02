<?php

namespace Modules\Task\Repositories\Task;

interface TaskEloquentInterface
{
    public function store(array $data):array;
    public function updateWhere(array $data,array $where):bool;
    public function getWhere(array $where):array;
    public function findWhere(array $where):array;
    public function deleteWhere(array $where):bool;
    public function calculateStatusPercentages(array $where):array;
}
