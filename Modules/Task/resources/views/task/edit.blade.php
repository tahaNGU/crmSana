@extends('base::layouts.master')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-6" style="margin: 10% 26% 0 0">
                    <div class="card">
                        <div class="card-header text-left d-flex justify-content-end">
                            <h4 class="text-left d-block">Edit Task</h4>
                            @if(!empty($task["file"]))
                                <form action="{{route("download",["path"=>$task["file"]])}}" method="post">
                                    @csrf
                                    <button class="btn btn-primary btn-sm" type="submit">download</button>
                                </form>
                            @endif
                        </div>
                        <div class="card-body" style="padding:20px !important">
                            <form action="{{route("task.update",$task["id"])}}" method="post" enctype="multipart/form-data">
                                @method("PUT")
                                @csrf
                                @if(session()->has('message'))
                                    <div class="alert alert-success">{{session()->get('message')}}</div>
                                @endif
                                <div class="form-group col-12 col-sm-12">
                                    <label for="title">title</label>
                                    <input type="text" placeholder="Please Enter Your title" name="title" value="{{$task["title"]}}" class="form-control">
                                    @error("title")<span class="text text-danger text-left d-block">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group col-12 col-sm-12">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        @foreach($status as $item)
                                            <option value="{{$item}}" @if($item == $task["status"]) selected @endif>{{$item}}</option>
                                        @endforeach
                                    </select>
                                    @error("status")<span class="text text-danger text-left d-block">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group col-12 col-sm-12">
                                    <label for="file">File</label>
                                    <input type="file" placeholder="Please Enter Your file" name="file" class="form-control">
                                    @error("file")<span class="text text-danger text-left d-block">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group col-12 col-sm-12">
                                    <label for="Note">Note</label>
                                    <textarea name="note" id="" cols="30" rows="10" class="form-control">{{$task["note"]}}</textarea>
                                    @error("note")<span class="text text-danger text-left d-block">{{$message}}</span>@enderror
                                </div>
                                <div class="col-12 d-flex">
                                    <div class="form-group col-6 col-sm-6">
                                        <label for="start_date">Start At: ({{$task["started_at"]}})</label>
                                        <input type="date" name="started_at" class="form-control" value="{{$task["started_at"]}}">
                                        @error("start_date")<span class="text text-danger text-left d-block">{{$message}}</span>@enderror
                                    </div>
                                    <div class="form-group col-6 col-sm-6">
                                        <label for="start_date_hour">Hour Date Start:</label>
                                        <select name="start_date_hour" class="form-control" id="">
                                            @for($i=1;$i<=24;$i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                        @error("start_date_hour")<span class="text text-danger text-left d-block">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-12 d-flex">
                                    <div class="form-group col-6 col-sm-6">
                                        <label for="start_date">Finished At: ({{$task["finished_at"]}})</label>
                                        <input type="date" name="finished_at" class="form-control" value="{{old("finished_at")}}">
                                        @error("finished_at")<span class="text text-danger text-left d-block">{{$message}}</span>@enderror
                                    </div>
                                    <div class="form-group col-6 col-sm-6">
                                        <label for="hour_date">Hour Date End:</label>
                                        <select name="end_date_hour" class="form-control" id="">
                                            @for($i=1;$i<=24;$i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                        @error("end_date_hour")<span class="text text-danger text-left d-block">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-12 my-3">
                                    <label for="">users:</label>
                                    <select name="users[]" class="form-control" multiple id="" style="height: unset !important;">
                                        @foreach($users as $user)
                                            <option value="{{$user["id"]}}" @if(in_array($user["id"],$task['userIds'])) selected @endif>{{$user["name"]}}</option>
                                        @endforeach
                                    </select>
                                    @error("users")<span class="text text-danger text-left d-block">{{$message}}</span>@enderror
                                </div>
                                <div class="col-12 my-3">
                                    <label for="">category:</label>
                                    <select name="categories[]" class="form-control" id="categories" style="height: unset !important;" multiple>
                                        @foreach($categories as $category)
                                            <option value="{{$category["id"]}}" @if(in_array($category["id"],$task['categoryIds'])) selected @endif>{{$category["title"]}}</option>
                                        @endforeach
                                    </select>
                                    @error("categories")<span class="text text-danger text-left d-block">{{$message}}</span>@enderror
                                </div>
                                <button class="btn btn-primary btn sm" type="submit">submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
