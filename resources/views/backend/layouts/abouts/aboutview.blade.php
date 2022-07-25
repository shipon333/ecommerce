 @extends('backend.layouts.master')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Abouts</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Abouts</li>
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
                <h3 class="card-title">About List
                </h3>
                @if($countabout<1)
                <a href="{{route('abouts.add')}}" class="btn btn-success float-right"><i class="fa fa-plus-circle">Add About</i></a>
                @endif
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>Title</th>
                      <th>Subtitle</th>
                      <th>Details</th>
                      <th>Link</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($abouts as $key=> $about)
                    <tr class="{{$about->id}}">
                      <td>{{$key+1}}</td>
                      <td>{{$about->title}}</td>
                      <td>{{$about->subtitle}}</td>
                      <td>{{$about->details}}</td>
                      <td>{{$about->link}}</td>
                      <td><img src="{{(!empty($about->image))?url('public/upload/abouts/'.$about->image):url('public/download.jpg')}}" id="showimage" alt="" width="100px" height="100px"></td>
                      <td>
                        <a href="{{route('abouts.edit',$about->id)}}" class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-edit"></i></a>
                        <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{route('abouts.delete')}}" data-token="{{csrf_token()}}" data-id="{{$about->id}}"><i class="fa fa-trash"></i></a>
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