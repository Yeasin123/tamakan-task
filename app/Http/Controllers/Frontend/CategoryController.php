<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;

class CategoryController extends Controller
{
    public function maincategory()
    {
        $maincatproducts = Category::orderBy('id','desc')->paginate(12);
          return view('frontend.mainproduct',compact('maincatproducts'));
       
    }

}
