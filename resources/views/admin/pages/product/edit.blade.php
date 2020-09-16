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
                  <h3 class="card-title">Edit Product</h3>
                </div>
                @include('admin.partials.message')
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputName1">Product Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" value="{{$product->p_name}}" name="p_name" > 
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCategory_name1">Category Name</label>
                        <select class="form-control " id="category_name" name="cat_name">
                          <option value="">Select a category name for this product</option> 
                          @foreach(App\Category::orderBy('id','asc')->get() as $row)
                          <option value="{{$row->id}}" {{$row->name  ==  $product->cat_name ? 'selected' : ''}} >{{$row->name}}</option>
                          @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputSupplier_name1">Supplier Name</label>
                        <select class="form-control " id="exampleInputSupplier_name1"" name="sup_name">
                            <option value="">Select a Supplier name for this product</option> 
                            @foreach(App\Supplier::orderBy('id','asc')->get() as $row)
                            <option value="{{$row->id}} "{{$row->name  ==  $product->sup_name ? 'selected' : ''}}>{{$row->name}}</option>
                            @endforeach
                            </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Product Code</label>
                        <input type="text" class="form-control" id="exampleInputName1" value="{{$product->p_code}}" name="p_code" > 
                      </div>
                      <div class="form-group">
                        <label for="exampleInputQuantity1">Quantity</label>
                        <input type="number" class="form-control" id="exampleInputQuantity1" value="{{$product->quantity}}"  name="quantity" > 
                      </div>
                      <div class="form-group">
                        <label for="exampleInputImage1">Product Image</label>
                        <br>
                      Old Photo:  <img src="{{asset('images/product/'. $product->p_image)}}" alt="pro_img" width="50px" >
                        <input type="file" class="form-control" id="exampleInputImage1"  name="p_image" > 
                      </div>
                      <div class="form-group">
                        <label for="exampleInputBuy_date1">Buy Date</label>
                        <input type="date" class="form-control" id="exampleInputBuy_date1" value="{{$product->buying_date}}" name="buying_date" > 
                      </div>
                      <div class="form-group">
                        <label for="exampleInputExpiry_date1">Expiry_date</label>
                        <input type="date" class="form-control" id="exampleInputExpiry_date1" value="{{$product->expiry_date}}" name="expiry_date" > 
                      </div>
                      <div class="form-group">
                        <label for="exampleInputBuy_price1">Buy Price</label>
                        <input type="number" class="form-control" id="exampleInputBuy_price1" value="{{$product->buying_price}}" name="buying_price" > 
                      </div>
                      <div class="form-group">
                        <label for="exampleInputSelling_price1">Selling Price</label>
                        <input type="number" class="form-control" id="exampleInputSelling_price1" value="{{$product->selling_price}}" name="selling_price" > 
                      </div>
                    </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Edit Product</button>
                  </div>
                </form>
              </div>
            </div>
            </div>
        </div>
    
    <!-- /.content -->
  </div>


@endsection