<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artisan::call('permission:create');
        $role = Role::create(['name' => 'Administration']);
        $userRole = Role::create(['name' => 'User']);
        $role->syncPermissions(Permission::all());
        $admin = User::firstOrCreate([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => '123456',
        ]);
        $admin->syncRoles($role);

        $user = User::firstOrCreate([
            'name' => 'user',
            'email' => 'user@mail.com',
            'password' => '123456',
        ]);
        $user->syncRoles($userRole);
    }
}
