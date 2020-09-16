@extends('admin.layout.master')


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header  bg-olive">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>POS(Point of Sale)</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li >Date/</li>
              <li >{{date('d-m-y')}}</li>
            </ol>
            </div><!-- /.col -->
          </div>
        </div><!-- /.container-fluid -->
      </section>

    
      
<div class="container pt-4">
  <div class="row">
    <div class="col-sm-6">
          <div class="card">

          <div class="card-body">
            <table class="table table-bordered ">
              <thead class="bg-lightblue">                  
                <tr>
                  <th>Name</th>
                  <th>Qty</th>
                  <th>Single Price</th>
                  <th>Total</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach (Cart::content() as $prod)
                    
               
                <tr>
                  <td>{{$prod->name}}</td>
                  <td>
                    <form action="{{ route('cart.update', $prod->rowId) }}" method="post">
                      @csrf
                    <input type="number" name="qty" value="{{$prod->qty}}" style="width: 40px">
                  <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-check"></i></button>
                </form>  
                </td>
                  <td>{{$prod->price}}</td>
                  <td>{{$prod->price * $prod->qty}}</td>
                  <td><a href="{{ route('cart.destroy', $prod->rowId) }}" id="delete"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
                @endforeach
              </tbody>
            </table>

            <div class="card bg-olive">
              <div class="card-body text-center">
                <h4>SubTotal: {{Cart::subtotal()}}</h4>
                <p>Vat: {{Cart::tax()}}</p>
              </div><hr>
              <div class="card-body text-center">
                <h2>Total: {{Cart::total()}}</h2>
              </div>
            </div>
            

          </div>
          <!-- /.card-body -->
      
          <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-info">
                  <h4 class="modal-title">Add Customer</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  @include('admin.partials.message')
                  <form action="{{ route('customer.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                          <label >Name</label>
                          <input type="text" class="form-control" placeholder="Enter Name" name="name" > 
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label >Email</label>
                          <input type="email" class="form-control"  placeholder="Enter Email" name="email" > 
                      </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label >Phone</label>
                          <input type="text" class="form-control" placeholder="Enter Phone" name="phone" > 
                       </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label ">Address</label>
                          <input type="text" class="form-control" placeholder="Enter Address" name="address" > 
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label >Shopname</label>
                          <input type="text" class="form-control"  placeholder="Enter Shopname" name="shopname" > 
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label >Account No</label>
                          <input type="text" class="form-control"  placeholder="Enter Account Number" name="account_number" > 
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label >Bank Name</label>
                          <input type="text" class="form-control"  placeholder="Enter Bank_name" name="bank_name" > 
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label >Photo</label> 
                          <input type="file" class="form-control"  name="photo" >
                        </div>
                      </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">ADD Customer</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            
          </form>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
          @include('admin.partials.message')
               <form action="{{route('invoice')}}" method="post">
                @csrf
                <div class="card-header">
                  <h3 class="card-title">
                    <h2 class="card-title  text-info"><b>Select Customer</b> </h2>
                  </h3>
                  <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                      <li class="nav-item">
                        <a class="btn btn-info btn-sm  text-light" data-toggle="modal" data-target="#modal-default">ADD New</a>
                      </li>
                    </ul>
                  </div>
                  <div>
                  </div>
                </div>
                <select name="cus_id" class="form-control ">
                  <option ></option>
                  @foreach ($customer as $cus)
                      <option value="{{$cus->id}}">{{$cus->name}}</option>
                  @endforeach
                </select><!-- /.card-header -->

          <div class="text-center pt-4">
            <button type="submit" class="btn btn-info">Create Invoice</button>
          </div>
        </form>
      </div>
   

    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-header ">
          <h2 class="card-title text-info"><b>Product Lists</b> </h2>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Product Code</th>
                    <th>Category</th>
                    <th></th>
                </tr>
            </tr>
            </thead>
            <tbody>
                @foreach($product as $row)
                    <tr>
                      <form action="{{route('cart')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$row->id}}">
                        <input type="hidden" name="name" value="{{$row->p_name}}">
                        <input type="hidden" name="qty" value="1">
                        <input type="hidden" name="price" value="{{$row->selling_price}}">
                        <input type="hidden" name="weight" value="1">
                        <td><img src="{{asset('images/product/'. $row->p_image)}}" alt="pro_img" width="60px" ></td>
                        <td>{{ $row->p_name }}</td>
                        <td>{{ $row->p_code }}</td>
                        <td>{{ $row->cat_name }}</td>
                        <td>
                        <button type="submit" class="btn btn-sm btn-info"><i class="fas fa-plus-square"></i></button></td>
                      </form>
                    </tr>
                    @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
      



</div>

@endsection