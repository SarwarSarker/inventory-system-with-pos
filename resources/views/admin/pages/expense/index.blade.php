@extends('admin.layout.master')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header bg-info">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ALL Expense</h1>
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
              <h3 class="card-title">Expense Lists</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <tr>
                        <th>#</th>
                        <th>Details</th>
                        <th>Amount</th>
                        <th>Month</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </tr>
                </thead>
                <tbody>
                    @foreach($expense as $row)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $row->details }}</td>
                            <td>{{ $row->amount }}</td>
                            <td>{{ $row->month }}</td>
                            <td>{{ $row->date }}</td>
                            <td>
                            <a href="{{ route('expense.edit', $row->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ route('expense.delete', $row->id) }}" class="btn btn-danger" id="delete">Delete</a>
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