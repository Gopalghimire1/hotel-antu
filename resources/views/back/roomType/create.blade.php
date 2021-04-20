@extends('back.layouts.app')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-bs4.min.css" rel="stylesheet">
@section('title','Room Type Create')
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
                                <h3 class="page-title mr-sm-auto">  Create Room Types</h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <a href="{{ route('roomType.index') }}" class="btn btn-primary">List Of Room Types</a>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                            <form action="{{ route('roomType.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <div class="col-md-6">
                                        <label for="name">Title <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Enter room type name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="code">Short Code <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="short_code" value="{{ old('short_code') }}" placeholder="Enter room type short code">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="short_desc">Short Detail</label>
                                    <textarea name="short_desc" class="form-control"  rows="3" placeholder="Enter short detail">{{ old('short_desc') }}</textarea>
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

                                <div class="form-row">
                                        @if($amenities->count())
                                        <div class="form-group col-md-4">

                                            <label><strong><h5> Amenities </h5></strong></label>
                                            <hr>
                                            <div class="row">
                                                @foreach($amenities as $amenity)
                                                    <div class="col-md-6">
                                                        <div class="custom-control custom-checkbox checkbox-inline">
                                                            <input type="checkbox" class="custom-control-input" id="amenities_{{$amenity->id}}" name="amenities[]" value="{{$amenity->id}}">
                                                            <label class="custom-control-label pr-4" for="amenities_{{$amenity->id}}"><strong>{{$amenity->name}}</strong></label>
                                                        </div>

                                                    </div>
                                                @endforeach
                                            </div>

                                        </div>
                                        @endif

                                        <div class="col-md-2">
                                        </div>

                                        <div class="col-md-6">

                                            <div class="mt-3">
                                                <span class="btn btn-primary btn-sm addmore" style="border-radius: 30px; cursor: pointer;">+</span> <small> Click here for upload multiple gallery image </small>
                                            </div>

                                            <div class="mt-3 galley_image">
                                                <label for="feature">Gallery Image <span style="color:red;">*</span></label>
                                                <input type="file" class="form-control" name="gallery_image[]" required>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <span>Status :</span> <!-- .switcher-control -->
                                                <label class="switcher-control switcher-control-lg"><input type="checkbox" name="status" class="switcher-input" checked=""> <span class="switcher-indicator"></span> <span class="switcher-label-on">ON</span> <span class="switcher-label-off">OFF</span></label> <!-- /.switcher-control -->
                                            </div>
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

@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-bs4.min.js"></script>
    <script>

    var max_fields_limit = 5;
    var x = 1;
    $('.addmore').click(function(e){
        e.preventDefault();
        if(x < max_fields_limit){
            x++;
            $('.galley_image').append('<div class="mt-3 text-right"><label for="feature">Gallery Image </label><a href="#" class="btn btn-danger btn-sm remove_field " style="border-radius: 30px; cursor: pointer;">x</a><input type="file" class="form-control" name="gallery_image[]"/></div>');
        }
    });

    $('.galley_image').on("click",".remove_field", function(e){ //user click on remove text links
        e.preventDefault(); $(this).parent('div').remove();
        x--;
    });

    $('#summernote').summernote({
        placeholder: 'Details',
        tabsize: 2,
        height: 400
      });

    </script>
@endsection
