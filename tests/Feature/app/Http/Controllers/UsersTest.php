<?php

namespace Tests\Feature\app\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Database\Factories\UserFactory;
use Database\Factories\UsersFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersTest extends TestCase
{
    use RefreshDatabase;

    public function testUserIndex(): void
    {
        $users = UserFactory::new()->count(5)->create();

        // Autenticar o primeiro usuário da coleção
        $this->actingAs($users->first());

        $response = $this->get(route('users'));

        $response->assertStatus(200);
    }

    public function testUserTenantIndex(): void
    {
        $users = UsersFactory::new()->count(5)->create();

        // Autenticar o primeiro usuário da coleção
        $this->actingAs($users->first());

        $response = $this->get(route('users'));

        $response->assertStatus(200);
    }
}
