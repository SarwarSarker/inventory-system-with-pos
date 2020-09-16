<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Image;
use File;

class CustomerController extends Controller
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
        $customer = Customer::latest()->get();
        return view('admin.pages.customer.index',compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.customer.create');
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
           'phone'=> 'required',
           'email'=> 'required',
           'photo'=> 'nullable',
           'address'=> 'required',
           'shopname'=> 'required',
           'account_number'=> 'nullable',
           'bank_name'=> 'nullable',
        ]);

           

        $customer = new Customer;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->shopname = $request->shopname;
        $customer->account_number = $request->account_number;
        $customer->bank_name = $request->bank_name;

        if($request->hasFile('photo')){
            //insert that image
             $image = $request->file('photo');
             $img = time().'.'. $image->getClientOriginalExtension();
             $location = public_path('images/customer/'.$img);
             Image::make($image)->save($location);
           $customer->photo = $img;
          }

        $customer->save();

        $notification = array(
            'message' => 'Successfully Customer Inserted!',
            'alert-type' => 'success'
        );

        return Redirect()->route('customer.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $customer = Customer::find($id);
        return view('admin.pages.customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $validatedData = $request->validate([
            'name'=> 'required',
           'phone'=> 'required',
           'email'=> 'required',
           'photo'=> 'nullable',
           'address'=> 'required',
           'shopname'=> 'required',
           'account_number'=> 'nullable',
           'bank_name'=> 'nullable',
        ]);

        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->shopname = $request->shopname;
        $customer->account_number = $request->account_number;
        $customer->bank_name = $request->bank_name;

        if($request->hasFile('photo') ){
            //delete  old image first
            if(File::exists('images/customer/'.$customer->photo))
              {
                  File::delete('images/customer/'.$customer->photo);
              }
             $image = $request->file('photo');
             $img = time().'.'. $image->getClientOriginalExtension();
             $location = public_path('images/customer/'.$img);
             Image::make($image)->save($location);
           $customer->photo = $img;
          }

        $customer->save();
        $notification = array(
            'message' => 'Successfully Customer Updated!',
            'alert-type' => 'success'
        );

        return Redirect()->route('customer.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $customer = Customer::find($id);
        if(!is_null($customer)){
            $customer->delete();
            $notification = array(
                'message' => 'Successfully Customer Deleted!',
                'alert-type' => 'success'
            );
        }
        
        return Redirect()->back()->with($notification);
    }
}
