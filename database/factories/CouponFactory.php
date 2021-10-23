<?php

namespace Database\Factories;

use App\Models\Coupon;
use App\Models\MainCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class CouponFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Coupon::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return
            [
                'title'             => $this->faker->text(20),
                'code'              => $this->faker->slug(1),
                'status'            => $this->faker->randomElement(['active', 'inactive']),
                'value'             => $this->faker->randomDigitNotZero(),
                'start_at'          => $this->faker->date(),
                'end_at'            => $this->faker->date(),
                'free_shipping'     =>  0,
                'quantity'          => $this->faker->randomNumber(),
                'discount_type'     => $this->faker->randomElement(['percent', 'fixed']),
                'main_category'     => $this->faker->randomElement(MainCategory::pluck('id')->toArray()),
                'minimum_spend'     => $this->faker->randomNumber(3),
                'maximum_spend'     => $this->faker->randomNumber(5),
                'usage_limit_per_limit' => null,
                'usage_limit_per_customer'=> null,
            ];
    }
}
