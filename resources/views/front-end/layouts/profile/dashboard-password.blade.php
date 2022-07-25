
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
      Customer Password Change
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
					<div class="col-md-12">
						<div class="dashboard-content">
							<div class="cart">
								<div class="cart-body">
									<form action="{{route('dashboard.password.update')}}" method="post" id="valideform">
					                  @csrf
					                  <div class="row">
					                    <div class="form-group col-md-4">
					                      <label for="old_password">Old Password</label>
					                      <input type="password" class="form-control" id="old_password" name="old_password">
					                    </div>
					                    <div class="form-group col-md-4">
					                      <label for="new_password">New Password</label>
					                      <input type="password" class="form-control" id="new_password" name="new_password">
					                    </div>
					                    <div class="form-group col-md-4">
					                      <label for="con_password">Confram Password</label>
					                      <input type="password" class="form-control" id="con_password" name="con_password">
					                    </div>
					                  </div>
					                  <div class="form-group">
					                    <button type="submit" class="btn btn-success">Update</button>
					                  </div>
					                </form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section><!-- End About Section -->

    <script type="text/javascript">
     $(document).ready(function(){
       $('#valideform').validate({
        rules: {
            old_password: {
                required: true,
            },
            new_password: {
                required: true,
                minlength: 9
            },
            con_password: {
                required:true,
                equalTo: '#new_password'
            },
        },
        messages:{
          old_password:{
            required:"Please old password password",
          },
          new_password:{
            required:"Please enter new password",
            minlength:"Password will be 9 characters or number"
          },
          con_password:{
            required:"Please enter confram password",
            equalTo:"confram password does not match"
          }
        },
        errorElement:'span',
        errorPlacement:function(error, element){
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error)
        },
        highlight:function(element, errorClass, validClass){
          $(element).addClass('is-invalid');
        },
        unhighlight:function(element, errorClass, validClass){
          $(element).removeClass('is-invalid');
        }
    });

    });
  </script>

 @endsection