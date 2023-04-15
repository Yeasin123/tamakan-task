<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class BrandController extends Controller
{
 
 
    public function index()
    {
        $brand = Brand::orderBy('id','desc')->get();
        return view('backend.pages.brand.manage',compact('brand'));
    }



    public function create()
    {
        return view('backend.pages.brand.create');
    }

 

    public function store(Request $request)
    {


        $rules = [
            'name' => 'required|unique:brands',
        ];
        $messages = [
            'name.required' => 'The name is required',
            'name.unique' => 'The brand was alreday exsist',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return Response::json([
                    'errors' => $validator->getMessageBag()->toArray()
                ], 400);
        }
     
        $brand = new Brand;
        $brand->name = $request->name;
        $brand->save();

        $request->session()->flash('success', 'Brand Insert Succesfuslly');
        return 'success';
    

    }


    public function brandUpdate(Request $request)
    {

        $rules = [
            'name' => [
                'required',
                Rule::unique('categories')->ignore($request->id),
            ],
        ];
        $messages = [
                'name.required' => 'The name is required',
                'name.unique' => 'The category was alreday exsist',
            ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ], 400);
        }
        $brand = Brand::find($request->id);

        $brand->name = $request->name;
            $brand->update();

        $request->session()->flash('success', 'Brand Delete Succesfuslly');
        return 'success';    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        if($brand){
            $brand->delete();
            $notification = array(
                'message' => 'Brand Deleted Successfully',
                'alert-type' => 'error'
            );
            return redirect()->route('brand.index')->with($notification);
        }
    }
}
