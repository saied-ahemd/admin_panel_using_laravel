<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();

        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data 
        $request->validate([
            'name' => 'required',
            'price' =>'required|numeric',
            'description' => 'required',
            'image' =>'image|required'
        ]);

        //upload the image
        if($request->hasFile('image')){
            $image=$request->image;
            $image->move('uploads',$image->getClientOriginalName());

        }

        //save the data in the database 
        //this is away to save the data there is anthour way 
        //$products=new Product()
        //$product->name= $request->name ..... 

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description'=>$request->description,
            'image' => $request->image->getClientOriginalName()
        ]);

        //redirect with a message 
        return redirect()->route('products.create')->with('mess','the data has been inserted succsessfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

        return view('admin\product\details',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        
        return view('admin.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
          //validate the data 
          $request->validate([
            'name' => 'required',
            'price' =>'required|numeric',
            'description' => 'required',
        ]);
        //check if there is any image 
        if($request->hasFile('image')){
            //check if the image is exsit
            if(file_exists(public_path('uploads/').$product->image)){
                //delete the old image form or folder
                unlink(public_path('uploads/'). $product->image);
            }
            //upload the new image inside our folder
            $image=$request->image;
            $image->move('uploads',$image->getClientOriginalName());
            $product->image= $request->image->getClientOriginalName();
            
        }
        //update the data in the data base
        $product->update([
            'name' =>$request->name,
            'price' =>$request->price,
            'description' =>$request->description,
            'image' => $product->image,
        ]);

        //redirect the user to the index with a success message
        return redirect()->route('products.index')->with('mess','the product has been updated successfuly');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('mess','the item has been deleted successfuly');
    }
}
