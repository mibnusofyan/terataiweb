<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'booking_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'total_price' => $this->faker->numberBetween(20000, 25000),
            'status' => $this->faker->randomElement(['pending', 'paid', 'cancelled', 'completed']),
            'payment_proof' => null,
        ];
    }
}
