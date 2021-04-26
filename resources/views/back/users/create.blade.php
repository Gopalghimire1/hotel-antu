@extends('back.layouts.app')
@section('title','User Create')
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
                                <h3 class="page-title mr-sm-auto"> Create User </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <a href="{{ route('user.index') }}" class="btn btn-primary">User List</a>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                           <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                            @csrf
                              <fieldset>
                                  @include('back.layouts.message')
                                    @if ($errors->any())
                                       <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Error has been occurred !</strong>
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                   @endif
                                 <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                           <label for="name">First Name <span style="color:red;">*</span></label>
                                           <input type="text" name="first_name" class="form-control" placeholder="Enter first name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Last Name <span style="color:red;">*</span></label>
                                             <input type="text" name="last_name" class="form-control" placeholder="Enter last name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Username <span style="color:red;">*</span></label>
                                            <input type="text" name="username" class="form-control" placeholder="Enter username">
                                        </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                               <label for="name">Password <span style="color:red;">*</span></label>
                                               <input type="password" name="password" class="form-control" placeholder="password" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Email <span style="color:red;">*</span></label>
                                                 <input type="email" name="email" class="form-control" placeholder="Enter email">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="phone">Phone <span style="color:red;">*</span></label>
                                                <input type="number" name="phone" class="form-control" placeholder="Enter phone number">
                                            </div>
                                        </div>
                                     </div>
                                     <div class="row">
                                        <div class="col-md-2">
                                            <label for="">Sex <span style="color:red;">*</span></label>
                                            <select name="sex" class="form-control">
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                                <option value="O">Other</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Address <span style="color:red;">*</span></label>
                                            <input type="text" name="address" class="form-control" placeholder="Enter address">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Address <span style="color:red;">*</span></label>
                                            <select name="role" class="form-control">
                                                <option ></option>
                                            </select>
                                        </div>
                                     </div>
                                     <br>

                                     <br>
                                     <div class="row">
                                        <div class="col-md-2">
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <span>Status :</span> <!-- .switcher-control -->
                                                <label class="switcher-control switcher-control-lg"><input type="checkbox" name="status" class="switcher-input" checked=""> <span class="switcher-indicator"></span> <span class="switcher-label-on">ON</span> <span class="switcher-label-off">OFF</span></label> <!-- /.switcher-control -->
                                            </div>
                                        </div>
                                     </div>
                                     <hr>
                                     <button class="btn btn-primary btn-block">SAVE ITEMS</button>
                              </fieldset>
                             </form>
                        </div><!-- /.card-body -->
                    </div>
            </div>
          </div>
        </div>
</main>

@endsection



