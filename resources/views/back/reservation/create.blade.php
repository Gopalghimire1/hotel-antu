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
                            <h3 class="page-title mr-sm-auto">  Create New Reservation</h3><!-- .btn-toolbar -->
                            <div class="dt-buttons btn-group">
                                <a href="{{ route('reservation.index') }}" class="btn btn-primary">List Of Reservation</a>
                            </div><!-- /.btn-toolbar -->
                        </div>
                    </div><!-- /.card-header -->
                    <!-- .card-body -->
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
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
                                    <label for="date">Date <span style="color:red;">*</span></label>
                                    <input type="date" class="form-control" name="date" value="{{ old('date') }}" placeholder="Enter date">
                                </div>
                                <div class="col-md-4">
                                    <label for="code">User Id <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="user_id" value="{{ old('user_id') }}" placeholder="Enter user id">
                                </div>
                                <div class="col-md-4">
                                    <label for="user">Guest</label>
                                    <select name="user_id" class="form-control">
                                        <option></option>
                                        @foreach (\App\Models\User::where('role',2)->get() as $user)
                                            <option value="{{ $user->id}}">{{ $user->first_name }} {{ $user->last_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="roomtype">Room Types</label>
                                    <select name="roomtype_id" class="form-control">
                                        <option></option>
                                        @foreach (\App\Model\RoomType::get() as $user)
                                            <option value="{{ $user->id}}">{{ $user->first_name }} {{ $user->last_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description">Details</label>
                                <textarea name="description" rows="5" id="summernote" placeholder="Enter details" class="form-control"> {{ old('description') }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="capacity">Higher Capacity <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="higher_capacity" value="1" placeholder="Enter Room Capacity">
                                </div>
                                <div class="col-md-4">
                                    <label for="capacity">Kids Capacity <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="kids_capacity" value="0" placeholder="Enter Room's kids Capacity">
                                </div>
                                <div class="col-md-4">
                                    <label for="capacity">Base Price <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="base_price" value="0" placeholder="Enter Room's price">
                                </div>
                            </div>
                            <br>


                                <hr>
                                <button type="submit" class="btn btn-primary btn-block">Save Item</button>
                        </form>
                    </div><!-- /.card-body -->
                </div>
        </div>
      </div>
    </div>
</main>
@endsection
@section('js')

@endsection
