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
        $nameProduct = [
            'Nintendo Switch OLED',
            'PlayStation 5',
            'Xbox Series X',
            'Xbox Series S',
            'PlayStation 4',
            'Xbox One',
            'Nintendo Switch',
            'Nintendo 3DS',
            'Nintendo DS',
            'Nintendo Wii',
            'Nintendo GameCube',
            'Nintendo 64',
            'Nintendo Entertainment System',
            'JBL Quantumm',
            'JBL Quantum ONE',
            'Macbook Pro',
            'Macbook Air',
            'Macbook Air M1',
            'Macbook Pro M1',
        ];

        return [
            'sku' => $this->faker->unique()->ean8,
            'name' => $this->faker->randomElement($nameProduct),
            'description' => $this->faker->optional()->paragraph,
            'quantity' => $this->faker->numberBetween(0, 100),
            'price' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}
