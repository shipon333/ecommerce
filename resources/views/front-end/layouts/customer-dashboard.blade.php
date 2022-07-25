
@extends('front-end.layouts.master')
@section('content')
<style>
	.dashboard-menu ul {
    width: 70%;
    padding: 30px;
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
							<a href="">My Profile</a>
						</li>
						<li>
							<a href="">Password Change</a>
						</li>
						<li>
							<a href="">My Order</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<div class="dashboard-content">
							<div class="cart">
								<div class="cart-body">
									<div class="profile-image">
										<div class="text-center">
							                <img class="profile-user-img img-fluid img-circle"
							                     src="{{(!empty($user->image))?url('public/upload/users/'.$user->image):url('public/download.jpg')}}"
							                     alt="User profile picture">
							              </div>
									</div>
									<div class="profile-info">
										<h2>Name: {{$user->name}}</h2>
										<p>Address : {{$user->address}}</p>
									</div>
									<table class="table table-bordered">
										<tbody>
											<tr>
												<td>Mobile</td>
												<td>{{$user->mobile}}</td>
											</tr>
											<tr>
												<td>Email</td>
												<td>{{$user->email}}</td>
											</tr>
											<tr>
												<td>Gender</td>
												<td>{{$user->gender}}</td>
											</tr>
										</tbody>
									</table>
									<a href="{{route('dashboard.edit')}}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section><!-- End About Section -->

    

 @endsection