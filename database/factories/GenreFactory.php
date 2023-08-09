<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genre>
 */
class GenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'name' => $this->faker->unique()->randomElements(['Romance', 'Comedy', 'Action', 'History', 'Classic', 'Horror', 'Fantasy']),
            // 'style' => $this->faker->randomElements(['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'])
        ];
    }
}
