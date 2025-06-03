<?php

namespace Database\Factories;

use App\Models\TicketType;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketTypeFactory extends Factory
{
    protected $model = TicketType::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Reguler', 'Premium']),
            'price' => $this->faker->numberBetween(20000, 25000),
            'description' => $this->faker->sentence,
        ];
    }
}
