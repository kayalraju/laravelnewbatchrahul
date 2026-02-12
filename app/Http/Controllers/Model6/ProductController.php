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
        //dd($request->all());


        // $product=[
        //     'title'=>$request->title,
        //     'price'=>$request->price,
        //     'description'=>$request->description
        //     ];

        // Product::create($product);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
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
        $productUpdate->save();
        return redirect()->route('product.list')->with('success','Product Update Successfully');
    }

    public function delete($id){
        $productDelete = Product::find($id);
        $productDelete->delete();
        return redirect()->route('product.list')->with('success','Product Delete Successfully');
    }
}
