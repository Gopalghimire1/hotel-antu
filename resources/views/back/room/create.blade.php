@extends('back.layouts.app')
@section('title','Room Create')
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
                                <h3 class="page-title mr-sm-auto"> Create Rooms </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <a href="{{ route('rooms.index') }}" class="btn btn-primary">Rooms List</a>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                                <form action="{{ Route('rooms.store') }}" method="POST">
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
                                    <div class="form-group">
                                         <label for="num"> Room Number <span style="color:red;">*</span></label>
                                         <input type="text" name="number" placeholder="Enter room number" class="form-control">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="floor">Floor <span style="color:red;">*</span></label>
                                            <select name="floor"  class="form-control">
                                                <option value="">Select</option>
                                                @foreach ($floors as $f)
                                                  <option value="{{ $f->id }}">{{ $f->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="roomtype">Room Type <span style="color:red;">*</span></label>
                                            <select name="room_type" class="form-control">
                                                <option value="">Select</option>
                                                @foreach ($room_types as $r)
                                                  <option value="{{ $r->id }}"> {{ $r->title }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
<br>
                                        <div class="col-md-2">
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <span>Status :</span> <!-- .switcher-control -->
                                                    <label class="switcher-control switcher-control-lg"><input type="checkbox" name="status" class="switcher-input" checked=""> <span class="switcher-indicator"></span> <span class="switcher-label-on">ON</span> <span class="switcher-label-off">OFF</span></label> <!-- /.switcher-control -->
                                            </div>
                                        </div>
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
