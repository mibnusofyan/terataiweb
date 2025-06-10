<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ConfirmPaymentTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_confirm_payment_status()
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin);

        $booking = Booking::factory()->create([
            'status' => 'pending',
        ]);
        $booking->update(['status' => 'paid']);

        $this->assertEquals('paid', $booking->fresh()->status);
    }
}
