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
            'console' => [
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
            ],
            'headphone' => [
                'JBL Quantumm',
                'JBL Quantum ONE',
            ],
            'laptop' => [
                'Macbook Pro',
                'Macbook Air',
                'Macbook Air M1',
                'Macbook Pro M1',
            ]
        ];

        $category = array_rand($nameProduct);
        $name = $nameProduct[$category][array_rand($nameProduct[$category])];

        return [
            'sku' => $this->faker->unique()->ean8,
            'name' => $name,
            'description' => $this->faker->optional()->paragraph,
            'quantity' => $this->faker->numberBetween(0, 100),
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'category' => $category,
        ];
    }
}
