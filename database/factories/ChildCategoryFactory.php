<?php

namespace Database\Factories;

use App\Models\ChildCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\SubCategory;
class ChildCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChildCategory::class;

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
            'subcategory_id' => function(){
                return SubCategory::get()->random();
            },
    
            'name' => $this->faker->name,
            'photo' => $this->faker->image(public_path('/images/childcategory/'), 640, 480,null, false),
            'slug' => $slug
        ];
    }
}
