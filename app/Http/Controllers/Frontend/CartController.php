<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
class CartController extends Controller
{
    public function cartPage()
    {
        $carts = Cart::content();
        return view('frontend.cart',compact('carts'));
    }

    public function fixCartPage()
    {
        $cartItems = Cart::content();
        return  response()->json(['cartItems' => $cartItems]);
    }


    public function addToCart($id)
    {
        $product = Product::where('id',$id)->with('category')->get()->first();
        
        if($product->discountPercentage == NULL){

            Cart::add([
                'id' => $product->id,
                'name' => $product->title,
                'qty' => 1,
                'price' => $product->price,
                'options' => [
                    'images' => $product->thumbnail,
               
                ]
            ]);
            return  response()->json(['success' => 'Product added successfully in cart']);
        }

        else{

            Cart::add([
                'id' => $product->id,
                'name' => $product->title,
                'qty' => 1,
                'price' => $product->price - $product->discountPercentage,
                'options' => [
                    'images' => $product->thumbnail,

                ]
            ]);

            return  response()->json(['success' => 'Product added successfully in cart']);
        }
    }

    


    public function cartUpdate(Request $request, $rowId)
    {
        Cart::update($rowId, ['qty' => $request->product_quantity]);
        $notification = array(
            'message' => 'Product Successfully Added In Cart',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        
    }



    public function quickProductView($id)
    {
        $product = Product::with('category','brand')->where('id',$id)->first();
        $color = $product->product_color;
        $product_color = explode(',' , $color);

        $size = $product->product_size;
        $product_size = explode(',' , $size);

          return response()->json(array(
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size,
          ));
       
    }

    public function quickAddToCart(Request $request)
    {
        $id = $request->product_id;
        $product = Product::where('id',$id)->with('category','subcategory','childcategory')->get()->first();
        $color = $request->color;
        $size = $request->size;
        $product_quantity = $request->product_quantity;
        
        if($product->discount_price == NULL){

            Cart::add([
                'id' => $product->id,
                'name' => $product->product_name,
                'qty' => $product_quantity,
                'price' => $product->selling_price,
                'options' => [
                    'images' => $product->image_one,
                    'size' => $size,
                    'color' => $color,
                ]
            ]);
            
            $notification = array(
                'message' => 'Product Successfully Added In Cart',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }

        else{

            Cart::add([
                'id' => $product->id,
                'name' => $product->product_name,
                'qty' => $product_quantity,
                'price' => $product->discount_price,
                'options' => [
                    'images' => $product->image_one,
                    'size' => $size,
                    'color' => $color,
                ]
            ]);

            $notification = array(
                'message' => 'Product Successfully Added In Cart',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
       
    }

    public function cartCount()
    {
        $cartcount = Cart::content()->count();
        $cartcontent = Cart::content();
        $cartTotal = Cart::total();
        return response()->json(['count' => $cartcount,'cartTotal' => $cartTotal,'cartContent' => $cartcontent]);
    }


    public function cartDestroy($id)
    {
        $cart = Cart::content()->where('rowId',$id);
        if($cart->isNotEmpty()){
            Cart::remove($id);
            return  response()->json(['success' => 'Product successfully Deleted From Cart']);
        } 
    }


    public function qtyIncrement($id)
    {
        $carts = Cart::get($id);
        Cart::update($id,$carts->qty +1);
        return  response()->json(['success' => 'Quantity Increase successfully']);
    }

    public function qtyDecrement($id)
    {
        $carts = Cart::get($id);
        Cart::update($id,$carts->qty -1);
        return  response()->json(['error' => 'Quantity Decrease successfully']);
    }



    public function productAddToCart(Request $request,$id)
    {
        $product = Product::where('id',$id)->with('category')->first();
     
        $product_quantity = $request->product_quantity;
        
        if($product->discountPercentage == NULL){

            Cart::add([
                'id' => $product->id,
                'name' => $product->title,
                'qty' => $product_quantity,
                'price' => $product->price,
                'options' => [
                    'images' => $product->thumbnail,
                   
                ]
            ]);
            
            $notification = array(
                'message' => 'Product Successfully Added In Cart',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }

        else{

            Cart::add([
                'id' => $product->id,
                'name' => $product->title,
                'qty' => $product_quantity,
                'price' => $product->price - $product->discountPercentage,
                'options' => [
                    'images' => $product->thumbnail
                ]
            ]);

            $notification = array(
                'message' => 'Product Successfully Added In Cart',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
       
    }

}
