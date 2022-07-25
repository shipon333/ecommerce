 @extends('backend.layouts.master')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Contact</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Contact</li>
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
                <h3 class="card-title">Contact List
                </h3>
                @if($countcontact<1)
                <a href="{{route('contacts.add')}}" class="btn btn-success float-right"><i class="fa fa-plus-circle">Add Contact</i></a>
                @endif
                
              </div><!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped" style="text-align: center;">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>Address</th>
                      <th>Mobile</th>
                      <th>Email</th>
                      <th>Facebook</th>
                      <th>Twitter</th>
                      <th>Google Plus</th>
                      <th>Youtube</th>
                      <th width="10%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($contacts as $key=> $contact)
                    <tr class="{{$contact->id}}">
                      <td>{{$key+1}}</td>
                      <td>{{$contact->address}}</td>
                      <td>{{$contact->mobile}}</td>
                      <td>{{$contact->email}}</td>
                      <td>{{$contact->facebook}}</td>
                      <td>{{$contact->twiteer}}</td>
                      <td>{{$contact->google_plus}}</td>
                      <td>{{$contact->youtube}}</td>
                      <td>
                        <a href="{{route('contacts.edit',$contact->id)}}" class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-edit"></i></a>
                        
                        <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{route('contacts.delete')}}" data-token="{{csrf_token()}}" data-id="{{$contact->id}}"><i class="fa fa-trash"></i></a>
                       
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