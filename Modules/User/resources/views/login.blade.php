@extends('base::layouts.master')

@section('content')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div
                    class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            {{--                            <h4>{{$ModuleTitle ?? ''}}</h4>--}}
                        </div>
                        <div class="card-body">
                            <form action="{{route("login.store")}}" method="post">
                                @csrf
                                @if(session()->has('message'))
                                    <div class="alert alert-danger">{{session()->get('message')}}</div>
                                @endif
                                <div class="form-group col-12 col-sm-12">
                                    <label for="email">Email</label>
                                    <input type="text" placeholder="Please Enter Your Email" name="email" value="{{old("email")}}" class="form-control">
                                    @error("email")<span class="text text-danger text-left d-block">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group col-12 col-sm-12">
                                    <label for="password">Password</label>
                                    <input type="text" placeholder="Please Enter Your Password" name="password" class="form-control">
                                    @error("password")<span class="text text-danger text-left d-block">{{$message}}</span>@enderror
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
