<?php

namespace App\Solid\Repositories;

use App\Models\User;
use Spatie\Permission\Models\Role;

class UserRepository
{
    public function getAll(){
        return User::with('roles')->latest()->get();
    }

    public function show($id){
        return User::find($id);
    }

    public function create(array $data){
        $role = Role::find($data['role_id']);
        $user = User::create($data);
        $user->syncRoles($role);
    }
}
