
@extends('front-end.layouts.master')
@section('content')
<style>
  #login .container #login-row #login-column #login-box {
    margin-top: 120px;
    max-width: 600px;
    border: 1px solid #9C9C9C;
    background-color: #EAEAEA;
    margin: 40px 0px;
  }
  #login .container #login-row #login-column #login-box #login-form {
    padding: 20px;
  }
  #login .container #login-row #login-column #login-box #login-form #register-link {
    margin-top: -85px;
  }
</style>
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{asset('public/front-end')}}/images/bg-01.jpg');">
    <h2 class="ltext-105 cl0 txt-center">
      Customer Signup
    </h2>
  </section>  

  <!-- ======= Login from ======= -->
<div id="login">
      <div class="container">
          <div id="login-row" class="row justify-content-center align-items-center">
              <div id="login-column" class="col-md-6">
                  <div id="login-box" class="col-md-12">
                      <form id="login_form" class="form" action="{{route('signup.store')}}" method="post">
                        @csrf
                          <h3 class="text-center text-info">Signup</h3>
                          <div class="form-group">
                              <label class="text-info">Full Name:</label><br>
                              <input type="text" name="name" id="name" class="form-control">
                              <font color="red">{{($errors->has('name'))?($errors->first('name')):' '}}</font>
                          </div>
                          <div class="form-group">
                              <label  class="text-info">Email:</label><br>
                              <input type="email" name="email" id="email" class="form-control">
                              <font color="red">{{($errors->has('email'))?($errors->first('email')):' '}}</font>
                          </div>
                          <div class="form-group">
                              <label  class="text-info">Mobile:</label><br>
                              <input type="text" name="mobile" id="mobile" class="form-control">
                              <font color="red">{{($errors->has('mobile'))?($errors->first('mobile')):' '}}</font>
                          </div>
                          <div class="form-group">
                              <label  class="text-info">Address:</label><br>
                              <input type="text" name="address" id="address" class="form-control">
                              <font color="red">{{($errors->has('address'))?($errors->first('address')):' '}}</font>
                          </div>
                          <div class="form-group">
                              <label  class="text-info">Password:</label><br>
                              <input type="password" name="password" id="password" class="form-control">
                              <font color="red">{{($errors->has('password'))?($errors->first('password')):' '}}</font>
                          </div>
                          <div class="form-group">
                              <label  class="text-info">Password:</label><br>
                              <input type="password" name="confram_password" id="confram_password" class="form-control">
                          </div>
                          <div class="form-group">
                              <input type="submit" name="submit" class="btn btn-info btn-md" value="Signup">
                              <i class="fa fa-user"></i> You Have Account? <a href="{{route('login.customer')}}">Login Here</a>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>

<script type="text/javascript">
   $(document).ready(function(){
     $('#login_form').validate({
      rules: {
          name: {
              required: true
          },
          email: {
              required: true,
              email: true
          },
          mobile: {
              required: true
          },
          address: {
              required: true
          },
          password: {
                required: true,
                minlength: 9
            },
          confram_password: {
              required:true,
              equalTo: '#password'
          },
      },
      messages:{
        name:{
          required:"Please Enter Your Full Name",
        },
        email:{
          required:"Please Enter Email Address",
        },
        mobile:{
          required:"Please Enter Mobile Number",
        },
        address:{
          required:"Please Enter Address",
        },
        password:{
            required:"Please provide a password",
            minlength:"Password will be 9 characters or number"
          },
        confram_password:{
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
