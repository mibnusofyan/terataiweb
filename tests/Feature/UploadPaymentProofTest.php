<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class UploadPaymentProofTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_access_upload_form_for_their_pending_booking()
    {
        $user = User::factory()->create();

        $booking = Booking::factory()->create([
            'user_id' => $user->id,
            'status' => 'pending',
        ]);

        $response = $this->actingAs($user)->get("/my-bookings/{$booking->id}/upload-payment-proof");
        $response->assertStatus(200);
        $response->assertViewIs('client.booking.uploadPayment');
    }

    public function test_user_can_upload_payment_proof_and_status_is_updated()
    {
        Storage::fake('public');

        $user = User::factory()->create();

        $booking = Booking::factory()->create([
            'user_id' => $user->id,
            'status' => 'pending',
        ]);

        $file = UploadedFile::fake()->image('proof.jpg');

        $response = $this->actingAs($user)->post("/my-bookings/{$booking->id}/upload-payment-proof", [
            'payment_proof' => $file,
        ]);

        $response->assertRedirect(route('my.bookings'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('bookings', [
            'id' => $booking->id,
            'status' => 'awaiting_confirmation',
        ]);

        Storage::disk('public')->assertExists("payment-proofs/{$file->hashName()}");
    }

    public function test_user_cannot_access_upload_form_if_booking_not_pending()
    {
        $user = User::factory()->create();

        $booking = Booking::factory()->create([
            'user_id' => $user->id,
            'status' => 'paid',
        ]);

        $response = $this->actingAs($user)->get("/my-bookings/{$booking->id}/upload-payment-proof");
        $response->assertStatus(403); // akses ditolak
    }
}
