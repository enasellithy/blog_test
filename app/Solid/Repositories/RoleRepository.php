<?php

namespace App\Solid\Repositories;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleRepository
{
    public function getAll(){
        return Role::latest()->paginate(10);
    }

    public function getAllPermission(){
        return Permission::all();
    }

    public function show($id){
        return Role::find($id);
    }
}
