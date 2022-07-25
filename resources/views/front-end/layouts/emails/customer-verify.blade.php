
@extends('front-end.layouts.master')
@section('content')
<style>
  #login .container #login-row #login-column #login-box {
    margin-top: 120px;
    max-width: 600px;
    height: 320px;
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
      Customer Verify
    </h2>
  </section>  

  <!-- ======= Login from ======= -->
<div id="login">
      <div class="container">
          <div id="login-row" class="row justify-content-center align-items-center">
              <div id="login-column" class="col-md-6">
                  <div id="login-box" class="col-md-12">
                      <form id="login-form" class="form" action="{{route('email.verify')}}" method="post">
                        @csrf
                          <h3 class="text-center text-info">Email Verify</h3>
                          <div class="form-group">
                              <label for="email" class="text-info">Email:</label><br>
                              <input type="text" name="email" id="email" class="form-control">
                              <font color="red">{{($errors->has('email'))?($errors->first('email')):' '}}</font>
                          </div>
                          <div class="form-group">
                              <label for="code" class="text-info">Verify Code:</label><br>
                              <input type="text" name="code" id="code" class="form-control">
                              <font color="red">{{($errors->has('code'))?($errors->first('code')):' '}}</font>
                          </div>
                          <div class="form-group">
                              <input type="submit" name="submit" class="btn btn-info btn-md" value="Verify">
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
          email: {
              required: true,
              email: true
          },
          code: {
              required: true
          },
      },
      messages:{
        email:{
          required:"Please Enter Email Address",
        },
        code:{
          required:"Please Enter Verification Code",
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
