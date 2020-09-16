<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Image;
use File;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::latest()->get();
        return view('admin.pages.product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cat_name'=> 'required',
            'sup_name'=> 'required',
            'p_name'=> 'required',
            'p_code'=> 'required',
            'p_image'=> 'required',
            'quantity'=> 'required',
            'buying_price'=> 'required',
            'selling_price'=> 'required',
            'buying_date'=> 'required',
            'expiry_date'=> 'required',
        ]);


        $product = new Product;
        $product->cat_name = $request->cat_name;
        $product->sup_name = $request->sup_name;
        $product->p_name = $request->p_name;
        $product->p_code = $request->p_code;
        $product->quantity = $request->quantity;
        $product->buying_price = $request->buying_price;
        $product->selling_price = $request->selling_price;
        $product->buying_date = $request->buying_date;
        $product->expiry_date = $request->expiry_date;

        if($request->hasFile('p_image')){
            //insert that image
             $image = $request->file('p_image');
             $img = time().'.'. $image->getClientOriginalExtension();
             $location = public_path('images/product/'.$img);
             Image::make($image)->save($location);
           $product->p_image = $img;
          }

        $product->save();

        $notification = array(
            'message' => 'Successfully Product Inserted!',
            'alert-type' => 'success'
        );

        return Redirect()->route('product.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $category = Category::orderBy('id','asc')->get();
        $product =  Product::find($id);
        return view('admin.pages.product.edit',compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $validatedData = $request->validate([
            'cat_name'=> 'required',
            'sup_name'=> 'required',
            'p_name'=> 'required',
            'p_code'=> 'required',
            'p_image'=> 'required',
            'quantity'=> 'required',
            'buying_price'=> 'required',
            'selling_price'=> 'required',
            'buying_date'=> 'required',
            'expiry_date'=> 'required',
        ]);

        $product =  Product::find($id);
        $product->cat_name = $request->cat_name;
        $product->sup_name = $request->sup_name;
        $product->p_name = $request->p_name;
        $product->p_code = $request->p_code;
        $product->quantity = $request->quantity;
        $product->buying_price = $request->buying_price;
        $product->selling_price = $request->selling_price;
        $product->buying_date = $request->buying_date;
        $product->expiry_date = $request->expiry_date;

        if($request->hasFile('p_image') ){
            //delete  old image first
            if(File::exists('images/product/'.$product->p_image))
              {
                  File::delete('images/product/'.$product->p_image);
              }
             $image = $request->file('p_image');
             $img = time().'.'. $image->getClientOriginalExtension();
             $location = public_path('images/product/'.$img);
             Image::make($image)->save($location);
           $product->p_image = $img;
          }
        $product->save();

        $notification = array(
            'message' => 'Successfully Product Updated!',
            'alert-type' => 'success'
        );

        return Redirect()->route('product.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product =  Product::find($id);
        if(!is_null($product)){
            $product->delete();
            
            $notification = array(
                'message' => 'Successfully Product Deleted!',
                'alert-type' => 'success'
            );
        }
        
        return Redirect()->back()->with($notification);
    }
}
