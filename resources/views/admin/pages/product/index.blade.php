@extends('admin.layout.master')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header bg-info">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ALL Product</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Product Lists</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Category Name</th>
                        <th>Supplier Name</th>
                        <th>Product Code</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Buy Date</th>
                        <th>Expiry Date</th>
                        <th>Buy Price</th>
                        <th>Selling Price</th>
                        <th>Action</th>
                    </tr>
                </tr>
                </thead>
                <tbody>
                    @foreach($product as $row)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $row->p_name }}</td>
                            <td>{{ $row->cat_name }}</td>
                            <td>{{ $row->sup_name }}</td>
                            <td>{{ $row->p_code }}</td>
                            <td>{{ $row->quantity }}</td>
                            <td><img src="{{asset('images/product/'. $row->p_image)}}" alt="pro_img" width="80px" ></td>
                            <td>{{ $row->buying_date }}</td>
                            <td>{{ $row->expiry_date }}</td>
                            <td>{{ $row->buying_price }}</td>
                            <td>{{ $row->selling_price }}</td>
                            <td>
                            <a href="{{ route('product.edit', $row->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ route('product.delete', $row->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                </td>
                        </tr>
                        @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
                                    
                            

@endsection