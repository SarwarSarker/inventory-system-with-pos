@extends('admin.layout.master')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header bg-info">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ALL Pending Order</h1>
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
              <h3 class="card-title">Pending Order Lists</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Quantity</th>
                    <th>Total Amount</th>
                    <th>Payment</th>
                    <th>Order Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($pending as $row)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->order_date }}</td>
                        <td>{{ $row->total_products }}</td>
                        <td>{{ $row->total }}</td>
                        <td>{{ $row->payment_status }}</td>
                        <td><span class="badge badge-danger">{{ $row->order_status }}</span></td>
                        <td>
                        <a href="{{ route('view.orders', $row->id) }}" class="btn btn-info">View</a>
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