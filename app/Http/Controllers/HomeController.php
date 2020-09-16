<?php

namespace App\Http\Controllers;

use DB;
use App\Expense;
use App\Customer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $expense = Expense::orderBy('id','asc')->sum('amount');
        $customer = Customer::orderBy('id','asc')->get();
        $order = DB::table('orders')->where('order_status','=','pending')->get();
       
        $today = date('d-m-y');
        $today_sales =  DB::table("orders")->where('order_date','=',$today)->sum("total");
        return view('admin.pages.dashboard',compact('customer','order','expense','today_sales'));
    }
    
   
}
