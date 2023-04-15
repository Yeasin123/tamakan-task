<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class UserHomeController extends Controller
{
    public function userHome()
    {   
        $products = Product::orderBy('id','asc')->paginate(10);
       $categoryes = Category::all();
        // return $products;
        return view('welcome',compact('products','categoryes'));
    }

    public function signupVerify(Request $request, $token)
    {
        
        try {
            $user = User::where('verification_token', $token)->where('email', session()->get('userEmail'))->firstOrFail();
            // after verify user email, put "null" in the "verification token"
            $user->update([
                'email_verified_at' => date('Y-m-d H:i:s'),
                'verification_token' => null
            ]);

            $request->session()->flash('success', 'Your email has verified.');

            // after email verification, authenticate this user
            Auth::guard('web')->login($user);

            return redirect()->route('userProfile');
        } catch (ModelNotFoundException $e) {
            $request->session()->flash('error', 'Could not verify your email!');
            return redirect()->route('adminResgisterForm');
        }
    }

    public function storeProduct()
    {
        $response = Http::get('https://dummyjson.com/products');
        $data = $response->json();

        return response()->json($data);

        // foreach ($data['products'] as $productData) {

        //     $product = new Product();
        //     $product->title = $productData['title'];
        //     $product->category  = $productData['category'];
        //     $product->brand  = $productData['brand'];
        //     $product->stock = $productData['stock'];
        //     $product->price = $productData['price'];
        //     $product->rating = $productData['rating'];
        //     $product->description = $productData['description'];
        //     $product->discountPercentage = $productData['discountPercentage'];
        //     $product->thumbnail = $productData['thumbnail'];

        //     $images = [];
        //     foreach ($productData['images'] as $index => $image) {

        //         $images[] = $image;
        //     }

        //     $product->images = json_encode($images);
        //     $product->save();
        // }

        // $products = Product::all();

        //     foreach($products as $product){

        //         $thumbnailUrl = $product->thumbnail;
        //         // Generate a unique filename for the thumbnail image
        //            $filename = uniqid() . '.' . pathinfo($thumbnailUrl,
        //                 PATHINFO_EXTENSION
        //             );
        
        //         // Download the image and store it in the public folder using the Storage facade
        //         Storage::put('/public/images/product/' . $filename, file_get_contents($thumbnailUrl));
        //         file_put_contents(public_path('/images/product/' . $filename), file_get_contents($thumbnailUrl));

        //         // Save the filename to the database
        //         $product->update(['thumbnail' => $filename]);
        //     }


        // $products = Product::all();

        // foreach ($products as $product) {
        //     $filenameDatas = [];
        //     foreach (json_decode($product->images) as $image) {

        //         $thumbnailUrl = $image;
        //         // Generate a unique filename for the thumbnail image
        //         $filename = uniqid() . '.' . pathinfo(
        //             $thumbnailUrl,
        //             PATHINFO_EXTENSION
        //         );

        //         // Download the image and store it in the public folder using the Storage facade
        //         Storage::put('/public/images/product/' . $filename, file_get_contents($thumbnailUrl));
        //         file_put_contents(public_path('/images/product/' . $filename), file_get_contents($thumbnailUrl));

        //         $filenameDatas[] = $filename;
        //         // Save the filename to the database
        //     }
        //     $product->update(['images' => json_encode($filenameDatas)]);
        // }


        return 'ok';
    }
    
}
