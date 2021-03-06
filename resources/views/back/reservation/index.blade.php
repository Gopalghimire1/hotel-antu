@extends('back.layouts.app')
@section('title',"Reservation")
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
                            <h3 class="page-title mr-sm-auto"> Reservation List </h3><!-- .btn-toolbar -->
                            <div class="dt-buttons btn-group">
                                <a href="{{ route('reservation.create') }}" class="btn btn-primary">Add Reservation</a>
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


                       </table>
                    </div><!-- /.card-body -->
                        <div class="d-flex justify-content-center">

                        </div>
                </div>
        </div>
      </div>
    </div>
</main>

@endsection
