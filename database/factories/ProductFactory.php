<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name;
        return [
            'title' => $name,
            'sku' => Str::slug($name),
            'url' => Str::slug($name),
            'is_active' => 1,
            'is_in_stock' => 1,
            'is_featured' => $this->faker->numberBetween(0,1),
            'qty' => $this->faker->numberBetween(1,100),
            'price' => $this->faker->numberBetween(200,500),
            'sale_price' => $this->faker->numberBetween(1,300),
            'sale_price_from' => $this->faker->date(),
            'sale_price_to' => null,
            'desc' => $this->faker->text,
            'short_desc' => $this->faker->text,
            'status' => $this->faker->numberBetween(1,10),
            'color' => $this->faker->numberBetween(1,4),
            'is_popular' => $this->faker->numberBetween(0,1),
            'is_top_rated' => $this->faker->numberBetween(0,1),
            'is_new' => $this->faker->numberBetween(0,1),
            'brand' => $this->faker->randomElement(['Apple', 'Sumsung', 'Tesla', 'Google', 'SpaceX', 'HP', 'Lazer', 'Win'])
        ];
    }
}
