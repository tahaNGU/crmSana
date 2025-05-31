@extends('base::layouts.master')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-6" style="margin: 10% 26% 0 0">
                    <div class="card">
                        <div class="card-header text-left d-flex justify-content-end">
                            <h4 class="text-left d-block">Create Task</h4>
                        </div>
                        <div class="card-body" style="padding:20px !important">
                            <form action="{{route("task.store")}}" method="post">
                                @csrf
                                @if(session()->has('message'))
                                    <div class="alert alert-success">{{session()->get('message')}}</div>
                                @endif
                                <div class="form-group col-12 col-sm-12">
                                    <label for="title">title</label>
                                    <input type="text" placeholder="Please Enter Your title" name="title"
                                           value="{{old("title")}}" class="form-control">
                                    @error("title")<span
                                        class="text text-danger text-left d-block">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group col-12 col-sm-12">
                                    <label for="file">File</label>
                                    <input type="file" placeholder="Please Enter Your title" name="title" value="{{old("file")}}" class="form-control">
                                </div>
                                <div class="form-group col-12 col-sm-12">
                                    <label for="Note">Note</label>
                                    <textarea name="note" id="" cols="30" rows="10"
                                              class="form-control">{{old("note")}}</textarea>
                                    @error("note")<span
                                        class="text text-danger text-left d-block">{{$message}}</span>@enderror
                                </div>
                                <div class="col-12 d-flex">
                                    <div class="form-group col-6 col-sm-6">
                                        <label for="start_date">Start Date</label>
                                        <input type="date" name="start_date" class="form-control"
                                               value="{{old("start_date")}}">
                                    </div>
                                    <div class="form-group col-6 col-sm-6">
                                        <label for="hour_date">Hour Date Start</label>
                                        <select name="start_date_hour" class="form-control" id="">
                                            @for($i=1;$i<=24;$i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 d-flex">
                                    <div class="form-group col-6 col-sm-6">
                                        <label for="start_date">End Date</label>
                                        <input type="date" name="end_date" class="form-control"
                                               value="{{old("end_date")}}">
                                    </div>
                                    <div class="form-group col-6 col-sm-6">
                                        <label for="hour_date">Hour Date End</label>
                                        <select name="end_date_hour" class="form-control" id="">
                                            @for($i=1;$i<=24;$i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 my-3">
                                    <label for="">users:</label>
                                    <select name="users[]" class="form-control" multiple id="">
                                        <option value="test">test</option>
                                    </select>
                                </div>
                                <div class="col-12 my-3">
                                    <label for="">category:</label>
                                    <select name="categories[]" class="form-control" id="categories">
                                        <option value="test">test</option>
                                        <option value="1">test</option>
                                        <option value="2">test</option>
                                        <option value="3">test</option>
                                        <option value="4">test</option>
                                        <option value="4">test</option>
                                    </select>
                                </div>
                                <button class="btn btn-primary btn sm">submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
