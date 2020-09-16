@extends('admin.layout.master')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header bg-info mb-2">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Expense Form</h1>
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
                  <h3 class="card-title">Edit Expense</h3>
                </div>
                @include('admin.partials.message')
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('expense.update', $expense->id) }}" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputdetails1">Details</label>
                      <textarea class="form-control" id="exampleInputdetails1" name="details" >
                        {{$expense->details}}
                      </textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputAmount1">Amount</label>
                      <input type="text" class="form-control" id="exampleInputAmount1"  value="{{$expense->amount}}" name="amount" > 
                    </div>
                    <div class="form-group">
                    <input type="hidden" class="form-control" id="exampleInputMonth1" value="{{date('F')}}"  name="month" > 
                    </div>
                    <div class="form-group">
                      <input type="hidden" class="form-control" id="exampleInputDate1" value="{{date('d-m-y')}}" name="date" > 
                    </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Edit Expense</button>
                  </div>
                </form>
              </div>
            </div>
            </div>
        </div>
    
    <!-- /.content -->
  </div>


@endsection