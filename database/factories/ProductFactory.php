<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;
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
        $name = $this->faker->name;
        $slug = Str::slug($name);
        return [

            'category_id' => function(){
                return Category::get()->random();
            },
            'subcategory_id' => function(){
                return SubCategory::get()->random();
            },
            'childcategory_id' => function(){
                return ChildCategory::get()->random();
            },

            'brand_id' => function(){
                return Brand::get()->random();
            },

            'product_name' => $this->faker->name,
            'slug' => $slug,
            'product_quantity' => $this->faker->numberBetween($min = 1, $max = 20),
            'product_color' => $this->faker->randomElement([
                'White', 'Black', 'Blue', 'Red'
            ]),
            'product_size' => $this->faker->randomElement([
                'M', 'S', 'XL', 'XXL'
            ]),
            'product_code' => Str::random(),
            'product_invoice' => 'TechByte#'.mt_rand(1,999999),
            'product_tags' => $name,
            'product_detials' => $this->faker->text(200),
            'selling_price' => $this->faker->numberBetween($min = 1000, $max = 2000),
            'buying_price' => $this->faker->numberBetween($min = 100, $max = 1000),
            'main_slider' => $this->faker->numberBetween($min = 0, $max = 1),
            'mid_slider' => $this->faker->numberBetween($min = 0, $max = 1),
            'hot_deals' => $this->faker->numberBetween($min = 0, $max = 1),
            'hot_new' => $this->faker->numberBetween($min = 0, $max = 1),
            'trend' => $this->faker->numberBetween($min = 0, $max = 1),
            'best_rated' => $this->faker->numberBetween($min = 0, $max = 1),
            'image_one' => $this->faker->image(public_path('/images/product/'), 640, 480,null, false),
            'gellary_img' => $this->faker->image(public_path('/images/product/'), 640, 480,null, false),
           
        ];
    }
}
