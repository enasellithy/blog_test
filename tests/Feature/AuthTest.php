<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use DatabaseMigrations;
    use Authenticatable;

    public function test_login_redirect_done_admin()
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
        $response = $this->post(aurl('login_post'),['email' => 'admin@mail.com', 'password' => '123456']);
        $response->assertStatus(302);
        $response->assertRedirect(aurl('home'));
    }

    public function test_login_redirect_done_user()
    {
        $role = Role::create(['name' => 'User']);
        $user = User::create([
            'name' => 'User',
            'email' => 'user@mail.com',
            'password' => '123456',
        ]);
        $user->syncRoles($role);
        $response = $this->post(aurl('login_post'),['email' => 'admin@mail.com', 'password' => '123456']);
        $response->assertStatus(302);
        $response->assertRedirect(aurl(''));
    }

    public function test_register()
    {
        $role = Role::create(['name' => 'User']);
        $user = User::create([
            'name' => 'User',
            'email' => 'user@mail.com',
            'password' => '123456',
        ]);
        $user->syncRoles($role);
        $response = $this->post(aurl('register_post'),['email' => 'admin@mail.com', 'password' => '123456']);
        $response->assertStatus(302);
        $response->assertRedirect(aurl(''));
    }

    public function test_a_user_login_valadtion_done()
    {
        $this->post(aurl('login_post'), ['email' => 'test@mail.com', 'password' => '123456'])
            ->assertSessionHasErrors('email')
            ->assertStatus(302);

        $this->assertDatabaseMissing('users',['email' => 'test@mail.com', 'password' => '123456']);
    }

    public function test_a_user_login_valadtion_error()
    {
        $this->post(aurl('login_post'), ['email' => 'test@mail.com'])
            ->assertSessionHasErrors('email')
            ->assertStatus(302);

        $this->assertDatabaseMissing('users',['email' => 'test@mail.com']);
    }

    public function test_login_view()
    {
        $response = $this->get(aurl('login'));

        $response->assertStatus(200);
    }
}
