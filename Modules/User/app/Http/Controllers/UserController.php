<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Modules\User\Http\Requests\LoginRequest;

class UserController extends Controller
{
    public function __construct()
    {
    }

    public function create()
    {
        return view('user::login');
    }

    public function login(LoginRequest $request){
        $data=$request->validated();
        $user=User::where(["email"=>$data["email"]])->first();
        if($user && Hash::check($data["password"],$user["password"])){
            Auth::attempt($data);
            return redirect()->route('base');
        }
        return back()->with("message","Email Or Password Is Wrong");
    }

    public function logout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.create');    }

}
