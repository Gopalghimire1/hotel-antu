@extends('back.layouts.app')
@section('title','Paid Services')
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
                                <h3 class="page-title mr-sm-auto"> List Of Paid Services </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <a href="{{ route('paid.create') }}" class="btn btn-primary">Create New Service</a>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                           <table class="table table-bordered">
                               <tr>
                                    <th>Service Title</th>
                                    <th>Price (Rs.)</th>
                                    <th>Status</th>
                                    <th>Action</th>
                               </tr>
                               @foreach ($services as $service)
                                   <tr>
                                       <td>{{ $service->title }}</td>
                                       <td>{{ $service->price }}</td>
                                       <td><span class="badge {{ $service->status?'badge-primary':'badge-danger'}}">{{ $service->status?'Active':'Inactive' }}</span></td>
                                       <td>
                                           <a href="{{ route('paid.edit',$service->id)}}" class="badge badge-primary">Edit</a>
                                           <a href="{{ route('paid.delete',$service->id) }}" onclick="return confirm('Are you sure?');" class="badge badge-danger">Delete</a>
                                           <a href="{{ route('paid.show',$service->id)}}" class="badge badge-warning">View</a>
                                       </td>
                                   </tr>
                               @endforeach



                           </table>

                        </div><!-- /.card-body -->
                        <div class="d-flex justify-content-center">
                            {{ $services->links() }}
                        </div>
                    </div>
            </div>
          </div>
        </div>
</main>

@endsection
