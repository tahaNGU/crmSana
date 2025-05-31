<?php

namespace Modules\Task\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Task\Services\TaskService;

class TaskController extends Controller
{
    public function __construct(
        private TaskService $taskService
    )
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('task::task.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task::task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {

    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('task::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('task::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {}
}
