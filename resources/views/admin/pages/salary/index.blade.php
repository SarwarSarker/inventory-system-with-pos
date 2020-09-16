@extends('admin.layout.master')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ALL Salary</h1>
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
              <h3 class="card-title">Salary Lists</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <tr>
                        <th>#</th>
                        <th>Empolyee Name</th>
                        <th>Month</th>
                        <th>Year</th>
                        <th>Advanced Salary</th>
                        <th>Action</th>
                    </tr>
                </tr>
                </thead>
                <tbody>
                    @foreach($salary as $row)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>Empolyee Name</td>
                            <td>{{ $row->month }}</td>
                            <td>{{ $row->year }}</td>
                            <td>{{ $row->advanced_salary }}</td>
                            <td>
                            <a href="{{ route('salary.edit', $row->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ route('salary.delete', $row->id) }}" class="btn btn-danger" id="delete">Delete</a>
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