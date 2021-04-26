@extends('back.layouts.app')
@section('title','Users')
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
                                <h3 class="page-title mr-sm-auto"> User List </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <a href="{{ route('user.create') }}" class="btn btn-primary">Create New User</a>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                           <table class="table table-bordered">
                               <tr>
                                   <th>Full Name</th>
                                   <th>Email</th>
                                   <th>Phone</th>
                                   <th>VIP</th>
                                   <th>status</th>
                                   <th>Action</th>
                               </tr>

                               <tr>

                               </tr>
                           </table>


                        </div><!-- /.card-body -->
                    </div>
            </div>
          </div>
        </div>
</main>

@endsection
