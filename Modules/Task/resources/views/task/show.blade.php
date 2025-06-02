@extends('base::layouts.master')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-6" style="margin: 10% 26% 0 0">
                    @if(session()->has('message'))
                        <div class="alert alert-success">{{session()->get('message')}}</div>
                    @endif
                    <div class="card">
                        <div class="card-header text-left d-flex justify-content-end flex-column">
                            <h4 class="text-left d-block">Note:{{$task["note"]}}</h4>
                            <h4 class="text-left d-block">Title:{{$task["title"]}}</h4>
                            <h4 class="text-left d-block">Started At:{{$task["started_at"]}}</h4>
                            <h4 class="text-left d-block">Finished At:{{$task["finished_at"]}}</h4>
                            <h4 class="text-left d-block">Categories:{{$task["categoryTitles"]}}</h4>
                            <h4 class="text-left d-block">Users:{{$task["userNames"]}}</h4>
                            @if(!empty($task["file"]))
                                <form action="{{route("download",["path"=>$task["file"]])}}" method="post">
                                    @csrf
                                    <button class="btn btn-primary btn-sm" type="submit">download</button>
                                </form>
                            @endif
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header text-left d-flex justify-content-end">
                            <h4 class="text-left d-block">Insert Comment</h4>
                        </div>
                        <div class="card-body" style="padding:20px !important">
                            <form action="{{route("task.comment",$task["id"])}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group col-12 col-sm-12">
                                    <label for="note">Note:</label>
                                    <textarea name="note" class="form-control" id="" cols="30" rows="10"></textarea>
                                    @error("note")<span
                                        class="text text-danger text-left d-block">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group col-12 col-sm-12">
                                    <label for="file">File</label>
                                    <input type="file" placeholder="Please Enter Your file" name="file"
                                           class="form-control">
                                    @error("file")<span
                                        class="text text-danger text-left d-block">{{$message}}</span>@enderror
                                </div>
                                <button class="btn btn-primary btn sm" type="submit">submit</button>
                            </form>
                        </div>
                    </div>
                    @if(!empty($comments))
                        @foreach($comments as $comment)
                            <div class="card">
                                <div class="card-header text-left d-flex justify-content-end flex-column">
                                    <h4 class="text-left d-block">Name:{{$comment->user->name}}</h4>
                                    <h4 class="text-left d-block">Note:{{$comment["note"]}}</h4>
                                    @if(!empty($comment["file"]))
                                        <form action="{{route("download",["path"=>$comment["file"]])}}" method="post">
                                            @csrf
                                            <button class="btn btn-primary btn-sm" type="submit">download</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
