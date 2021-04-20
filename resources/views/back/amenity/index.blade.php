@extends('back.layouts.app')
@section('title','Amenities')
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
                                <h3 class="page-title mr-sm-auto"> Amenities List </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <a href="{{ route('amenities.create') }}" class="btn btn-primary">Create Amenities</a>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                           <table class="table table-bordered">
                               <tr>
                                   <th>Name</th>
                                   <th>Details</th>
                                   <th>Status</th>
                                   <th>Action</th>
                               </tr>

                               @foreach ($amenity as $a)
                                   <tr>
                                       <td>{{ $a->name }}</td>
                                       <td>{{ $a->description }}</td>
                                       <td>
                                           @if($a->status==1)
                                             <span class="badge badge-success">Active</span>
                                           @else
                                             <span class="badge badge-danger">Deactive</span>
                                           @endif
                                       </td>
                                       <td> <a class="badge badge-primary"  href="{{ route('amenities.edit',$a->id)}}">Edit</a></td>
                                   </tr>
                               @endforeach
                           </table>
                        </div><!-- /.card-body -->
                            <div class="d-flex justify-content-center">
                                {{ $amenity->links() }}
                            </div>
                    </div>
            </div>
          </div>
        </div>
</main>

@endsection
