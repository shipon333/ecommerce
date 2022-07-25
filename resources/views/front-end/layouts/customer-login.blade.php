
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
      Customer Login
    </h2>
  </section>  

  <!-- ======= Login from ======= -->
<div id="login">
      <div class="container">
          <div id="login-row" class="row justify-content-center align-items-center">
              <div id="login-column" class="col-md-6">
                  <div id="login-box" class="col-md-12">
                      <form id="login-form" class="form" action="{{ route('login') }}" method="post">
                        @csrf
                        @if($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            @foreach($errors->all() as $error)
                            <strong>{{$error}}</strong></br>
                            @endforeach
                        </div>
                        @endif
                        @if(Session::get('massage'))
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{Session::get('massage')}}</strong></br>
                        </div>
                        @endif
                          <h3 class="text-center text-info">Login</h3>
                          <div class="form-group">
                              <label for="email" class="text-info">Email:</label><br>
                              <input type="text" name="email" id="email" class="form-control">
                          </div>
                          <div class="form-group">
                              <label for="password" class="text-info">Password:</label><br>
                              <input type="password" name="password" id="password" class="form-control">
                          </div>
                          <div class="form-group">
                              <input type="submit" name="submit" class="btn btn-info btn-md" value="Login">
                              <i class="fa fa-user"></i> No Acount Yet? <a href="{{route('signup.customer')}}">Signup</a>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <script type="text/javascript">
   $(document).ready(function(){
     $('#login-form').validate({
      rules: {
          email: {
              required: true,
              email: true
          },
          password: {
                required: true,
                minlength: 8
            }
      },
      messages:{
        email:{
          required:"Please Enter Email Address",
        },
        password:{
            required:"Please provide a password",
            minlength:"Password will be 8 characters or number"
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
