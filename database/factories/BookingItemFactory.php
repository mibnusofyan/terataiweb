<?php

namespace Database\Factories;

use App\Models\BookingItem;
use App\Models\Booking;
use App\Models\TicketType;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingItemFactory extends Factory
{
    protected $model = BookingItem::class;

    public function definition(): array
    {
        return [
            'booking_id' => Booking::factory(),
            'ticket_type_id' => TicketType::factory(),
            'quantity' => $this->faker->numberBetween(1, 5),
            'price_per_item' => $this->faker->numberBetween(10000, 25000),
        ];
    }
}
