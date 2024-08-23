<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 5),
            'name' => $this->faker->name(),
            'price' => $this->faker->numberBetween(100, 1000),
            'time' => $this->faker->time(),
            'image' => 'https://fakeimg.pl/600x400/62f5eb/000000?text=thesakoon',
            'description' => $this->faker->text(),
            'status' => $this->faker->numberBetween(0, 1),
            'is_active' => $this->faker->numberBetween(0, 1),
            'is_home_page' => $this->faker->numberBetween(0, 1)
        ];
    }
}
