@extends('admin.layout.master')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header bg-info mb-2">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Empolyee Form</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

    <!-- form -->
   
        <div class="container-fluid">
          <div class="row mb-2">
                <div class="col-md-3"></div>
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Edit Empolyee</h3>
                </div>
                @include('admin.partials.message')
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('empolyee.update', $empolyee->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" value="{{$empolyee->name}}" name="name" > 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" value="{{$empolyee->email}}" name="email" > 
                    </div>
                    <div class="form-group">
                       <label for="exampleInputPhone1">Phone</label>
                       <input type="text" class="form-control" id="exampleInputPhone1" value="{{$empolyee->phone}}" name="phone" > 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputAddress1">Address</label>
                      <input type="text" class="form-control" id="exampleInputAddress1" value="{{$empolyee->address}}"" name="address" > 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputExperience1">Experience</label>
                      <input type="text" class="form-control" id="exampleInputExperience1" value="{{$empolyee->experience}}" name="experience" > 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputSalary1">Salary</label>
                      <input type="text" class="form-control" id="exampleInputSalary1" value="{{$empolyee->salary}}" name="salary" > 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">City</label>
                      <input type="text" class="form-control" id="exampleInputCity1" value="{{$empolyee->city}}" name="city" > 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Photo</label> 
                      <br>
                        Old Photo: <img src="{{asset('images/empolyee/'. $empolyee->photo)}}" alt="img" width="80px" > 
                        <input type="file" class="form-control" id="exampleInputCity1"  name="photo" >
                    </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Edit Empolyee</button>
                  </div>
                </form>
              </div>
            </div>
            </div>
        </div>
    
    <!-- /.content -->
  </div>

@endsection