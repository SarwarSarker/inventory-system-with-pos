@extends('admin.layout.master')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header bg-info mb-2">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Customer Form</h1>
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
                  <h3 class="card-title">Add Customer</h3>
                </div>
                @include('admin.partials.message')
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('customer.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Enter Name" name="name" > 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email" name="email" > 
                    </div>
                    <div class="form-group">
                       <label for="exampleInputPhone1">Phone</label>
                       <input type="text" class="form-control" id="exampleInputPhone1" placeholder="Enter Phone" name="phone" > 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputAddress1">Address</label>
                      <input type="text" class="form-control" id="exampleInputAddress1" placeholder="Enter Address" name="address" > 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputShopname1">Shopname</label>
                      <input type="text" class="form-control" id="exampleInputShopname1" placeholder="Enter Shopname" name="shopname" > 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputAccount_number1">Account Number</label>
                      <input type="text" class="form-control" id="exampleInputAccount_number1" placeholder="Enter Account Number" name="account_number" > 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputBank_name1">Bank Name</label>
                      <input type="text" class="form-control" id="exampleInputBank_name1" placeholder="Enter Bank_name" name="bank_name" > 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Photo</label> 
                      <input type="file" class="form-control" id="exampleInputCity1"  name="photo" >
                    </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">ADD Customer</button>
                  </div>
                </form>
              </div>
            </div>
            </div>
        </div>
    
    <!-- /.content -->
  </div>

@endsection