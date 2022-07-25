 @extends('backend.layouts.master')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Approve Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Order</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Approve Order List
                </h3>
                <a href="{{route('orders.pandding.view')}}" class="btn btn-success float-right"><i class="fa fa-plus-circle">Pandding Order List</i></a>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <td>Order No</td>
                      <td>Total</td>
                      <td>Payment Method</td>
                      <td>Status</td>
                      <td>Action</td>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($orders as $key=> $order)
                    <tr class="{{$order->id}}">
                      <td>{{$key+1}}</td>
                      <td>#{{$order->order_no}}</td>
                      <td>{{$order->order_total}} TK</td>
                      <td>
                        {{$order['payment']['payment_methods']}}
                        @if($order['payment']['payment_methods']=='Bkash')
                        TXID : {{ $order['payment']['transection_id']}}
                        @endif
                      </td>
                      <td>
                        @if($order->status == '0')
                        <span style="color: white;background: red; padding: 5px 10px;">Unapproved</span>
                        @elseif($order->status == '1')
                        <span style="color: white;background: blue; padding: 5px 10px;">Approved</span>
                        @endif

                      </td>
                      <td> <a href="{{route('orders.details.view',$order->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i> Details</a> </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
   @endsection