<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Category::class;

    public function definition()
    {
        $categories = ['Africa', 'Asia', 'The Caribbean', 'Central America', 'Europe', 'The Middle East', 'North America', 'Oceania', 'South America'];
        $categories_slug = ['africa', 'asia', 'the-caribbean', 'central-america', 'europe', 'the-middle-east', 'north-america', 'oceania', 'south-america'];

        return [
            'name' => $this->faker->word(),
            'slug' => $this->faker->unique()->slug(),
            'user_id' => User::all()->random()->id
        ];
    }
}
