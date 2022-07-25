<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ledis E-Commerce</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="{{asset('public/front-end')}}/images/icons/favicon.png"/>
  <link rel="stylesheet" type="text/css" href="{{asset('public/front-end')}}/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="{{asset('public/front-end')}}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="{{asset('public/front-end')}}/fonts/iconic/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" type="text/css" href="{{asset('public/front-end')}}/fonts/linearicons-v1.0.0/icon-font.min.css">
  <link rel="stylesheet" type="text/css" href="{{asset('public/front-end')}}/vendor/animate/animate.css">
  <link rel="stylesheet" type="text/css" href="{{asset('public/front-end')}}/vendor/css-hamburgers/hamburgers.min.css">
  <link rel="stylesheet" type="text/css" href="{{asset('public/front-end')}}/vendor/animsition/css/animsition.min.css">
  <link rel="stylesheet" type="text/css" href="{{asset('public/front-end')}}/vendor/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="{{asset('public/front-end')}}/vendor/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" type="text/css" href="{{asset('public/front-end')}}/vendor/slick/slick.css">
  <link rel="stylesheet" type="text/css" href="{{asset('public/front-end')}}/vendor/MagnificPopup/magnific-popup.css">
  <link rel="stylesheet" type="text/css" href="{{asset('public/front-end')}}/vendor/perfect-scrollbar/perfect-scrollbar.css">
  <link rel="stylesheet" type="text/css" href="{{asset('public/front-end')}}/css/util.css">
  <link rel="stylesheet" type="text/css" href="{{asset('public/front-end')}}/css/main.css">
  <!-- select 2 -->
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <script src="{{asset('public/front-end')}}/vendor/jquery/jquery-3.2.1.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js"></script>
  <script src="{{asset('public/backend')}}/plugins/sweetalert/sweetalert.js"></script>
  <link href="{{asset('public/backend')}}/plugins/sweetalert/sweetalert.css" rel="stylesheet">
  <!-- <script src="{{asset('public/backend')}}/plugins/datepicker/datepicker.min.js" type="text/javascript"></script>
    <link href="{{asset('public/backend')}}/plugins/datepicker/datepicker.min.css" rel="stylesheet" type="text/css" /> -->
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <!-- validation -->
  <script src="{{asset('public/backend')}}/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="{{asset('public/backend')}}/plugins/jquery-validation/additional-methods.min.js"></script>
  <style>
    .notifyjs-conner{
      z-index: 1000 !important;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice{
      background-color: #007bff;
    }
  </style>
</head>
<body class="animsition">
@include('front-end.layouts.header')
@yield('content')
@include('front-end.layouts.footer')

  <!-- Back to top -->
  <div class="btn-back-to-top" id="myBtn">
    <span class="symbol-btn-back-to-top">
      <i class="zmdi zmdi-chevron-up"></i>
    </span>
  </div>


@if(session()->has('success'))
    <script type="text/javascript">
      $(function(){
        $.notify("{{session()->get('success')}}",{globalPosition:'top right', className:'success'});
      });
    </script>
  @endif
  @if(session()->has('error'))
    <script type="text/javascript">
      $(function(){
        $.notify("{{session()->get('error')}}",{globalPosition:'top right', className:'error'});
      });
    </script>
  @endif
 
  <script src="{{asset('public/front-end')}}/vendor/animsition/js/animsition.min.js"></script>
  <script src="{{asset('public/front-end')}}/vendor/bootstrap/js/popper.js"></script>
  <script src="{{asset('public/front-end')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="{{asset('public/front-end')}}/vendor/select2/select2.min.js"></script>
  <script>
    $(".js-select2").each(function(){
      $(this).select2({
        minimumResultsForSearch: 20,
        dropdownParent: $(this).next('.dropDownSelect2')
      });
    })
  </script>
  <script src="{{asset('public/front-end')}}/vendor/daterangepicker/moment.min.js"></script>
  <script src="{{asset('public/front-end')}}/vendor/daterangepicker/daterangepicker.js"></script>
  <script src="{{asset('public/front-end')}}/vendor/slick/slick.min.js"></script>
  <script src="{{asset('public/front-end')}}/js/slick-custom.js"></script>
  <script src="{{asset('public/front-end')}}/vendor/parallax100/parallax100.js"></script>

  <script>
        $('.parallax100').parallax100();
  </script>
  <script src="{{asset('public/front-end')}}/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
  <script>
    $('.gallery-lb').each(function() { // the containers for all your galleries
      $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
              enabled:true
            },
            mainClass: 'mfp-fade'
        });
    });
  </script>
  <script src="{{asset('public/front-end')}}/vendor/isotope/isotope.pkgd.min.js"></script>
  <script src="{{asset('public/front-end')}}/vendor/sweetalert/sweetalert.min.js"></script>
  <!-- Select2 -->
<script src="{{asset('public/backend')}}/plugins/select2/js/select2.full.min.js"></script>

  <script>
    $('.js-addwish-b2').on('click', function(e){
      e.preventDefault();
    });

    $('.js-addwish-b2').each(function(){
      var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
      $(this).on('click', function(){
        swal(nameProduct, "is added to wishlist !", "success");

        $(this).addClass('js-addedwish-b2');
        $(this).off('click');
      });
    });

    $('.js-addwish-detail').each(function(){
      var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

      $(this).on('click', function(){
        swal(nameProduct, "is added to wishlist !", "success");

        $(this).addClass('js-addedwish-detail');
        $(this).off('click');
      });
    });

    /*---------------------------------------------*/

    $('.js-addcart-detail').each(function(){
      var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
      $(this).on('click', function(){
        swal(nameProduct, "is added to cart !", "success");
      });
    });
  
  </script>
  <script src="{{asset('public/front-end')}}/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script>
    $('.js-pscroll').each(function(){
      $(this).css('position','relative');
      $(this).css('overflow','hidden');
      var ps = new PerfectScrollbar(this, {
        wheelSpeed: 1,
        scrollingThreshold: 1000,
        wheelPropagation: false,
      });

      $(window).on('resize', function(){
        ps.update();
      })
    });
  </script>
  <script src="{{asset('public/front-end')}}/js/main.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $('#image').change(function(e){
      var reader = new FileReader();
      reader.onload = function(e){
        $('#showimage').attr('src',e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    });
  });
</script>

</body>
</html>