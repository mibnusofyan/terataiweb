<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Booking;
use App\Models\TicketType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MyBookingsTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_view_their_bookings()
    {
        $user = User::factory()->create();
        $ticket = TicketType::factory()->create(['price' => 20000]);

        $booking = Booking::factory()->create([
            'user_id' => $user->id,
            'total_price' => 20000,
        ]);

        $booking->bookingItems()->create([
            'ticket_type_id' => $ticket->id,
            'quantity' => 2,
            'price_per_item' => 20000,
        ]);

        $response = $this->actingAs($user)->get('/my-bookings');
        $response->assertStatus(200);
        $response->assertViewIs('client.booking.myBookings');
        $response->assertViewHas('bookings', function ($bookings) use ($user) {
            return $bookings->first()->user_id === $user->id;
        });
    }

    public function test_guest_user_is_redirected_from_my_bookings()
    {
        $response = $this->get('/my-bookings');
        $response->assertRedirect('/login');
    }
}
