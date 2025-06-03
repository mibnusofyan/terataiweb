<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Review;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReviewTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_view_review_page()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/reviews');
        $response->assertStatus(200);
        $response->assertViewIs('client.review');
    }

    public function test_user_can_submit_review()
    {
        $user = User::factory()->create([
            'name' => 'Uji Coba' // ✅ samakan dengan yang akan disimpan otomatis
        ]);

        $response = $this->actingAs($user)->post('/reviews', [
            'rating' => 5,
            'message' => 'Sangat bagus!',
        ]);

        $response->assertRedirect('/reviews');

        $this->assertDatabaseHas('reviews', [
            'name' => 'Uji Coba',
            'rating' => 5,
            'message' => 'Sangat bagus!',
        ]);
    }

    public function test_review_submission_requires_validation()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/reviews', [
            'rating' => '',
            'message' => '',
        ]);

        // Jangan validasi 'name' karena sudah login
        $response->assertSessionHasErrors(['rating', 'message']);
    }


    public function test_guest_cannot_access_review_page()
    {
        $response = $this->get('/reviews');
        $response->assertRedirect('/login');
    }

    public function test_guest_cannot_submit_review()
    {
        $response = $this->post('/reviews', [
            'name' => 'Anonymous',
            'rating' => 4,
            'message' => 'Mantap',
        ]);

        $response->assertRedirect('/login');
        $this->assertDatabaseMissing('reviews', ['name' => 'Anonymous']);
    }
}
