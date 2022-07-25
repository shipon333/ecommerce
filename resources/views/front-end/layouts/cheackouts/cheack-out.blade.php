
@extends('front-end.layouts.master')
@section('content')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{asset('public/front-end')}}/images/bg-01.jpg');">
    <h2 class="ltext-105 cl0 txt-center">
      Customer Billing Information
    </h2>
  </section>  

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
      <div class="container" data-aos="fade-up">
          <form action="{{route('customer.chaeckout.store')}}" method="post" id="valideform" >
              @csrf
              <div class="row" style="padding: 50px 0px">
                <div class="form-group col-md-6">
                  <label for="name">Full Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Customer Name">
                  <font color="red">{{($errors->has('name'))?($errors->first('name')):' '}}</font>
                </div>
                <div class="form-group col-md-6">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Customer Email">
                  <font color="red">{{($errors->has('email'))?($errors->first('email')):' '}}</font>
                </div>
                <div class="form-group col-md-6">
                  <label for="mobile">Mobile</label>
                  <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Customer Number">
                  <font color="red">{{($errors->has('mobile'))?($errors->first('mobile')):' '}}</font>
                </div>
                <div class="form-group col-md-6">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="Customer Address">
                  <font color="red">{{($errors->has('address'))?($errors->first('address')):' '}}</font>
                </div>
                <div class="form-group col-md-12" style="margin-top: 30px">
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </div>
            </form>
      </div>
  </section><!-- End About Section -->

  <script type="text/javascript">
     $(document).ready(function(){
       $('#valideform').validate({
        rules: {
          name: {
              required: true
          },
          email: {
              required: true
          },
          mobile: {
              required: true
          },
          address: {
              required: true
          },
        },
        messages:{
          name:{
            required:"Please Enter Your Full Name",
          },
          email:{
            required:"Please Enter Your Email",
          },
          mobile:{
            required:"Please Enter Your Number",
          },
          address:{
            required:"Please Enter Your Address",
          },
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
