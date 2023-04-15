<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $data['categorys'] = Category::orderBy('id', 'desc')->get();
        $data['brands'] = Brand::orderBy('id', 'desc')->get();
        $data['products'] = Product::orderBy('id','desc')->get();
        return view('backend.pages.product.manage', $data);
    }
    

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'category' => 'required',
            'brand' => 'required',
            'thumbnail' => 'required',
            'images' => 'required',
            'description' => 'required',
            'discountPercentage' => 'required',
            'rating' => 'required',

        ];
        $messages = [
            'title.required' => 'The title is required',
            'stock.required' => 'The stock is required',
            'price.required' => 'The price is required',
            'category.required' => 'The category is required',
            'brand.required' => 'The brand is required',
            'thumbnail.required' => 'The thumbnail is required',
            'images.required' => 'The thumbnail is required',
            'description.required' => 'The description is required',
            'discountPercentage.required' => 'The Discount  is required',
            'rating.required' => 'The rating  is required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ], 400);
        }


        $product = new Product();
        $product->title = $request->title;
        $product->category  = $request->category ;
        $product->brand  = $request->brand ;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->rating = $request->rating;
        $product->description = $request->description;
        $product->discountPercentage = $request->discountPercentage;


        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $filename = uniqid() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('images/product'), $filename);
            $product->thumbnail = $filename;
        }

        $imagedata = array();
        if ($files = $request->file('images')) {
            foreach ($files as $image) {
                $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/product'), $filename);
                $imagedata[] = $filename;
            }
        }
        $product->images = json_encode($imagedata);
        $product->save();

        $request->session()->flash('success', 'Brand Insert Succesfuslly');
        return 'success';
          
        
    }


    public function edit($id)
    {
        $product = Product::find($id);
        $categorys = Category::all();
        $brands = Brand::all();
        return view('backend.pages.product.edit',compact('product','categorys','brands'));
        
    }


    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'category' => 'required',
            'brand' => 'required',
            'description' => 'required',
            'discountPercentage' => 'required',
            'rating' => 'required',

        ];
        $messages = [
            'title.required' => 'The title is required',
            'stock.required' => 'The stock is required',
            'price.required' => 'The price is required',
            'category.required' => 'The category is required',
            'brand.required' => 'The brand is required',

            'description.required' => 'The description is required',
            'discountPercentage.required' => 'The Discount  is required',
            'rating.required' => 'The rating  is required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ], 400);
        }
        $product = Product::find($id);

        $product->title = $request->title;
        $product->category  = $request->category;
        $product->brand  = $request->brand;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->rating = $request->rating;
        $product->description = $request->description;
        $product->discountPercentage = $request->discountPercentage;

        if ($request->hasFile('thumbnail')) {

            unlink(public_path('images/product/' . $product->thumbnail));

            $thumbnail = $request->file('thumbnail');
            $filename = uniqid() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('images/product'), $filename);
            $product->thumbnail = $filename;
        } else {
            $product->thumbnail = $product->thumbnail;
        }

        $imagedata = array();
        if ($files = $request->file('images')) {

            if (!empty($product->images)) {

                foreach (json_decode($product->images) as $gimage) {
                    unlink(public_path('/images/product/' . $gimage));
                }
            }

            foreach ($files as $image) {
                $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/product'), $filename);
                $imagedata[] = $filename;
            }
        }


        $product->update();
        $notification = array(
            'message' => ' Product Updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('product.index')->with($notification);
    }

  
    public function destroy($id)
    {
        $product = Product::find($id);
       
        if($product){
            
            unlink(public_path('/images/product/' . $product->thumbnail));
            if($product->images){
                $images = json_decode($product->images,true);
                foreach($images as $key => $image){
                 unlink( public_path('/images/product/' . $image));
                }
            }
            $product->delete();
            $notification = array(
                'message' => 'Product Deleted Successfully',
                'alert-type' => 'error'
            );
            return redirect()->route('product.index')->with($notification);
        }
    }


    public function getSubcategory($category_id)
    {
        $subcate = SubCategory::where('category_id',$category_id)->get();
        return json_encode($subcate);
    }

}
