<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Booking;

class AdminBookingsTest extends TestCase
{
    public function test_admin_can_access_booking_list()
    {
        $admin = User::factory()->create(['is_admin' => 1]);

        $response = $this->actingAs($admin)->get('/admin/bookings');

        $response->assertStatus(200);
        $response->assertSee('Booking'); // atau teks lain yang pasti ada di halaman
    }
    public function test_admin_can_create_booking()
    {
        $admin = User::factory()->create(['is_admin' => 1]);
        $this->actingAs($admin);

        $user = User::factory()->create();

        $booking = \App\Models\Booking::factory()->create([
            'user_id' => $user->id,
            'booking_date' => now()->toDateString(),
            'total_price' => 100000,
            'status' => 'pending',
        ]);

        $this->assertDatabaseHas('bookings', [
            'id' => $booking->id,
            'total_price' => 100000,
            'status' => 'pending',
        ]);
    }
    public function test_admin_can_edit_booking()
    {
        $admin = User::factory()->create(['is_admin' => 1]);
        $this->actingAs($admin);

        $booking = Booking::factory()->create([
            'status' => 'pending',
            'booking_date' => now(),
        ]);

        $updatedData = [
            'status' => 'completed',
            'booking_date' => now()->addDays(2)->toDateString(),
        ];

        $booking->update($updatedData);

        $this->assertDatabaseHas('bookings', [
            'id' => $booking->id,
            'status' => 'completed',
            'booking_date' => $updatedData['booking_date'],
        ]);
    }
    public function test_admin_can_delete_booking()
    {
        $admin = User::factory()->create(['is_admin' => 1]);
        $this->actingAs($admin);

        $booking = Booking::factory()->create();

        $booking->delete();

        $this->assertDatabaseMissing('bookings', [
            'id' => $booking->id,
        ]);
    }
}
