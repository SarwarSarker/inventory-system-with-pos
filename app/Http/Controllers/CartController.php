<?php

namespace App\Http\Controllers;

use Cart;
use App\Customer;
use Illuminate\Http\Request;
use DB;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function addToCart(Request $request)
    {
        $data  = array();
        $data['id'] = $request->id;
        $data['name'] = $request->name;
        $data['qty'] = $request->qty;
        $data['price'] = $request->price;
        $data['weight'] = $request->weight;

         Cart::add($data);

        $notification = array(
            'message' => 'Successfully Cart Added!',
            'alert-type' => 'success'
        );
        

        return Redirect()->back()->with($notification);
        
    }
    public function update(Request $request, $rowId)
    {
        $qty = $request->qty;
        $update=  Cart::update($rowId, $qty);
        if ($update) {
            $notification = array(
                'message' => 'Successfully Cart Updated!',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => ' Cart not Updated!',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
        
        
        
    }
    public function destroy( $rowId)
    {
        
        Cart::remove($rowId);
        $notification = array(
            'message' => 'Successfully Cart Deleted!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
        
    }
    public function invoice(Request $request)
    {
        $validatedData = $request->validate([
            'cus_id' => 'required',
        ],
        [
            'cus_id.required' => 'Select a Customer'
        ]);
        $cus_id = $request->cus_id;
        $customer = Customer::where('id',$cus_id)->first();
        $contents = Cart::content();
        return view('admin.pages.invoice',compact('customer','contents'));

        
    }
    public function final_invoice(Request $request)
    {
        $data = array();
        $data['customer_id'] = $request->customer_id;
        $data['order_date'] = $request->order_date;
        $data['order_status'] = $request->order_status;
        $data['total_products'] = $request->total_products;
        $data['sub_total'] = $request->sub_total;
        $data['vat'] = $request->vat;
        $data['payment_status'] = $request->payment_status;
        $data['total'] = $request->total;
        $data['pay'] = $request->pay;
        $data['due'] = $request->due;

        $order_id = DB::table('orders')->insertGetId($data);
        $contents = Cart::content();

        $new_data = array();
        foreach ($contents as $content) {
            $new_data['order_id'] = $order_id;
            $new_data['product_id'] = $content->id;
            $new_data['quantity'] = $content->qty;
            $new_data['unitcost'] = $content->price;
            $new_data['total'] = $content->total;

            $insert = DB::table('orderDetails')->insert($new_data);
              
        }
        if ($insert) {
            $notification = array(
                'message' => 'Successfully Invoice Created | Please deliver product and accept status',
                'alert-type' => 'success'
            );
            Cart::destroy();

            return Redirect()->route('pending.orders')->with($notification);

        } else {
            $notification = array(
                'message' => 'Error execption!',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);

        }
    }
}
