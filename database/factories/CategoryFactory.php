<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'category_name' => $this->faker->word,
            'type_id' => $this->faker->randomElement([1, 2, 3]), // Example hard-coded type IDs
            'status' => $this->faker->boolean, // Generates either 0 or 1
        ];
    }
}
