<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type = $this->faker->numberBetween(0, 2);
        return [
            'parent_id' => 0, // Assuming parent_id defaults to 0 for simplicity
            'name' => $this->faker->name(),
            'contact' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'detail' => $this->faker->text(),
            'image' => $this->faker->imageUrl(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'), // Default password
            'working_days' => json_encode($this->faker->randomElements(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'], $this->faker->numberBetween(1, 5))),
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->time(),
            'is_admin' => 0,
            'type' => $this->faker->numberBetween(1, 3),
            'status' => $this->faker->numberBetween(0, 1)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
