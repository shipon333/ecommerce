
@extends('front-end.layouts.master')
@section('content')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{asset('public/front-end')}}/images/bg-01.jpg');">
  <h2 class="ltext-105 cl0 txt-center">
     Products Detasils
  </h2>
</section>  
<section class="sec-product-detail bg0 p-t-65 p-b-60">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-7 p-b-30">
        <div class="p-l-25 p-r-30 p-lr-0-lg">
          <div class="wrap-slick3 flex-sb flex-w">
            <div class="wrap-slick3-dots"></div>
            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

            <div class="slick3 gallery-lb">
              @foreach($subImages as $subImage)
              <div class="item-slick3" data-thumb="{{url('public/upload/product_image/sub_image/'.$subImage->subimage)}}">
                <div class="wrap-pic-w pos-relative">
                  <img src="{{url('public/upload/product_image/sub_image/'.$subImage->subimage)}}" alt="IMG-PRODUCT">

                  <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{url('public/upload/product_image/sub_image/'.$subImage->subimage)}}">
                    <i class="fa fa-expand"></i>
                  </a>
                </div>
              </div>
              @endforeach

            
            </div>
          </div>
        </div>
      </div>
        
      <div class="col-md-6 col-lg-5 p-b-30">
        <div class="p-r-50 p-t-5 p-lr-0-lg">
          <h4 class="mtext-105 cl2 js-name-detail p-b-14">
            {{$product->name}}
          </h4>

          <span class="mtext-106 cl2">
            TK {{$product->price}}
          </span>

          <p class="stext-102 cl3 p-t-23">
            {{$product->sort_desc}}
          </p>
          
          <!--  -->
          <div class="p-t-33">
            <form action="{{route('insert.cart')}}" method="post" id="valideform">
             @csrf
              <input type="hidden" name="id" value="{{$product->id}}">
              <div class="flex-w flex-r-m p-b-10">
                <div class="size-203 flex-c-m respon6">
                  Size
                </div>

                <div class="size-204 respon6-next">
                  <div class="rs1-select2 bor8 bg0">
                    <select class="js-select2" name="size_id" id="size_id">
                      <option value=" ">Choose an Size</option>
                      @foreach($sizes as $size)
                          <option value="{{$size['size']['id']}}">{{$size['size']['name']}}</option>
                      @endforeach
                    </select>
                    <div class="dropDownSelect2"></div>
                    <font color="red">{{($errors->has('size_id'))?($errors->first('size_id')):' '}}</font>
                  </div>
                </div>
              </div>

              <div class="flex-w flex-r-m p-b-10">
                <div class="size-203 flex-c-m respon6">
                  Color
                </div>

                <div class="size-204 respon6-next">
                  <div class="rs1-select2 bor8 bg0">
                    <select class="js-select2" name="color_id" id="color_id">
                      <option value=" ">Choose an Color</option>
                      @foreach($colors as $color) 
                          <option value="{{$color['color']['id']}}">{{$color['color']['name']}}</option>
                      @endforeach
                    </select>
                    <div class="dropDownSelect2"></div>
                    <font color="red">{{($errors->has('color_id'))?($errors->first('color_id')):' '}}</font>
                  </div>
                </div>
              </div>

              <div class="flex-w flex-r-m p-b-10">
                <div class="size-204 flex-w flex-m respon6-next">
                  <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                      <i class="fs-16 zmdi zmdi-minus"></i>
                    </div>

                    <input class="mtext-104 cl3 txt-center num-product" type="number" name="qty" value="1">

                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                      <i class="fs-16 zmdi zmdi-plus"></i>
                    </div>
                  </div>

                  <button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                    Add to cart
                  </button>
                </div>
              </div> 
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="bor10 m-t-50 p-t-43 p-b-40">
      <!-- Tab01 -->
      <div class="tab01">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item p-b-10">
            <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
          </li>

          <li class="nav-item p-b-10">
            <a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional information</a>
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content p-t-43">
          <!-- - -->
          <div class="tab-pane fade show active" id="description" role="tabpanel">
            <div class="how-pos2 p-lr-15-md">
              <p class="stext-102 cl6">
                {{$product->long_desc}}
              </p>
            </div>
          </div>

          <!-- - -->
          <div class="tab-pane fade" id="information" role="tabpanel">
            <div class="row">
              <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                <ul class="p-lr-28 p-lr-15-sm">
                  <li class="flex-w flex-t p-b-7">
                    <span class="stext-102 cl3 size-205">
                      Category
                    </span>

                    <span class="stext-102 cl6 size-206">
                      {{$product['category']['name']}}
                    </span>
                  </li>
                  <li class="flex-w flex-t p-b-7">
                    <span class="stext-102 cl3 size-205">
                      Brand
                    </span>

                    <span class="stext-102 cl6 size-206">
                      {{$product['brand']['name']}}
                    </span>
                  </li>

                  <li class="flex-w flex-t p-b-7">
                    <span class="stext-102 cl3 size-205">
                      Color
                    </span>

                    <span class="stext-102 cl6 size-206">
                    @foreach($colors as $color) 
                        {{$color['color']['name']}},
                    @endforeach
                    </span>
                  </li>

                  <li class="flex-w flex-t p-b-7">
                    <span class="stext-102 cl3 size-205">
                      Size
                    </span>

                    <span class="stext-102 cl6 size-206">
                      @foreach($sizes as $size)
                        {{$size['size']['name']}},
                       @endforeach
                    </span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
     $(document).ready(function(){
         $('#valideform').validate({
            rules: {
                size_id: {
                    required: true
                },
                color_id: {
                    required: true
                },
            },
            messages:{
              size_id:{
                required:"Please Select Product Size",
              },
              color_id:{
                required:"Please Select Product Color",
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
