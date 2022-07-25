
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
					<div class="col-md-12">
						<div class="dashboard-content">
							<div class="cart">
								<div class="cart-body">
									<form action="{{route('dashboard.update')}}" method="post" id="valideform" enctype="multipart/form-data">
					                  @csrf
					                  <div class="row">
					                    
					                    <div class="form-group col-md-4">
					                      <label for="name">Name</label>
					                      <input type="text" class="form-control" id="name" value="{{$editdata->name}}" name="name">
					                      <font style="color:red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
					                    </div>
					                    <div class="form-group col-md-4">
					                      <label for="email">Email</label>
					                      <input type="email" class="form-control" id="email" value="{{$editdata->email}}" name="email">
					                      <font style="color:red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
					                    </div>
					                    <div class="form-group col-md-4">
					                      <label for="mobile">Mobile</label>
					                      <input type="text" class="form-control" id="mobile" value="{{$editdata->mobile}}" name="mobile">
					                      <font style="color:red">{{($errors->has('mobile'))?($errors->first('mobile')):''}}</font>
					                    </div>
					                    <div class="form-group col-md-4">
					                      <label for="address">Address</label>
					                      <input type="text" class="form-control" id="address" value="{{$editdata->address}}" name="address">
					                    </div>
					                    <div class="form-group col-md-4">
					                      <label for="gender">Gender</label>
					                        
					                        <select name="gender" id="gender" class="form-control">
					                          <option value="">Select Role</option>
					                          <option value="Male" {{($editdata->gender=="Male")?"selected":""}}>Male</option>
					                          <option value="Female" {{($editdata->gender=="Female")?"selected":""}}>Female</option>
					                        </select>
					                      
					                    </div>

					                    <div class="form-group col-md-4">
					                      <label for="image">Image</label>
					                      <input type="file" class="form-control" id="image" value="{{$editdata->image}}" name="image">
					                    </div>
					                    <div class="form-group col-md-4">
					                      <img src="{{(!empty($editdata->image))?url('public/upload/users/'.$editdata->image):url('public/download.jpg')}}" id="showimage" alt="" width="300px" height="300px">
					                    </div>
					                    <div class="form-group col-md-4" style="margin-top: 50px">
					                      <button type="submit" class="btn btn-success">Update</button>
					                    </div>
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
            name: {
                required: true,
            },
            email: {
                required: true,
            },
            mobile: {
                required:true,
            },
        },
        messages:{
          name:{
            required:"Please Enter Your Full Name",
          },
          email:{
            required:"Please enter Your Email",
          },
          mobile:{
            required:"Please enter Your Mobile Number",
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