<?php

namespace Tests\Feature\testing;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookingFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login_when_accessing_booking_form()
    {
        $response = $this->get('/book');
        $response->assertRedirect('/login'); // pastikan route login kamu benar
    }

    public function test_authenticated_user_can_access_booking_form()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/book');
        $response->assertStatus(200);
        $response->assertViewIs('client.booking.index');
    }
}
