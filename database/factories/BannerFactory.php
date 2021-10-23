<?php

namespace Database\Factories;

use App\Models\Banner;
use Illuminate\Database\Eloquent\Factories\Factory;

class BannerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Banner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'slug' => $this->faker->unique()->slug,
            'description' => $this->faker->sentence(4, true),
            'photo' => $this->faker->imageUrl('240', '150'),
            'condition' => $this->faker->randomElement(['promo', 'banner']),
            'status' => $this->faker->randomElement(['active', 'inactive'])
        ];
    }
}
