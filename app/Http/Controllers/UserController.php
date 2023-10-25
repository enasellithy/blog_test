<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\AddUserRequest;
use App\Solid\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $user;

    public function __construct(UserRepository $userRepository)
    {
        $this->user = $userRepository;
    }

    public function index()
    {
        return view('users.index');
    }

    public function store(AddUserRequest $r)
    {
        $this->user->create($r->all());
        done_msg();
        return back();
    }
}
