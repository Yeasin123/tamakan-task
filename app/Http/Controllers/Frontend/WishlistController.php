<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
class WishlistController extends Controller
{

    public function index()
    {
        $wishlists = Wishlist::orderBy('id','desc')->get();

        return view('frontend.wishlist.manage',compact('wishlists'));
    }
    public function addToWishlist($id)
    {
        $userid = Auth::id();
        $wishlist = Wishlist::where('user_id',$userid)->where('product_id',$id)->first();

        if(Auth::check()){

            if($wishlist){
                return  response()->json(['error' => 'Product already in wishlist']);
            }
            else{

                $wish = new Wishlist;
                $wish->user_id = $userid;
                $wish->product_id = $id;
                $wish->save();
                return  response()->json(['success' => 'Product successfully added in wishlist']);
            }
        }
        else{
            return  response()->json(['error' => 'You have to login first']);
        }
    }

    public function destroy($id)
    {
        $wishlist = Wishlist::find($id);
        if($wishlist){
            $wishlist->delete();
           return  response()->json(['success' => 'Wishlist Deleted Successfully ']);
        }
    }


    public function wishlistCount()
    {
        $wishlistcount = count(Wishlist::where('user_id', Auth::user()->id)->get());
        return response()->json(['count' => $wishlistcount]);
    }

}
