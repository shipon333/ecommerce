 @extends('backend.layouts.master')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Color</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Color</li>
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
                <h3 class="card-title">Edit Color
                </h3>
                <a href="{{route('colors.view')}}" class="btn btn-success float-right"><i class="fa fa-plus-circle">Color List</i></a>
              </div><!-- /.card-header -->
              <div class="card-body">

                <form action="{{route('colors.update',$coloredit->id)}}" method="post" id="valideform" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="form-group col-md-4">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" name="name" value="{{$coloredit->name}}">
                      <font color="red">{{($errors->has('name'))?($errors->first('name')):' '}}</font>
                    </div>
                    <div class="form-group col-md-4" style="margin-top: 30px">
                      <button type="submit" class="btn btn-success">Update</button>
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
        },
        messages:{
          name:{
            required:"Please Enter Color name",
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