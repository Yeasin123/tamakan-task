<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
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


        if($request->hasFile('thumbnail')){
            $imageOne = rand().'.'.$request->thumbnail->getClientOriginalExtension();
            $request->thumbnail->move(public_path('/images/product/'), $imageOne);
            $product->thumbnail = $imageOne;
        }

        $imagedata= array();
        if($files=$request->file('images'))
            {
                foreach($files as $image)
                {
                    $gallery_image=rand().'.'.$image->getClientOriginalExtension();
                    $image->move(public_path('/images/product/'), $gallery_image);
                    $imagedata[] = $gallery_image;
                }

            }
            $product->images=json_encode($imagedata);

 
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
        $product = Product::find($id);

        $product->product_name = $request->product_name;
        $product->slug = Str::slug($request->product_name);
        $product->category_id  = $request->category_id ;
        $product->brand_id  = $request->brand_id ;
        $product->product_tags  = $request->product_tags ;
        $product->product_code = 'TechByte'.rand(10000,99999);
        $product->product_quantity = $request->product_quantity;
        $product->product_detials = $request->product_detials;
        $product->product_color = $request->product_color;
        $product->product_size = $request->product_size;
        $product->buying_price = $request->buying_price;
        $product->selling_price = $request->selling_price;
        $product->discount_price = $request->discount_price;
        $product->video_link = $request->video_link;
        $product->main_slider = $request->main_slider;
        $product->mid_slider = $request->mid_slider;
        $product->hot_deals = $request->hot_deals;
        $product->hot_new = $request->hot_new;
        $product->trend = $request->trend;
        $product->best_rated = $request->best_rated;

        if($request->hasFile('image_one')){
            unlink(public_path('images/product/'.$product->image_one));
            $imageOne = rand().'.'.$request->image_one->getClientOriginalExtension();
            $request->image_one->move(public_path('/images/product/'), $imageOne);
            $product->image_one = $imageOne;
        }

            $imagedata = array();
            if($request->hasFile('gellary_img'))
            {
                if(!empty($product->gellary_img)){

                    foreach (json_decode($product->gellary_img) as $gimage) {
                        unlink(public_path('/images/product/'.$gimage));
                      }
                }
                foreach($request->file('gellary_img') as $image)
                {
                    $gallery_image=rand().'.'.$image->getClientOriginalExtension();
                    $image->move(public_path('/images/product/'),$gallery_image);
                    $imagedata[] = $gallery_image;
                }

                $product->gellary_img=json_encode($imagedata);
            }
            else{
                $product->gellary_img = $product->gallery_image;
            }
        
        $product->update();
        $notification = array(
            'message' => ' Product Updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('product.index')->with($notification);
    //    }
    //    else{
    //     $notification = array(
    //         'message' => ' Something went wrong',
    //         'alert-type' => 'error'
    //     );
    //     return redirect()->back()->with($notification);
    //    }
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
