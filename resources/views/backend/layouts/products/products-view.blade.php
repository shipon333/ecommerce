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
                <h3 class="card-title">Product List
                </h3>
                <a href="{{route('products.add')}}" class="btn btn-success float-right"><i class="fa fa-plus-circle">Add Product</i></a>
                
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table" style="text-align: center;">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>Category</th>
                      <th>Brand</th>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($alldata as $key=> $product)
                    <tr class="{{$product->id}}">
                      <td>{{$key+1}}</td>
                      <td>{{$product['category']['name']}}</td>
                      <td>{{$product['brand']['name']}}</td>
                      <td>{{$product->name}}</td>
                      <td>{{$product->price}}</td>
                      <td>
                        <img src="{{(!empty($product->image))?url('public/upload/product_image/'.$product->image):url('public/download.jpg')}}" alt="" width="70px" height="70px">
                      </td>
                      <td>
                        <a href="{{route('products.edit',$product->id)}}" class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-edit"></i></a>
                        <a href="{{route('products.details',$product->id)}}" class="btn btn-sm btn-success" title="Details"><i class="fa fa-eye"></i></a>
                        <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{route('products.delete')}}" data-token="{{csrf_token()}}" data-id="{{$product->id}}"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    @endforeach
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