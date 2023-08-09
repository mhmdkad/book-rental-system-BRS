<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\book_genre>
 */
class book_genreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */ 
    public function definition()
    {
        return [
            //
            'book_id' => $this->faker->unique()->numberBetween(1, 15),
            'genre_id' => $this->faker->numberBetween(1, 7)
        ];
    }
}
