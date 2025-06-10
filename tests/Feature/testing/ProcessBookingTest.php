<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\TicketType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProcessBookingTest extends TestCase
{
    use RefreshDatabase;

    public function test_booking_data_is_saved_and_redirected_correctly()
    {
        $user = User::factory()->create();

        $ticketType = TicketType::factory()->create([
            'price' => 20000,
        ]);

        $response = $this->actingAs($user)->post('/book', [
            'booking_date' => now()->addDays(1)->toDateString(),
            'quantities' => [
                $ticketType->id => 2,
            ],
        ]);

        $response->assertRedirect(route('booking.confirmation'));

        $this->assertDatabaseHas('bookings', [
            'user_id' => $user->id,
            'total_price' => 40000,
            'status' => 'pending',
        ]);

        $this->assertDatabaseHas('booking_items', [
            'ticket_type_id' => $ticketType->id,
            'quantity' => 2,
            'price_per_item' => 20000,
        ]);
    }

    public function test_booking_fails_if_no_ticket_selected()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/book', [
            'booking_date' => now()->addDays(1)->toDateString(),
            'quantities' => [],
        ]);

        $response->assertSessionHasErrors('quantities');
    }

    public function test_booking_fails_if_date_is_invalid()
    {
        $user = User::factory()->create();
        $ticket = TicketType::factory()->create();

        $response = $this->actingAs($user)->post('/book', [
            'booking_date' => '2020-01-01', 
            'quantities' => [
                $ticket->id => 1,
            ],
        ]);

        $response->assertSessionHasErrors('booking_date');
    }
}
