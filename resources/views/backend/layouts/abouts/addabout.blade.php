 @extends('backend.layouts.master')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage About</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">About</li>
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
                <h3 class="card-title">Add About
                </h3>
                <a href="{{route('abouts.view')}}" class="btn btn-success float-right"><i class="fa fa-plus-circle">About List</i></a>
              </div><!-- /.card-header -->
              <div class="card-body">

                <form action="{{route('abouts.store')}}" method="post" id="valideform" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="form-group col-md-4">
                      <label for="title">Title</label>
                      <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="sub_title">Sub Title</label>
                      <input type="text" class="form-control" id="sub_title" name="sub_title">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="link_name">Link Name</label>
                      <input type="text" class="form-control" id="link_name" name="link_name">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="details">Sub Title</label>
                      <textarea name="details" id="details" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="image">Image</label>
                      <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div class="form-group col-md-4">
                      <img src="{{url('public/download.jpg')}}" id="showimage" alt="" width="200px" height="200px">
                    </div>
                    <div class="form-group col-md-4" style="margin-top: 50px">
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
   @endsection