@extends('back.layouts.app')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-bs4.min.css" rel="stylesheet">
@section('title','Create Paid Service')
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
                                <h3 class="page-title mr-sm-auto"> Create Paid Service </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <a href="{{ route('paid.index') }}" class="btn btn-primary">List Of Paid Services</a>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                            <form action="{{ route('paid.save') }}" method="POST" enctype="multipart/form-data">
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
                                        <label for="name">Title <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Enter room type name" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="code">Price Type <span style="color:red;">*</span></label>
                                        <select name="price_type" class="form-control" required>
                                            <option></option>
                                            <option value="PER_PERSON" >Per Person</option>
                                            <option value="PER_NIGHT" >Per Night</option>
                                            <option value="FIXED_PRICE">Fixed Price</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="price">Price (Rs.)</label>
                                        <input type="number" name="price" class="form-control" step="0.01" min="0" value="0" required>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="short_desc">Short Detail</label>
                                    <textarea name="short_desc" class="form-control"  rows="3" placeholder="Enter short detail" required>{{ old('short_desc') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="description">Details</label>
                                    <textarea name="description" rows="5" id="summernote" placeholder="Enter details" class="form-control"> {{ old('description') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image" >Image</label>
                                    <input type="file" class="form-control" name="image" required>
                                </div>
                                <div class="col-md-2">
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>Status :</span> <!-- .switcher-control -->
                                        <label class="switcher-control switcher-control-lg"><input type="checkbox" name="status" class="switcher-input" checked=""> <span class="switcher-indicator"></span> <span class="switcher-label-on">ON</span> <span class="switcher-label-off">OFF</span></label> <!-- /.switcher-control -->
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
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-bs4.min.js"></script>
    <script>

    $('#summernote').summernote({
        placeholder: 'Details',
        tabsize: 2,
        height: 400
      });

    </script>
@endsection
