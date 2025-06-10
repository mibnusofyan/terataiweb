<?php

namespace Tests\Feature\testing;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingFilterTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    public function admin_can_filter_bookings_by_date_range()
    {
        $admin = User::factory()->create(['is_admin' => true]);

        // Data: 1 hari ini, 1 minggu lalu
        $today = now()->toDateString();
        $lastWeek = now()->subWeek()->toDateString();

        Booking::factory()->create(['booking_date' => $today, 'status' => 'pending']);
        Booking::factory()->create(['booking_date' => $lastWeek, 'status' => 'pending']);

        $response = $this->actingAs($admin)->get("/admin/bookings?tableFilters[booking_date][booking_date_from]={$today}&tableFilters[booking_date][booking_date_to]={$today}");

        $response->assertStatus(200);
        $response->assertSee($today);
        $response->assertDontSee($lastWeek);
    }
}
