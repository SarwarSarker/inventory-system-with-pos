@extends('admin.layout.master')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Salary Form</h1>
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
                  <h3 class="card-title">Add Salary</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('salary.update', $salary->id) }}" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputName1">Employee Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" value="{{$salary->emp_name}}" name="emp_name" > 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputMonth1">Month</label>
                      <select class="form-control" id="exampleInputMonth1"   name="month" >
                        @foreach($salary as $item)
                          <option value="{{$item->month}}">{{$item->month}}</option>
                          @endforeach 
                      </select>
                      </div>
                    <div class="form-group">
                      <label for="exampleInputYear1">Year</label>
                      <input type="text" class="form-control" id="exampleInputYear1" value="{{$salary->year}}"name="year" > 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Status</label>
                        <select class="form-control " id="exampleInputStatus1" name="status" required>
                          <option @if(old('status',$salary->status) == 'Active') selected @endif > Active </option>
                          <option @if(old('status',$salary->status) == 'Inactive') selected @endif > Inactive </option>
                           
                        </select> 
                      </div>
                    <div class="form-group">
                      <label for="exampleInputAdvanced_salary1">Advanced Salary</label>
                      <input type="price" class="form-control" id="exampleInputAdvanced_salary1" value="{{$salary->advanced_salary}}" name="advanced_salary" > 
                    </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">ADD Salary</button>
                  </div>
                </form>
              </div>
            </div>
            </div>
        </div>
    
    <!-- /.content -->
  </div>


@endsection
@endsection

