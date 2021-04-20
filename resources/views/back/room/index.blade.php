@extends('back.layouts.app')
@section('title','Rooms')
@section('content')

<main class="app-main">
        <!-- .wrapper -->
        <div class="wrapper">
          <!-- .page -->
          <div class="page">
            <!-- .page-inner -->
            <div class="page-inner">
                <div class="card card-fluid" style="margin-top:1rem;">
                        <!-- .card-header -->
                        <div class="card-header">
                            <div class="d-md-flex align-items-md-start">
                                <h3 class="page-title mr-sm-auto"> List Of Rooms </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <a href="{{ route('rooms.create') }}" class="btn btn-primary">Create New Room</a>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                           <table class="table table-bordered">
                               <tr>
                                    <th width="150px">Room Number</th>
                                    <th>Room Type</th>
                                    <th>Floor Number</th>
                                    <th>Status</th>
                                    <th>Action</th>
                               </tr>
                                 @foreach ($rooms as $r)
                                  <tr>
                                      <td>{{ $r->number }}</td>
                                      <td>{{ $r->type->title }}</td>
                                      <td>{{ $r->floor->number }}</td>
                                      <td> <span class="badge {{ $r->status?'badge-success':'badge-danger'}}"> {{ $r->status?'Active':'Inactive' }} </span></td>
                                      <td><a href="{{ route('rooms.edit',$r->id) }}" class="badge badge-primary">Edit</a></td>
                                  </tr>
                                 @endforeach


                           </table>

                        </div><!-- /.card-body -->
                        <div class="d-flex justify-content-center">
                            {{ $rooms->links() }}
                        </div>
                    </div>
            </div>
          </div>
        </div>
</main>

@endsection
