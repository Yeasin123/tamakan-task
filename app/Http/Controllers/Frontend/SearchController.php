<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function productSearch(Request $request)
    {
        $searchGet = $request->searchItem;
        $items = Product::where('title','LIKE', "%$searchGet%")->paginate(6);
        return view('frontend.searchpage',compact('items'));

    }

    public function ajaxSearch(Request $request)
    {   $searchGets = $request->searchbox;
        $searchItems = Product::where('title','LIKE', "%$searchGets%")->limit(5)->get();
        return view('frontend.searchajax',compact('searchItems'));

    }

    public function ajaxSearchMobile(Request $request)
    {   $searchGets = $request->searchMobilebox;
        $searchItems = Product::where('title','LIKE', "%$searchGets%")->limit(5)->get();
        return view('frontend.searchajax',compact('searchItems'));

    }
}
