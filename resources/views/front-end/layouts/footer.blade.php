  <!-- Footer -->
  <footer class="bg3 p-t-75 p-b-32">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-lg-6 p-b-50">
          <h4 class="stext-301 cl0 p-b-30">
            Contact Us
          </h4>
          <p class="stext-107 cl7 hov-cl1 trans-04" style="font-size: 15px;">
                      Address: {{$contacts->address}}, &nbsp; Cell: {{$contacts->mobile}} , &nbsp; Email: {{$contacts->email}}
                  </p>
        </div>

        <div class="col-sm-6 col-lg-6 p-b-50">
          <h4 class="stext-301 cl0 p-b-30">
            Follow Us
          </h4>

          <ul class="social">
              <li class="facebook"><a href="{{$contacts->facebook}}"><i class="fa fa-facebook"></i></a></li>
              <li class="twitter"><a href="{{$contacts->twiteer}}"><i class="fa fa-twitter"></i></a></li>
              <li class="google-plus"><a href="{{$contacts->google_plus}}"><i class="fa fa-google-plus"></i></a></li>
              <li class="youtube"><a href="{{$contacts->youtube}}"><i class="fa fa-youtube-play"></i></a></li>
          </ul>
        </div>
      </div>

      <div class="p-t-40">
        <p class="stext-107 cl6 txt-center">
          Copyright &copy;<script>document.write(new Date().getFullYear());</script> @FF. Designed & Developed By Popularsoft
        </p>
      </div>
    </div>
  </footer>

  <!-- Back to top -->
  <div class="btn-back-to-top" id="myBtn">
    <span class="symbol-btn-back-to-top">
      <i class="zmdi zmdi-chevron-up"></i>
    </span>
  </div>

  <!-- Modal1 -->
  <div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
    <div class="overlay-modal1 js-hide-modal1"></div>

    <div class="container">
      <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
        <button class="how-pos3 hov3 trans-04 js-hide-modal1">
          <img src="images/icons/icon-close.png" alt="CLOSE">
        </button>

        <div class="row">
          <div class="col-md-6 col-lg-7 p-b-30">
            <div class="p-l-25 p-r-30 p-lr-0-lg">
              <div class="wrap-slick3 flex-sb flex-w">
                <div class="wrap-slick3-dots"></div>
                <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                <div class="slick3 gallery-lb">
                  <div class="item-slick3" data-thumb="images/product-detail-01.jpg">
                    <div class="wrap-pic-w pos-relative">
                      <img src="images/product-detail-01.jpg" alt="IMG-PRODUCT">

                      <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-01.jpg">
                        <i class="fa fa-expand"></i>
                      </a>
                    </div>
                  </div>

                  <div class="item-slick3" data-thumb="images/product-detail-02.jpg">
                    <div class="wrap-pic-w pos-relative">
                      <img src="images/product-detail-02.jpg" alt="IMG-PRODUCT">

                      <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-02.jpg">
                        <i class="fa fa-expand"></i>
                      </a>
                    </div>
                  </div>

                  <div class="item-slick3" data-thumb="images/product-detail-03.jpg">
                    <div class="wrap-pic-w pos-relative">
                      <img src="images/product-detail-03.jpg" alt="IMG-PRODUCT">

                      <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-03.jpg">
                        <i class="fa fa-expand"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-5 p-b-30">
            <div class="p-r-50 p-t-5 p-lr-0-lg">
              <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                Lightweight Jacket
              </h4>

              <span class="mtext-106 cl2">
                $58.79
              </span>

              <p class="stext-102 cl3 p-t-23">
                Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.
              </p>
              
              <!--  -->
              <div class="p-t-33">
                <div class="flex-w flex-r-m p-b-10">
                  <div class="size-203 flex-c-m respon6">
                    Size
                  </div>

                  <div class="size-204 respon6-next">
                    <div class="rs1-select2 bor8 bg0">
                      <select class="js-select2" name="time">
                        <option>Choose an option</option>
                        <option>Size S</option>
                        <option>Size M</option>
                        <option>Size L</option>
                        <option>Size XL</option>
                      </select>
                      <div class="dropDownSelect2"></div>
                    </div>
                  </div>
                </div>

                <div class="flex-w flex-r-m p-b-10">
                  <div class="size-203 flex-c-m respon6">
                    Color
                  </div>

                  <div class="size-204 respon6-next">
                    <div class="rs1-select2 bor8 bg0">
                      <select class="js-select2" name="time">
                        <option>Choose an option</option>
                        <option>Red</option>
                        <option>Blue</option>
                        <option>White</option>
                        <option>Grey</option>
                      </select>
                      <div class="dropDownSelect2"></div>
                    </div>
                  </div>
                </div>

                <div class="flex-w flex-r-m p-b-10">
                  <div class="size-204 flex-w flex-m respon6-next">
                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                      <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                        <i class="fs-16 zmdi zmdi-minus"></i>
                      </div>

                      <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

                      <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                        <i class="fs-16 zmdi zmdi-plus"></i>
                      </div>
                    </div>

                    <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                      Add to cart
                    </button>
                  </div>
                </div>  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>