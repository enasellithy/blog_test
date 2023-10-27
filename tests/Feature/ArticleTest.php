<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    public function test_admin_can_see_index_Articles()
    {
        Artisan::call('permission:create');
        $role = Role::create(['name' => 'Administration']);
        $user = User::create([
            'name' => 'Administration',
            'email' => 'admin@mail.com',
            'password' => '123456',
        ]);
        $role->syncPermissions(Permission::all());
        $user->syncRoles($role);
//        $response = $this->post(aurl('login_post'),['email' => 'admin@mail.com', 'password' => '123456']);
        $response = $this->actingAs(User::findOrFail(1))->get(aurl('articles'));
        $response->assertSee('Article');
        $response->assertStatus(200);
    }
}
