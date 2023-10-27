<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register_post(RegisterRequest $r)
    {
        $role = Role::whereName('User')->first();
        $user = User::create($r->all());
        $user->syncRoles($role);
        if(Auth::attempt(['email' => $r->email, 'password' => $r->password])){
            return redirect(aurl(''));
        }
        else{
            return back()->withErrors([
                'email' => 'the provider credentials do not match',
            ]);
        }
    }
}
