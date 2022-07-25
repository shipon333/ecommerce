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
                <h3 class="card-title">Add Product
                </h3>
                <a href="{{route('products.view')}}" class="btn btn-success float-right"><i class="fa fa-list">Product List</i></a>
              </div><!-- /.card-header -->
              <div class="card-body">

                <form action="{{route('products.store')}}" method="post" id="valideform" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="form-group col-md-4">
                      <label for="category_id">Category</label>
                      <select name="category_id" id="category_id" class="form-control select2">
                        <option value="">Select Category</option>
                        @foreach($categorys as $key=> $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="brand_id">Brand</label>
                      <select name="brand_id" id="brand_id" class="form-control select2">
                        <option value="">Select Brand</option>
                        @foreach($brands as $key=> $brand)
                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Product Name">
                      <font color="red">{{($errors->has('name'))?($errors->first('name')):' '}}</font>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="color_id">Color</label>
                      <select name="color_id[]" id="color_id" class="form-control select2" multiple>
                        @foreach($colors as $key=> $color)
                        <option value="{{$color->id}}">{{$color->name}}</option>
                        @endforeach
                      </select>
                      <font color="red">{{($errors->has('color_id'))?($errors->first('color_id')):' '}}</font>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="size_id">Size</label>
                      <select name="size_id[]" id="size_id" class="form-control select2" multiple>
                        @foreach($sizes as $key=> $size)
                        <option value="{{$size->id}}">{{$size->name}}</option>
                        @endforeach
                      </select>
                      <font color="red">{{($errors->has('size_id'))?($errors->first('size_id')):' '}}</font>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="price">Price</label>
                      <input type="number" class="form-control" id="price" name="price" placeholder="Product Price">
                      <font color="red">{{($errors->has('price'))?($errors->first('price')):' '}}</font>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="short_desc">Short Description</label>
                      <br>
                      <textarea class="form-control" name="short_desc" id="short_desc" cols="69" rows="5"></textarea>
                      <font color="red">{{($errors->has('short_desc'))?($errors->first('short_desc')):' '}}</font>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="long_desc">Long Description</label>
                      <br>
                      <textarea class="form-control" name="long_desc" id="long_desc" cols="69" rows="5"></textarea>
                      <font color="red">{{($errors->has('long_desc'))?($errors->first('long_desc')):' '}}</font>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="image">Image</label>
                      <input type="file" class="form-control" id="image" name="image">
                      <font color="red">{{($errors->has('image'))?($errors->first('image')):' '}}</font>
                    </div>
                    <div class="form-group col-md-4">
                      <img src="{{url('public/download.jpg')}}" id="showimage" alt="" width="200px" height="200px">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="sub_image">Sub Image</label>
                      <input type="file" class="form-control" id="sub_image" name="sub_image[]" multiple>
                      <font color="red">{{($errors->has('sub_image'))?($errors->first('sub_image')):' '}}</font>
                    </div>
                    <div class="form-group col-md-12" style="margin-top: 30px">
                      <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </div>
                </form>
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
<script type="text/javascript">
     $(document).ready(function(){
       $('#valideform').validate({
        rules: {
            name: {
                required: true
            },
            category_id: {
                required: true
            },
            brand_id: {
                required: true
            },
            price: {
                required: true
            },
            short_desc: {
                required: true
            },
            long_desc: {
                required: true
            },
            image: {
                required: true
            },
        },
        messages:{
          name:{
            required:"Please Enter Product name",
          },
          category_id:{
            required:"Please Select Category",
          },
          brand_id:{
            required:"Please Select Brand",
          },
          price:{
            required:"Please Enter Product Price",
          },
          short_desc:{
            required:"Please Enter Short Description",
          },
          long_desc:{
            required:"Please Enter Long Description",
          },
          image:{
            required:"Please Enter Product Image",
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
  <script>
    $(function(){
       $('.select2').select2()
    });
  </script>
@endsection