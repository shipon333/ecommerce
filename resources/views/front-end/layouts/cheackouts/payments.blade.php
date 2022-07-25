
@extends('front-end.layouts.master')
@section('content')
<style>
  .sss {
    float: left;
}

.s888 {
    padding: 10px 15px;
    /* margin-left: 14px; */
}
</style>
  <!-- Title page -->
  <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{asset('public/front-end')}}/images/bg-01.jpg');">
    <h2 class="ltext-105 cl0 txt-center">
      Payment Methode
    </h2>
  </section>
    
  <!-- Shoping Cart -->
  <div class="bg0 p-t-75 p-b-85">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12" style="padding-bottom: 30px;">
          <div class="wrap-table-shopping-cart">
            <table class="table table-bordered">
              <tr class="table_head">
                <th>Product</th>
                <th>Image</th>
                <th>Size</th>
                <th>Color</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
              </tr>
              @php
                $contents = Cart::content();
                $total = 0;
              @endphp
              @foreach($contents as $content)
              <tr class="table_row">
                <td>{{$content->name}}</td>
                <td>
                  <div class="how-itemcart1">
                    <img src="{{url('public/upload/product_image/'.$content->options->image)}}" alt="IMG">
                  </div>
                </td>
                <td>{{$content->options->size_name}}</td>
                <td>{{$content->options->color_name}}</td>
                <td>{{$content->price}}</td>
                <td style="width: 200px;min-width: 200px">
                  <form action="{{route('cart.update')}}" method="post">
                    @csrf

                      <div>
                        <input type="number" class="mtext-104 cl3 txt-center num-product form-control sss" id="qty" type="number" name="qty" value="{{$content->qty}}">
                        <input type="hidden" name="rowId" value="{{$content->rowId}}">
                        <input type="submit" value="Update" class="flex-c-m stext-101 cl2 bg8 s888 hov-btn3 plr-15 trans-04 pointer m-tb-10">
                      </div>
                  </form>
                </td>
                <td>{{$content->subtotal}}</td>
                <td>
                  <a href="{{route('cart.delete',$content->rowId)}}" class="btn btn-danger"><i class="fa fa-times"></i></a>
                </td>
              </tr>
              @php
                $total += $content->subtotal;
              @endphp
              @endforeach
              <tr>
                <td colspan="6"><strong>Grand Total</strong></td>
                <td colspan="2"><strong>{{$total}} Tk</strong></td>
              </tr>
              
            </table>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="payment-methode">
            <p><strong>Payment Method</strong></p>
          </div>
        </div>
        <div class="col-md-8">
          <div class="payment-methode">
            
            <form action="{{route('checkout.payments.store')}}" method="post" id="valideform" >
              @csrf
              @foreach($contents as $content)
                <input type="hidden" name="produt_id" value="{{$content->id}}">
                @endforeach
              <div class="row">
                <div class="form-group col-md-4">
                  @if(Session::get('massage'))
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{Session::get('massage')}}</strong></br>
                    </div>
                  @endif
                  <input type="hidden" name="order_total" value="{{$total}}">
                  <label for="name">Methode Name</label>
                  <select name="name" id="name" class="form-control select2">
                    <option value="">Select Name</option>
                    <option value="Hand Cash">Hand Cash</option>
                    <option value="Bkash">Bkash</option>
                  </select>
                  <div class="form-row new_customer" style="display: none;">
                    <p><strong>Account Number</strong></p>
                    <p><strong>01771-835208</strong></p>
                    <div class="form-group">
                      <input type="text" name="transection_id" id="transection_id" class="form-control form-control-sm" placeholder="Transection Id">
                    </div>
                  </div>
                </div>
                <div class="form-group col-md-12" style="margin-top: 30px">
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
     $(document).ready(function(){
       $('#valideform').validate({
        rules: {
          name: {
              required: true
          },
          transection_id: {
              required: true
          },
        },
        messages:{
          name:{
            required:"Please Select Payment Method",
          },
          transection_id:{
            required:"Please Enter Your Transection Number",
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
  <script type="text/javascript">
  $(document).on('change','#name',function(){
    var customer_id = $(this).val();
    if(customer_id == 'Bkash'){
      $('.new_customer').show();
    }
    else{
      $('.new_customer').hide();

    }
  });
</script>

 @endsection
