<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        $category = category::orderBy('id','desc')->get();
        return view('backend.pages.category.manage',compact('category'));
    }
 

    public function store(Request $request)
    {

        $rules = [
            'name' => 'required|unique:categories',
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
     
        $category = new category;
        $category->name = $request->name;

        $category->save();

        $request->session()->flash('success', 'Category Insert Succesfuslly');
        return 'success';


    }


    public function update(Request $request)
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

        $category = category::find($request->id);

        $category->name = $request->name;
        
            $category->update();

        $request->session()->flash('success', 'Category Update Succesfuslly');
        return 'success';
    }

 

    public function destroy($id)
    {
        $category = category::find($id);
        if($category){
            $category->delete();
            $notification = array(
                'message' => 'Category Deleted Successfully',
                'alert-type' => 'error'
            );
            return redirect()->route('category.index')->with($notification);
        }
    }

}
