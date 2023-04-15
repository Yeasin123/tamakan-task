<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function mainCatProduct($name)
    {
        
        $maincatproducts = Product::where('category', $name)->orderBy('id','desc')->paginate(12);
          return view('frontend.categoryproduct.mainproduct',compact('maincatproducts'));
       
    }

  


    public function productDetail($id)
    {
        $product = Product::where('id',$id)->first();
     
        return view('frontend.productdetails',compact('product'));
    }


}
