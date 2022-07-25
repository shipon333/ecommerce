 @extends('backend.layouts.master')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Product Info
                </h3>
                <a href="{{route('products.view')}}" class="btn btn-success float-right"><i class="fa fa-list">Product List</i></a>
                
              </div><!-- /.card-header -->
              <div class="card-body">
                <table  class="table table-bordered table-striped table" s>
                  <tbody>
                    <tr>
                      <td width="50%">Category</td>
                      <td width="50%">{{$product['category']['name']}}</td>
                    </tr>
                    <tr>
                      <td width="50%">Brand</td>
                      <td width="50%">{{$product['brand']['name']}}</td>
                    </tr>
                    <tr>
                      <td width="50%">Name</td>
                      <td width="50%">{{$product->name}}</td>
                    </tr>
                    <tr>
                      <td width="50%">Price</td>
                      <td width="50%">{{$product->price}}</td>
                    </tr>
                    <tr>
                      <td width="50%">Short Description</td>
                      <td width="50%">{{$product->sort_desc}}</td>
                    </tr>
                    <tr>
                      <td width="50%">Long Description</td>
                      <td width="50%">{{$product->long_desc}}</td>
                    </tr>
                    <tr>
                      <td width="50%">Image</td>
                      <td width="50%">
                        <img src="{{(!empty($product->image))?url('public/upload/product_image/'.$product->image):url('public/download.jpg')}}" alt="" width="70px" height="70px">
                      </td>
                    </tr>
                    <tr>
                      <td width="50%">Color</td>
                      @php
                        $colors = App\Model\ProductColor::where('product_id',$product->id)->get();
                      @endphp
                      <td width="50%">
                        @foreach($colors as $color)
                          {{$color['color']['name']}}
                        @endforeach
                      </td>
                    </tr>
                    <tr>
                      <td width="50%">Size</td>
                      @php
                        $sizes = App\Model\ProductSize::where('product_id',$product->id)->get();
                      @endphp
                      <td width="50%">
                        @foreach($sizes as $size)
                          {{$size['size']['name']}}
                        @endforeach
                      </td>
                    </tr>
                    <tr>
                      <td width="50%">Sub Image</td>
                      @php
                        $subImages = App\Model\ProductSubImage::where('product_id',$product->id)->get();
                      @endphp
                      <td width="50%">
                        @foreach($subImages as $subImage)
                          <img src="{{url('public/upload/product_image/sub_image/'.$subImage->subimage)}}" alt="" width="50px" height="50px">
                        @endforeach
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
   @endsection