<?php

namespace App\Http\Controllers;

use App\Product;
use App\Customer;
use Illuminate\Http\Request;
use DB;

class PosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $product = Product::orderBy('id','asc')->get();
        $customer = Customer::orderBy('id','asc')->get();
        return view('admin.pages.pos', compact('product','customer'));
    }
    public function pendingOrders()
    {
        $pending = DB::table('orders')
                   ->join('customers','orders.customer_id','customers.id')
                   ->select('customers.name','orders.*')
                   ->where('order_status','pending')
                   ->get();

        return view('admin.pages.order.pending_orders',compact('pending'));
    }
    public function viewOrders($id)
    {
        $order = DB::table('orders')
                   ->join('customers','orders.customer_id','customers.id')
                   ->select('customers.*','orders.*')
                   ->where('orders.id',$id)
                   ->first();
         $order_details = DB::table('orderDetails')
                        ->join('products','orderDetails.product_id','products.id')
                        ->select('products.p_name','products.p_code','orderDetails.*')        
                        ->where('order_id',$id)
                        ->get();
        
        return view('admin.pages.order.confirm_orders',compact('order','order_details'));

    }
    public function posDone($id)
    {
        $approve = DB::table('orders')->where('id',$id)->update(['order_status'=> "success"]);

        if ($approve) {
            $notification = array(
                'message' => 'Successfully Order Comfirmed | And All Products are Delivered ',
                'alert-type' => 'success'
            );

            return Redirect()->route('pending.orders')->with($notification);

        } else {
            $notification = array(
                'message' => 'Error execption!',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);

        }
    }
    public function successOrders()
    {
        $success = DB::table('orders')
                   ->join('customers','orders.customer_id','customers.id')
                   ->select('customers.name','orders.*')
                   ->where('order_status','success')
                   ->get();

        return view('admin.pages.order.success_orders',compact('success'));
    }
    
}
