@extends('back.layouts.app')
@section('title','Amenity edit')
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
                                <h3 class="page-title mr-sm-auto"> Edit Amenities  </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <a href="{{ route('amenities.index') }}" class="btn btn-primary">Back To Amenities List</a>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                            <form action="{{ route('amenities.update',$amenity->id) }}" method="POST">
                               @method('PUT')
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
                                <div class="form-group">
                                    <label for="name"> Amenity Name <span style="color:red;">*</span></label>
                                    <input type="text" name="name" value="{{ old('name',$amenity->name) }}" class="form-control" placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label for="des">Description</label>
                                    <textarea name="description" rows="5" class="form-control" placeholder="Enter description">{{ old('description',$amenity->description) }}</textarea>
                                </div>
                                <div class="col-md-2">
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>Status :</span> <!-- .switcher-control -->
                                        <label class="switcher-control switcher-control-lg"><input type="checkbox" name="status"  {{$amenity->status?'checked':''}} class="switcher-input" > <span class="switcher-indicator"></span> <span class="switcher-label-on">ON</span> <span class="switcher-label-off">OFF</span></label> <!-- /.switcher-control -->
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary btn-block"> Save Item</button>
                              <fieldset>
                            </form>

                        </div><!-- /.card-body -->
                    </div>
            </div>
          </div>
        </div>
</main>

@endsection
