<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'sku' => $this->faker->unique()->ean8,
            'name' => $this->faker->unique()->words(3, true),
            'description' => $this->faker->optional()->paragraph,
            'quantity' => $this->faker->numberBetween(0, 100),
        ];
    }
}
