@extends('admin.layout.master')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header bg-info mb-2">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Product Form</h1>
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
                  <h3 class="card-title">Add Product</h3>
                </div>
                @include('admin.partials.message')
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputName1">Product Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Enter Name" name="p_name" > 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCategory_name1">Category Name</label>
                      <select class="form-control " id="exampleInputCategory_name1"" name="cat_name">
                          <option value="">Select a category name for this product</option> 
                          @foreach(App\Category::orderBy('id','asc')->get() as $row)
                          <option value="{{$row->name}}">{{$row->name}}</option>
                          @endforeach
                          </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputSupplier_name1">Supplier Name</label>
                      <select class="form-control " id="exampleInputSupplier_name1"" name="sup_name">
                          <option value="">Select a Supplier name for this product</option> 
                          @foreach(App\Supplier::orderBy('id','asc')->get() as $row)
                          <option value="{{$row->name}}">{{$row->name}}</option>
                          @endforeach
                          </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Product Code</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Enter Product Name" name="p_code" > 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputQuantity1">Quantity</label>
                      <input type="number" class="form-control" id="exampleInputQuantity1" placeholder="Enter Product Quantity"  name="quantity" > 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputImage1">Product Image</label>
                      <input type="file" class="form-control" id="exampleInputImage1"  name="p_image" > 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputBuy_date1">Buy Date</label>
                      <input type="date" class="form-control" id="exampleInputBuy_date1" placeholder="Enter Product Buy_date" name="buying_date" > 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputExpiry_date1">Expiry_date</label>
                      <input type="date" class="form-control" id="exampleInputExpiry_date1" placeholder="Enter Product Expiry_date" name="expiry_date" > 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputBuy_price1">Buy Price</label>
                      <input type="number" class="form-control" id="exampleInputBuy_price1" placeholder="Enter Product Buy_price" name="buying_price" > 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputSelling_price1">Selling Price</label>
                      <input type="number" class="form-control" id="exampleInputSelling_price1" placeholder="Enter Product Selling_price" name="selling_price" > 
                    </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">ADD Product</button>
                  </div>
                </form>
              </div>
            </div>
            </div>
        </div>
    
    <!-- /.content -->
  </div>


@endsection