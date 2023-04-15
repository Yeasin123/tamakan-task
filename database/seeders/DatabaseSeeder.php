<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\User;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
          Admin::factory(1)->create();
          User::factory(2)->create();
          Brand::factory(5)->create();
          Category::factory(5)->create();
          SubCategory::factory(5)->create();
          ChildCategory::factory(5)->create();
          Product::factory(40)->create();
       
    }
}
