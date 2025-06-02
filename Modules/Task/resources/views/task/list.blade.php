@extends('base::layouts.master')

@section('content')
    @dump($usagePresent)
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-9" style="margin: 10% 17% 0 0">
                    <form action="">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <lable>:Title</lable>
                                    <input type="text" name="title" class="form-control"
                                           value="{{request()->get("title")}}">
                                </div>
                                <div class="form-group">
                                    <lable>:Category</lable>
                                    <select name="category" id="category" class="form-control">
                                        <option value="">Please Choose</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category["id"]}}"
                                                    @if(request()->get("category")==$category["id"]) selected @endif>{{$category["title"]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <lable>:Az</lable>
                                    <input type="date" name="az" value="{{request()->get("az") ?? ""}}"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <lable>:Ta</lable>
                                    <input type="date" name="ta" value="{{request()->get("ta") ?? ""}}"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <lable>:Status</lable>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">Please Choose</option>
                                        @foreach($status as $item)
                                            <option value="{{$item}}"
                                                    @if(request()->get("status") == $item) selected @endif>{{$item}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                    <div class="card">
                        <div class="card-header text-left d-flex justify-content-end">
                            <h4 class="text-left d-block">Create Task</h4>
                        </div>
                        <div class="card-body" style="padding:20px !important">
                            @if(isset($tasks[0]))
                                <table class="table table-bordered table-striped table-md text-center">
                                    <thead>
                                    <tr>
                                        <th>title</th>
                                        <th>started at</th>
                                        <th>finished at</th>
                                        <th>status</th>
                                        <td>users</td>
                                        <td>category</td>
                                        <td>#</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tasks as $key => $task)
                                        <tr>
                                            <td style="border-color: #ddd;">{{$task["title"]}}</td>
                                            <td style="border-color: #ddd;">{{$task["started_at"]}}</td>
                                            <td style="border-color: #ddd;">{{$task["finished_at"]}}</td>
                                            <td style="border-color: #ddd;">{{$task["status"]}}</td>
                                            <td style="border-color: #ddd;">{{$task["userNames"] ?? "-"}}</td>
                                            <td style="border-color: #ddd;">{{$task["categoryTitles"] ?? "-"}}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{route("task.edit",$task["id"])}}" class="btn btn-primary btn-sm mx-2">Edit</a>
                                                    <a href="{{route("task.show",$task["id"])}}" class="btn btn-primary btn-sm">Show</a>
                                                    <form action="{{ route('task.destroy', $task['id']) }}" method="POST" onsubmit="return confirm('آیا از حذف مطمئن هستید؟');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm mx-2">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-danger">Result Not Found</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
