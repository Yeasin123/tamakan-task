<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class StcokController extends Controller
{
    public function Test()
    {
        $products = Product::orderBy('id','desc')->get();
        return view('backend.pages.stockmenagement.deliveredstickorder',compact('products'));
    }
}
