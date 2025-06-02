<?php

namespace Modules\Task\Http\Controllers;

use App\Facades\DelayedStorage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Base\Constant\LogTitles;
use Modules\Base\Helpers\LogHelper;
use Modules\Comment\Http\Requests\CommentRequest;
use Modules\Comment\Services\CommentService;
use Modules\Task\Enums\Status;
use Modules\Task\Http\Requests\StoreTaskRequest;
use Modules\Task\Http\Requests\UpdateTaskRequest;
use Modules\Task\Services\CategoryTaskService;
use Modules\Task\Services\TaskService;
use Modules\User\Services\UserService;

class TaskController extends Controller
{
    private string $view;

    public function __construct(
        private TaskService         $taskService,
        private UserService         $userService,
        private CategoryTaskService $categoryService,
        private CommentService $commentService
    )
    {
        $this->view = "task::task.";
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tasks = $this->taskService->getTask(where: $request->all());
        $categories = $this->categoryService->getCategoryTask();
        $status = array_column(Status::cases(), 'value');
        $usagePresent = $this->taskService->calculateStatusPercentages($request->all());
        return view($this->view . 'list', [
            'tasks' => $tasks,
            'categories' => $categories,
            'status' => $status,
            'usagePresent' => $usagePresent
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = $this->userService->getUser(where: [["is_admin", "0"]]);
        $categories = $this->categoryService->getCategoryTask();
        return view($this->view . 'create', [
            "users" => $users,
            "categories" => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        if ($request->has("file")) {
            $file = DelayedStorage::create(
                $request->file('file'),
                "files" . "/" . auth()->user()->id
            );
        }
        $task = $this->taskService->storeTask(
            data: $request->validated(),
            path: $file?->path() ?? ""
        );
        if ($request->has("file")) {
            $file->store();
        }
        LogHelper::LogMessage(
            title: LogTitles::LOG_CREATED,
            message: "New Task Created",
            info: $task
        );
        return back()->with("message", "Task Created Successfully");
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $task = $this->taskService->findTask(where: ["id" => $id]);
        $comments=$this->commentService->getCommentsFor(type:"task",id:$id);
        return view($this->view . 'show', [
            "task" => $task,
            "comments" => $comments,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $task = $this->taskService->findTask(where: ["id" => $id]);
        $users = $this->userService->getUser(where: [["is_admin", "0"]]);
        $categories = $this->categoryService->getCategoryTask();
        $status = array_column(Status::cases(), 'value');
        return view($this->view . 'edit', [
            "task" => $task,
            "users" => $users,
            "status" => $status,
            "categories" => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, $id)
    {
        if ($request->has("file")) {
            $file = DelayedStorage::create(
                $request->file('file'),
                "files" . "/" . auth()->user()->id
            );
        }
        $this->taskService->updateTask(
            where: ['id' => $id],
            data: $request->validated(),
            path: $file?->path() ?? ""
        );
        if ($request->has("file")) {
            $file->store();
        }
        LogHelper::LogMessage(
            title: LogTitles::LOG_EDIT,
            message: "Task Updated",
            info: ['name' => auth()->user()->name]
        );
        return back()->with("message", "Task Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->taskService->deleteTask(where: ['id' => $id]);
        LogHelper::LogMessage(
            title: LogTitles::LOG_DELETE,
            message: "Task Deleted Success ",
            info: ['name' => auth()->user()->name]
        );
        return back()->with("message", "Task Deleted Successfully");
    }

    public function addComment(CommentRequest $request, int $task)
    {
        $data = $request->validated();
        if ($request->has("file")) {
            $file = DelayedStorage::create(
                $request->file('file'),
                "files" . "/" . auth()->user()->id
            );
            $data["file"] = $file->path();
        }
        if ($request->has("file")) {
            $file->store();
        }
        $this->taskService->addCommentToTask(
            taskId: $task,
            data: $data
        );
        LogHelper::LogMessage(
            title: LogTitles::LOG_COMMENT,
            message: "New Comment Created",
        );
        return back()->with("message", "Comment Created Successfully");
    }

}
