<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
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
        $expense = Expense::latest()->get();
        return view('admin.pages.expense.index',compact('expense'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.expense.create');
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
            'details' => 'required',
            'amount' => 'required',
            'month' => 'required',
            'date' => 'required',
        ]);

        $expense = new Expense;
        $expense->details = $request->details;
        $expense->amount = $request->amount;
        $expense->month = $request->month;
        $expense->date = $request->date;
        $expense->save();

        $notification = array(
            'message' => 'Successfully Expense Inserted!',
            'alert-type' => 'success'
        );

        return Redirect()->route('expense.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expense = Expense::find($id); 
        return view('admin.pages.expense.edit',compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'details' => 'required',
            'amount' => 'required',
            'month' => 'required',
            'date' => 'required',
        ]);

        $expense =  Expense::find($id);
        $expense->details = $request->details;
        $expense->amount = $request->amount;
        $expense->month = $request->month;
        $expense->date = $request->date;
        $expense->save();

        $notification = array(
            'message' => 'Successfully Expense Updated!',
            'alert-type' => 'success'
        );

        return Redirect()->route('expense.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $expense =  Expense::find($id);
        if(!is_null($expense)){
            $expense->delete();
            $notification = array(
                'message' => 'Successfully Expense Deleted!',
                'alert-type' => 'success'
            );
        }
        
        return Redirect()->back()->with($notification);
    }
}
