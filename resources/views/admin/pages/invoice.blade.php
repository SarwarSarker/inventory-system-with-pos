@extends('admin.layout.master')


@section('content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Max Grocery Shop
                    <small class="float-right">Date: {{date('d-m-y')}}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>{{auth::user()->name}}</strong><br>
                    Uttara, Sector 14<br>
                    Dhaka, 1203<br>
                    Email: {{auth::user()->email}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>{{$customer->name}}</strong><br>
                    {{$customer->address}}<br>
                    Phone: {{$customer->phone}}<br>
                    Email: {{$customer->email}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice </b><br>
                  <br>
                  <b>Order Date:</b> {{date('d-m-y')}}<br>
                  <b>Order ID:</b> 2222014<br>
                  <b>Order Status:</b> <span class="badge badge-secondary">Pending</span>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Product Name</th>
                      <th>Qty</th>
                      <th>Unit Cost</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    @php
                        $sl=1;
                    @endphp
                    <tbody>
                      @foreach ($contents as $cont)
                      <tr>
                      <td>{{$sl++}}</td>
                      <td>{{$cont->name}}</td>
                      <td>{{$cont->qty}}</td>
                      <td>{{$cont->price}}</td>
                      <td>{{$cont->price * $cont->qty}}</td>  
                    </tr> 
                      @endforeach
                      
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                 
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount </p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>{{Cart::subtotal()}}</td>
                      </tr>
                      <tr>
                        <th>Tax (21%)</th>
                        <td>{{Cart::tax()}}</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>{{Cart::total()}}</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <button type="button" onclick="window.print()" class="btn btn-default" "><i class="fas fa-print"></i> Print</button>
                  {{-- <a href="#" target="_blank"  class="btn btn-default"><i class="fas fa-print"></i> Print</a> --}}
                  <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#payment_submit"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  {{-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button> --}}
                </div>
              </div>
            </div>


            <div class="modal fade" id="payment_submit">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header bg-success">
                    <h4 class="modal-title">Invoice of {{$customer->name}}</h4>
                    <h5 class=" float-right" >Total: {{Cart::total()}}</h5>
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('final.invoice') }}" method="post" >
                      @csrf
                      <div class="row">
                        <div class="col-sm-4">
                          <label >Payment Status</label>
                          <select name="payment_status" class="form-control">
                            <option value="HandCash">HandCash</option>
                            <option value="Cheque">Cheque</option>
                            <option value="Due">Due</option>
                          </select>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label >Pay</label>
                            <input type="text" class="form-control"  name="pay" > 
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label >Due</label>
                            <input type="text" class="form-control" name="due" > 
                        </div>
                        <input type="hidden" name="customer_id" value="{{$customer->id}}">
                        <input type="hidden" name="order_date" value="{{date('d-m-y')}}">
                        <input type="hidden" name="order_status" value="pending">
                        <input type="hidden" name="total_products" value="{{Cart::count()}}">
                        <input type="hidden" name="sub_total" value="{{Cart::subtotal()}}">
                        <input type="hidden" name="vat" value="{{Cart::tax()}}">
                        <input type="hidden" name="total" value="{{Cart::total()}}">
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              
            </form>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->



            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer no-print">
    
  </footer>

@endsection



