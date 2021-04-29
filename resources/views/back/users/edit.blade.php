@extends('back.layouts.app')
@section('title','User Edit')
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
                                <h3 class="page-title mr-sm-auto"> Edit User </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <a href="{{ route('user.index') }}" class="btn btn-primary">User List</a>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                           <form method="POST" action="{{ route('user.edit',['employee'=>$employee->id]) }}" enctype="multipart/form-data">
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
                                           <input type="text" name="first_name" class="form-control" placeholder="Enter first name" value="{{$employee->first_name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Last Name <span style="color:red;">*</span></label>
                                             <input type="text" name="last_name" class="form-control" placeholder="Enter last name" value="{{$employee->last_name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Email <span style="color:red;">*</span></label>
                                             <input type="email" name="email" class="form-control" placeholder="Enter email" value="{{$employee->email}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Address <span style="color:red;">*</span></label>
                                        <input type="text" name="address" class="form-control" placeholder="Enter address" value="{{$employee->address}}">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="phone">Phone <span style="color:red;">*</span></label>
                                            <input type="number" name="phone" class="form-control" placeholder="Enter phone number" value="{{$employee->phone}}">
                                        </div>
                                    </div>                                       
                                     </div>
                                     <div class="row">
                                        <div class="col-md-2">
                                            <label for="">Gender <span style="color:red;">*</span></label>
                                            <select name="sex" class="form-control">
                                                <option value="M" {{$employee->sex=="M"?"selected":""}}>Male</option>
                                                <option value="F" {{$employee->sex=="F"?"selected":""}}>Female</option>
                                                <option value="O" {{$employee->sex=="O"?"selected":""}}>Other</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">DOB <span style="color:red;">*</span></label>
                                                <input type="text" name="dob" class="form-control" placeholder="Date Of Birth" value="{{$employee->dob}}" >
                                             </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label for="">Role <span style="color:red;">*</span></label>
                                            <select name="role" class="form-control">
                                                @php
                                                    $i=0;
                                                @endphp
                                                @foreach (\App\Role::roles as $role)
                                                    <option value="{{$i++}}" {{$employee->role==$i?"selected":""}}>{{$role}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                     </div>                                  
                                     <hr>
                                     <button class="btn btn-primary btn-block">UPDATE USER</button>
                              </fieldset>
                             </form>
                        </div><!-- /.card-body -->
                    </div>
            </div>
          </div>
        </div>
</main>

@endsection



