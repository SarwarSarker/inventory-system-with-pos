@extends('admin.layout.master')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header bg-info">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ALL Supplier</h1>
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
              <h3 class="card-title">Supplier Lists</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <tr>
                        <th>#</th>
                        <th> Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Type</th>
                        <th>Shop</th>
                        <th>Account No</th>
                        <th>Bank Name</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>

                </tr>
                </thead>
                <tbody>
                    @foreach($supplier as $row)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->phone }}</td>
                            <td>{{ $row->address }}</td>
                            <td>{{ $row->type }}</td>
                            <td>{{ $row->shop }}</td>
                            <td>{{ $row->account_number }}</td>
                            <td>{{ $row->bank_name }}</td>
                            <td><img src="{{asset('images/supplier/'. $row->photo)}}" alt="img" width="80px" ></td>
                            <td>
                            <a href="{{ route('supplier.edit', $row->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ route('supplier.delete', $row->id) }}" class="btn btn-danger" id="delete">Delete</a>
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