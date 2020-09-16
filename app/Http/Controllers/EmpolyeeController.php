<?php

namespace App\Http\Controllers;

use App\Empolyee;
use Illuminate\Http\Request;
use Image;
use File;

class EmpolyeeController extends Controller
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
        $empolyee = Empolyee::latest()->get();
        return view('admin.pages.empolyee.index',compact('empolyee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.empolyee.create');
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
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'experience' => 'required',
            'salary' => 'required',
            'city' => 'required',
            'photo' => 'nullable',
        ]);

        $empolyee = new Empolyee;
        $empolyee->name = $request->name;
        $empolyee->email = $request->email;
        $empolyee->phone = $request->phone;
        $empolyee->address = $request->address;
        $empolyee->experience = $request->experience;
        $empolyee->salary = $request->salary;
        $empolyee->city = $request->city;

        if($request->hasFile('photo')){
            //insert that image
             $image = $request->file('photo');
             $img = time().'.'. $image->getClientOriginalExtension();
             $location = public_path('images/empolyee/'.$img);
             Image::make($image)->save($location);
           $empolyee->photo = $img;
          }

        $empolyee->save();
        $notification = array(
            'message' => 'Successfully Empolyee Inserted!',
            'alert-type' => 'success'
        );

        return Redirect()->route('empolyee.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empolyee  $empolyee
     * @return \Illuminate\Http\Response
     */
    public function show(Empolyee $empolyee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empolyee  $empolyee
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $empolyee = Empolyee::find($id); 
        return view('admin.pages.empolyee.edit',compact('empolyee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empolyee  $empolyee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'experience' => 'required',
            'salary' => 'required',
            'city' => 'required',
            'photo' => 'nullable',
        ]);

        $empolyee =  Empolyee::find($id);
        $empolyee->name = $request->name;
        $empolyee->email = $request->email;
        $empolyee->phone = $request->phone;
        $empolyee->address = $request->address;
        $empolyee->experience = $request->experience;
        $empolyee->salary = $request->salary;
        $empolyee->city = $request->city;

        if($request->hasFile('photo') ){
            //delete  old image first
            if(File::exists('images/empolyee/'.$empolyee->photo))
              {
                  File::delete('images/empolyee/'.$empolyee->photo);
              }
             $image = $request->file('photo');
             $img = time().'.'. $image->getClientOriginalExtension();
             $location = public_path('images/empolyee/'.$img);
             Image::make($image)->save($location);
           $empolyee->photo = $img;
          }

        $empolyee->save();
        $notification = array(
            'message' => 'Successfully Empolyee Updated!',
            'alert-type' => 'success'
        );

        return Redirect()->route('empolyee.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empolyee  $empolyee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empolyee =  Empolyee ::find($id);
        if(!is_null($empolyee)){
            $empolyee->delete();
            $notification = array(
                'message' => 'Successfully Empolyee Deleted!',
                'alert-type' => 'success'
            );
        }
        
        return Redirect()->back()->with($notification);
    }
}
