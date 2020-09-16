<?php

namespace App\Http\Controllers;

use App\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
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
        $salary = Salary::latest()->get();
        return view('admin.pages.salary.index',compact('salary'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.salary.create');
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
            'emp_name' => 'required',
            'month' => 'required',
            'year' => 'required',
            'status' => 'required',
            'advanced_salary' => 'nullable',
        ]);

        $salary = new Salary;
        $salary->emp_name = $request->emp_name;
        $salary->month = $request->month;
        $salary->year = $request->year;
        $salary->status = $request->status;
        $salary->advanced_salary = $request->advanced_salary;
        $salary->save();

        $notification = array(
            'message' => 'Successfully Salary Inserted!',
            'alert-type' => 'success'
        );

        return Redirect()->route('salary.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function show(Salary $salary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $salary = Salary::find($id); 
        return view('admin.pages.salary.edit',compact('salary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'emp_name' => 'required',
            'month' => 'required',
            'year' => 'required',
            'status' => 'required',
            'advanced_salary' => 'nullable',
        ]);

        $salary =  Salary::find($id);
        $salary->emp_name = $request->emp_name;
        $salary->month = $request->month;
        $salary->year = $request->year;
        $salary->status = $request->status;
        $salary->advanced_salary = $request->advanced_salary;
        $salary->save();

        $notification = array(
            'message' => 'Successfully Salary Updated!',
            'alert-type' => 'success'
        );

        return Redirect()->route('salary.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $salary =  Salary::find($id);
        if(!is_null($salary)){
            $salary->delete();

            $notification = array(
                'message' => 'Successfully Salary Updated!',
                'alert-type' => 'success'
            );
        }
        
        return Redirect()->back()->with($notification);
    }
}
