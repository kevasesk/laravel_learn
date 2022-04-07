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
            'qty' => $this->faker->numberBetween(0,100),
            'price' => $this->faker->numberBetween(0,1000),
            'desc' => $this->faker->text,
            'short_desc' => $this->faker->text
        ];
    }
}
