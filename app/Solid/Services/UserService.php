<?php

namespace App\Solid\Services;

use App\Models\User;
use App\Solid\Repositories\UserRepository;

class UserService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function create($data)
    {
        return $this->userRepository->create($data);
    }

    public function delete($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();
        return true;
    }
}
