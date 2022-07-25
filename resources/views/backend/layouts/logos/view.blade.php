 @extends('backend.layouts.master')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Logos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Logos</li>
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
                <h3 class="card-title">Logo List
                </h3>
                @if($countlogo<1)
                <a href="{{route('logos.add')}}" class="btn btn-success float-right"><i class="fa fa-plus-circle">Add Logo</i></a>
                @endif
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>logo</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($logos as $key=> $logo)
                    <tr class="{{$logo->id}}">
                      <td>{{$key+1}}</td>
                      <td><img src="{{(!empty($logo->image))?url('public/upload/logos/'.$logo->image):url('public/download.jpg')}}" id="showimage" alt="" width="100px" height="100px"></td>
                      <td>
                        <a href="{{route('logos.edit',$logo->id)}}" class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-edit"></i></a>
                        
                        <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{route('logos.delete')}}" data-token="{{csrf_token()}}" data-id="{{$logo->id}}"><i class="fa fa-trash"></i></a>
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