<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(),
            'description' => $this->faker->text(100),
            'purchase_price' => $this->faker->randomFloat(2, 1, 100),
            'selling_price' => $this->faker->randomFloat(2, 1, 100),
            'stock' => $this->faker->randomNumber(3,true),
            'min_stock' =>$this->faker->randomNumber(2,true),
            'bar_code' => $this->faker->ean13(),
            'expiration_date' => $this->faker->date('Y-m-d'),
            'active' => $this->faker->boolean(),
            'category_id' => $this->faker->numberBetween(1,\App\Models\Category::count())
        ];
        
    }
}
