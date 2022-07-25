 @extends('backend.layouts.master')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Order Details</h1>
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
                <h3 class="card-title">Order Details
                </h3>
                <a href="{{route('orders.approve.view')}}" class="btn btn-success float-right"><i class="fa fa-plus-circle">Appprove Order List</i></a>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table class="table" width="100%" border="1" style="text-align: center;">
            <thead>
              <tr>
                <td width="30%"><strong>Billing Info</strong></td>
                <td colspan="2" width="70%">
                  <span><strong>Name</strong>{{$orders['shiping']['name']}}</span> &nbsp;&nbsp;&nbsp;&nbsp;
                  <span><strong>Email</strong>{{$orders['shiping']['email']}}</span><br>
                  <span><strong>Mobile</strong>{{$orders['shiping']['mobile']}}</span>&nbsp;&nbsp;&nbsp;&nbsp;
                  <span><strong>Address</strong>{{$orders['shiping']['address']}}</span><br>
                  <span><strong>Payment</strong>{{$orders['payment']['payment_methods']}}</span>&nbsp;&nbsp;&nbsp;&nbsp;
                  <strong>Order No</strong> : # {{$orders->order_no}}
                  
                </td>
              </tr>
              <tr>
                <td colspan="3"><strong>Order Details</strong></td>
              </tr>
              <tr>
                <td>Image & Name</td>
                <td>Color & Size</td>
                <td>Quentity & Price</td>
              </tr>
              @foreach($orders['order_details'] as $details)
              <tr>
                <td>
                  <img src="{{url('public/upload/product_image/'.$details['product']['image'])}}" alt="" width="70px" height="70px"> &nbsp;&nbsp;{{$details['product']['name']}}
                </td>
                <td>
                  <strong>Color : </strong>{{$details['color']['name']}}&nbsp;&nbsp;<strong>Size : </strong>{{$details['size']['name']}}
                </td>
                <td>
                  @php
                    $total = $details->quentity*$details['product']['price'];
                  @endphp
                  {{$details->quentity}}&nbsp;&nbsp;*&nbsp;&nbsp;{{$details['product']['price']}}&nbsp;&nbsp;=&nbsp;&nbsp;{{$total}}
                </td>
              </tr>
              @endforeach
              <tr>
                <td colspan="2"><strong>Grand Total</strong></td>
                <td >{{$orders->order_total}}</td>
              </tr>
            </thead>
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