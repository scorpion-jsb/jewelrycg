<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Product;
use Illuminate\Support\Arr;

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
            'price' => $this->faker->randomFloat(2, 0.99, 500),
            'desc' => $this->faker->paragraphs(3, true),
            'name' => ucfirst($this->faker->unique()->word()),
            'category' => Arr::random(Product::$category_list)
        ];
    }

    public function withRandomId()
    {
        return $this->state([
            'id' => $this->faker->randomNumber(5, true)
        ]);
    }
}
