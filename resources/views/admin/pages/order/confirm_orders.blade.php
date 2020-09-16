@extends('admin.layout.master')


@section('content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Order</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Order</li>
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
                    <small class="float-right">Today Date: {{date('d/m/y')}}</small>
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
                    <strong>{{$order->name}}</strong><br>
                    {{$order->address}}<br>
                    Phone: {{$order->phone}}<br>
                    Email: {{$order->email}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Order</b><br>
                  <br>
                  <b>Order Date:</b> {{$order->order_date}}<br>
                  <b>Order ID:</b> {{$order->id}}<br>
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
                      <th>Product Code</th>
                      <th>Qty</th>
                      <th>Unit Cost</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($order_details as $cont)
                      <tr>
                      <td>{{$loop->index + 1}}</td>
                      <td>{{$cont->p_name}}</td>
                      <td>{{$cont->p_code}}</td>
                      <td>{{$cont->quantity}}</td>
                      <td>{{$cont->unitcost}}</td>
                      <td>{{$cont->unitcost * $cont->quantity}}</td>  
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
                  <p class="lead"><b>Payment By:</b> {{$order->payment_status}}</p>
                  <p class="lead"><b>Pay:</b> {{$order->pay}}</p>
                  <p class="lead"><b>Due:</b> {{$order->due}}</p> 
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount </p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>{{$order->sub_total}}</td>
                      </tr>
                      <tr>
                        <th>Tax (21%)</th>
                        <td>{{$order->vat}}</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>{{$order->total}}</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              @if ($order->order_status == 'pending')
              <div class="row no-print">
                <div class="col-12">
                  <button type="button" onclick="window.print()" class="btn btn-default" "><i class="fas fa-print"></i> Print</button>
                  
                  <a href="{{route('pos.done', $order->id)}}" class="btn btn-success float-right"> done</a>
                  
                </div>
              </div>
              @else
                  
              @endif
              
            </div>





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



