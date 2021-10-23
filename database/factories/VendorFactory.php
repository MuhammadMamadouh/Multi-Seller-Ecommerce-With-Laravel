<?php

namespace Database\Factories;


use App\Models\MainCategory;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VendorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vendor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'              => $this->faker->name,
            'mobile'            => $this->faker->phoneNumber,
            'email'             => $this->faker->unique()->safeEmail(),
            'address'           => $this->faker->address,
            'status'            => $this->faker->randomElement(['active', 'inactive']),
            'logo'              => $this->faker->imageUrl(),
            'password'          => bcrypt('123456'),
            'main_category_id'  => $this->faker->randomElement(MainCategory::pluck('id')->toArray()),

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
