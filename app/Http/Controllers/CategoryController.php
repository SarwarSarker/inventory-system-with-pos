<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        $category = Category::latest()->get();
        return view('admin.pages.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.category.create');
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
            'name' => 'required',
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->save();
        
        $notification = array(
            'message' => 'Successfully Category Inserted!',
            'alert-type' => 'success'
        );

        return Redirect()->route('category.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id); 
        return view('admin.pages.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $category =  Category::find($id);
        $category->name = $request->name;
        $category->save();
        $notification = array(
            'message' => 'Successfully Category Updated!',
            'alert-type' => 'success'
        );

        return Redirect()->route('category.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category =  Category::find($id);
        if(!is_null($category)){
            $category->delete();
            $notification = array(
                'message' => 'Successfully Category Deleted!',
                'alert-type' => 'success'
            );
        }
        
        return Redirect()->back()->with($notification);
    }
}
