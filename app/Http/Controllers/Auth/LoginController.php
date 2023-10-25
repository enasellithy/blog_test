<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login_post(LoginRequest $r)
    {
        if(Auth::attempt(['email' => $r->email, 'password' => $r->password])){
            done_msg();
            return redirect(aurl(''));
        }else{
            return back()->withErrors([
                'email' => 'the provider credentials do not match',
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        $this->done();
        return redirect()->intended('/dashboard/login');
    }
}
