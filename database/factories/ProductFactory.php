<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\MainCategory;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slug'                  => $this->faker->unique()->slug,
            'stock'                 => $this->faker->numberBetween(20, 10),
            'price'                 => $this->faker->randomNumber(4),
            'offer_price'           => $this->faker->randomNumber(4),
            'images'                => json_encode(["uploads\/images\/products\/legion-5-15-156-amd-powered-gaming-laptop-lenovo-uk.png",
                                        "uploads\/images\/products\/legion-5-gaming-laptop-1_4_2048x2048_14f49f37-d43d-4f18-a9a6-d5abc7f49652_2048x2048.jpg",
                                        "uploads\/images\/products\/71MmRJDlubL.jpg","uploads\/images\/products\/71t4KnlsynL._AC_SL1500_.jpg"]),
            'start_offer_at'        => $this->faker->date('Y-m-d', 'now'),
            'end_offer_at'          => $this->faker->date('Y-m-d'),
            'conditions'            => $this->faker->randomElement(['new', 'popular', 'winter']),
            'status'                => $this->faker->randomElement(['active', 'inactive']),
            'main_categories_id'    => 64,
            'brand_id'              => 10,
            'vendor_id'             => $this->faker->randomElement(Vendor::pluck('id')->toArray()),
        ];
    }
}
