<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\AddRoleRequest;
use App\Http\Requests\Role\EditRoleRequest;
use App\Solid\Repositories\RoleRepository;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    private $role;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->role = $roleRepository;
    }

    public function index()
    {
        return view('role.index');
    }

    public function create()
    {
        $data = $this->role->getAllPermission();
        return view('role.create', compact('data'));
    }

    public function store(AddRoleRequest $r)
    {
        $role = Role::create(['name' => $r->name,'guard' => 'web']);
        $permissions = $r->permission_id;
        $role->syncPermissions(Permission::whereIn('id',$permissions)->get());
        done_msg();
        return redirect(aurl('roles'));
    }

    public function edit($id)
    {
        $data = $this->role->show($id);
        $permissions = $this->role->getAllPermission();
        return view('role.edit', compact('data','permissions'));
    }

    public function update($id, EditRoleRequest $r)
    {
        $role = Role::find($id);
        $role->update(['name' => $r->name]);
        $permissions = $r->permission_id;
        $role->syncPermissions(Permission::whereIn('id',$permissions)->get());
        done_msg();
        return redirect(aurl('roles'));
    }
}
