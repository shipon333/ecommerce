
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
      	Order Details
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
					<table class="table" width="100%" border="1" style="text-align: center;">
						<thead>
							<tr>
								<td width="30%">
									<img src="{{(!empty($logos->image))?url('public/upload/logos/'.$logos->image):url('public/download.jpg')}}" alt="" >
								</td>
								<td width="40%">
									<span style="font-size: 30px; font-weight: bold;"><strong>Furnish Furniture</strong></span><br>
									<span><strong>Mobile</strong>{{$contacts->mobile}}</span><br>
									<span><strong>Email</strong>{{$contacts->email}}</span><br>
									<span><strong>Address</strong>{{$contacts->address}}</span><br>
								</td>
								<td width="30%"><strong>Order No</strong> : # {{$orders->order_no}}</td>
							</tr>
							<tr>
								<td><strong>Billing Info</strong></td>
								<td colspan="2">
									<span><strong>Name</strong>{{$orders['shiping']['name']}}</span> &nbsp;&nbsp;&nbsp;&nbsp;
									<span><strong>Email</strong>{{$orders['shiping']['email']}}</span><br>
									<span><strong>Mobile</strong>{{$orders['shiping']['mobile']}}</span>&nbsp;&nbsp;&nbsp;&nbsp;
									<span><strong>Address</strong>{{$orders['shiping']['address']}}</span><br>
									<span><strong>Payment</strong>{{$orders['payment']['payment_methods']}}</span>
									
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
				</div>
			</div>
		</div>
	</div>
</section><!-- End About Section -->

    

 @endsection