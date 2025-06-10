<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_edit_profile_page_can_be_accessed_by_authenticated_user()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/profile');
        $response->assertStatus(200);
        $response->assertSee('Profile');
    }

    public function test_user_can_update_profile_data()
    {
        $user = User::factory()->create([
            'name' => 'Nama Lama',
            'email' => 'lama@example.com'
        ]);

        $response = $this->actingAs($user)->patch('/profile', [
            'name' => 'Nama Baru',
            'email' => 'baru@example.com',
        ]);

        $response->assertRedirect('/profile'); 
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Nama Baru',
            'email' => 'baru@example.com',
        ]);
    }

    public function test_user_can_delete_own_account()
    {
        $user = User::factory()->create([
            'password' => bcrypt('passwordku'),
        ]);

        $response = $this->actingAs($user)->delete('/profile', [
            'password' => 'passwordku',
        ]);

        $response->assertRedirect('/');

        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);
    }
}
