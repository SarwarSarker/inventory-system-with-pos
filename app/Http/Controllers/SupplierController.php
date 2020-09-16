<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Image;
use File;

class SupplierController extends Controller
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
        $supplier = Supplier::latest()->get();
        return view('admin.pages.supplier.index',compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.supplier.create');
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
            'name'=> 'required',
            'email'=> 'required',
            'phone'=> 'required',
            'address'=> 'required',
            'type'=> 'required',
            'photo'=> 'nullable',
            'shop'=> 'required',
            'account_number'=> 'nullable',
            'bank_name'=> 'nullable',
        ]);

            

        $supplier = new Supplier;
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        $supplier->type = $request->type;
        $supplier->shop = $request->shop;
        $supplier->account_number = $request->account_number;
        $supplier->bank_name = $request->bank_name;

        if($request->hasFile('photo')){
            //insert that image
             $image = $request->file('photo');
             $img = time().'.'. $image->getClientOriginalExtension();
             $location = public_path('images/supplier/'.$img);
             Image::make($image)->save($location);
           $supplier->photo = $img;
          }

        $supplier->save();

        $notification = array(
            'message' => 'Successfully Supplier Inserted!',
            'alert-type' => 'success'
        );

        return Redirect()->route('supplier.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('admin.pages.supplier.edit',compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'phone'=> 'required',
            'address'=> 'required',
            'type'=> 'required',
            'photo'=> 'nullable',
            'shop'=> 'required',
            'account_number'=> 'nullable',
            'bank_name'=> 'nullable',
        ]);

        $supplier = Supplier::find($id);
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        $supplier->type = $request->type;
        $supplier->shop = $request->shop;
        $supplier->account_number = $request->account_number;
        $supplier->bank_name = $request->bank_name;

        if($request->hasFile('photo') ){
            //delete  old image first
            if(File::exists('images/supplier/'.$supplier->photo))
              {
                  File::delete('images/supplier/'.$supplier->photo);
              }
             $image = $request->file('photo');
             $img = time().'.'. $image->getClientOriginalExtension();
             $location = public_path('images/supplier/'.$img);
             Image::make($image)->save($location);
           $supplier->photo = $img;
          }

        $supplier->save();

        $notification = array(
            'message' => 'Successfully Supplier Updated!',
            'alert-type' => 'success'
        );

        return Redirect()->route('supplier.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier =  Supplier::find($id);
        if(!is_null($supplier)){
            $supplier->delete();

            $notification = array(
                'message' => 'Successfully Supplier Deleted!',
                'alert-type' => 'success'
            );
        }
        
        return Redirect()->back()->with($notification);
    }
}
