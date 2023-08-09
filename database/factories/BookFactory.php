<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'authors' => $this->faker->name($gender = 'male'|'female'),
            'description' => $this->faker->optional()->sentence(),
            'released_at' => $this->faker->date(),
            'cover_image' => $this->faker->optional()->imageUrl(640, 480, 'animals', true),
            'pages' => $this->faker->numberBetween(100, 500),

            'isbn' => $this->faker->unique()->sentence(3),
            'in_stock' => $this->faker->numberBetween(10, 15),
        ];
    }
}
