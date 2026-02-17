<?php

namespace App\Http\Controllers\Model6;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function list(){
        $productdata = Product::all();
        //dd($productdata);
        return view('crud.list',compact('productdata'));
    }


    public function create(){
        return view('crud.add');
    }

    public function store(Request $request){
    //     $validateData=$request->validate([
    //        'name'=>'required|min:3',
    //        'email'=>'required|email',
    //        'phone'=>'required|numeric|min:10',
    //        'city'=>'required|min:3',
    //        'skill'=>'required',
    //        'gender'=>'required',
    //        'state'=>'required',
    //        'age'=>'required|numeric'
    //    ],[
    //        'name.required'=>'Name filed is required',
    //        'name.min'=>'Name must be at least 3 characters',
    //        'email.required'=>'Email is required',
    //        'phone.required'=>'Phone is required',
    //        'city.required'=>'City is required',
    //        'skill.required'=>'Skill is required',
    //        'gender.required'=>'Gender is required',
    //        'state.required'=>'State is required',
    //        'age.required'=>'Age is required'
    //    ]);
        //dd($request->all());


        // $product=[
        //     'title'=>$request->title,
        //     'price'=>$request->price,
        //     'description'=>$request->description
        //     ];

        // Product::create($product);

        $request->validate([
            'name'=>'required||max:50||min:5',
            'price'=>'required',
            'description'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ],[
            'name.required'=>'Name filed is required',
            'name.min'=>'Name must be at least 3 characters',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        if($request->hasFile('image')){
               //unlink(public_path('uploads/site_logo/'.$row->site_logo));
                $files = $request->file('image');
                $image = $files->getClientOriginalName();
                $name = time().'.'.$files->getClientOriginalExtension();
                $destinationPath = public_path('/uploads');
                $imagePath = $destinationPath. "/".  $name;
                $files->move($destinationPath, $name);
                $product->image=$name;
            }
        $product->save();

        if($product){
            return redirect()->route('product.list')->with('success','Product create Successfully');
        }else{
            return redirect()->route('product.create')->with('error','Product Not Added');
        }


    }


    public function edit($id){
        $productEdit = Product::find($id);
        return view('crud.edit',compact('productEdit'));
    }

    public function update(Request $request,$id){
        $productUpdate = Product::find($id);
        $productUpdate->name = $request->name;
        $productUpdate->price = $request->price;
        $productUpdate->description = $request->description;
        if ($request->hasFile('image')) {
        // Check if the file exists before deleting it
        $existingImagePath = public_path('uploads/' . $productUpdate->image);
        if (is_file($existingImagePath)) {
            unlink($existingImagePath);  // Delete the existing image file
        }

        $file = $request->file('image');
        $image = $file->getClientOriginalName();
        $name = time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('/uploads');
        $imagePath = $destinationPath . "/" . $name;
        
        // Move the uploaded file
        $file->move($destinationPath, $name);

        // Update the image path in the database
        $productUpdate->image = $name;
    }
        $productUpdate->save();
        return redirect()->route('product.list')->with('success','Product Update Successfully');
    }

    public function delete($id){
        $productDelete = Product::find($id);
        $productDelete->delete();
        return redirect()->route('product.list')->with('success','Product Delete Successfully');
    }
}
