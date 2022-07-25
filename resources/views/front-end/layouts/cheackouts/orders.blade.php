
@extends('front-end.layouts.master')
@section('content')
<style>
	.dashboard-menu ul {
    width: 70%;
    padding: 30px;
}
.text-center {
    width: 150px;
    height: auto;
    margin: 0 auto;
}
.dashboard-menu ul li {
    background: #ccc;
    margin-bottom: 5px;}

.dashboard-menu ul li a {
    display: block;
    color: #000;
    padding: 15px 25px;
    transition: .4s;
}
.dashboard-menu ul li:hover a {
    background: blue;
    color: #fff;
    transition: .4s;
}
section#about {
    padding: 50px 0px;
}
.dashboard-content {
    text-align: center;
}
.profile-image {
    margin-bottom: 20px;
}
.profile-info {
    margin-bottom: 20px;
}
</style>
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{asset('public/front-end')}}/images/bg-01.jpg');">
    <h2 class="ltext-105 cl0 txt-center">
      Customer Dashboard
    </h2>
</section>  

  <!-- ======= About Section ======= -->
<section id="about" class="about">
	<div class="container" data-aos="fade-up">
		<div class="row">
			<div class="col-md-4">
				<div class="dashboard-menu">
					<ul>
						<li>
							<a href="{{route('dashboard')}}">My Profile</a>
						</li>
						<li>
							<a href="{{route('dashboard.password.view')}}">Password Change</a>
						</li>
						<li>
							<a href="{{route('order.list')}}">My Order</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-md-8">
				<div class="row">
					<table class="table table-borderd">
						<thead>
							<tr>
								<td>Order No</td>
								<td>Total</td>
								<td>Payment Method</td>
								<td>Status</td>
								<td>Action</td>
							</tr>
						</thead>
						<tbody>
							@foreach($orders as $order)
							<tr>
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
								<td> <a href="{{route('order.details',$order->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i> Details</a> </td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section><!-- End About Section -->

    

 @endsection