 @extends('backend.layouts.master')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Methode</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Methode</li>
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
                <h3 class="card-title">Methode List
                </h3>
                <a href="{{route('methods.add')}}" class="btn btn-success float-right"><i class="fa fa-plus-circle">Add Methode</i></a>
                
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table" style="text-align: center;">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($alldata as $key=> $methode)
                    <tr class="{{$methode->id}}">
                      <td>{{$key+1}}</td>
                      <td>{{$methode->name}}</td>
                      <td>
                        <a href="{{route('methods.edit',$methode->id)}}" class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-edit"></i></a>
                        @php
                            $count_category = App\Model\PaymentMethod::where('method_id', $methode->id)->count();
                        @endphp
                        @if($count_category<1)
                        <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{route('methods.delete')}}" data-token="{{csrf_token()}}" data-id="{{$methode->id}}"><i class="fa fa-trash"></i></a>
                       @endif
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