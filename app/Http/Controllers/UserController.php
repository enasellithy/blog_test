<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\AddUserRequest;
use App\Solid\Repositories\UserRepository;
use App\Solid\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $user;

    protected $userSerive;

    public function __construct(UserService $userSerive)
    {
        $this->userSerive = $userSerive;
    }

    public function index()
    {
        return view('users.index');
    }

    public function store(AddUserRequest $r)
    {
//        $this->user->create($r->all());
        $this->userSerive->create($r->all());
        done_msg();
        return back();
    }
}
