<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\MainCategory;
use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(UserTableSeeder::class);
//         \App\Models\User::factory(60)->create();
//         \App\Models\Coupon::factory(10)->create();
//         \App\Models\Product::factory(1)->create();


//            MainCategory::factory(1)
//                ->create()->each(function ($category){
//                    $random = rand(1, 100);
//                    $category->translations()
//                    ->sync([1 => ['name' => $random .' قســم رئيس '], 2 => ['name' => 'Main Category ' . $random]]);
//                });


            Product::factory(10)
            ->create()->each(function ($product) {
                $random = rand(1, 100);

                $product->translations()
                    ->attach([1 => [
                        'name' => $random . ' كتاب ',
                        'description' => 'وريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى)
                        ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار
                         للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف
                         بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف.
                       '],
                        2 => [
                            'name'          => 'book ' . $random,
                            'description'   => 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem
                            accusantium doloremque laudantium, totam rem aperiam eaque ipsa,
                             quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem,'
                        ]]);
            });
    }
}
