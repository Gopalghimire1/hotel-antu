@extends('back.layouts.app')
@section('title','Blog Edit')
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
                            <h3 class="page-title mr-sm-auto"> Edit Blog </h3><!-- .btn-toolbar -->
                            <div class="dt-buttons btn-group">
                                <a href="{{ route('admin.blog.home',$blog->type) }}" class="btn btn-primary">List Of Blogs</a>
                            </div><!-- /.btn-toolbar -->
                        </div>
                    </div><!-- /.card-header -->
                    <!-- .card-body -->
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.blog.update',['blog'=>$blog->id])}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-9">

                                    <div class="form-group p-2 mb-3 shadow">
                                        <label for="title">
                                            Title
                                        </label>
                                        <input type="text" name="title" id="title" required class="form-control" value="{{$blog->title}}">
                                    </div>
                                    <div class="form-group p-2 shadow">
                                        <textarea name="desc">{{$blog->desc}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="p-2 mb-3 shadow">
                                        <div class="form-group">
                                            <img src="{{asset($blog->feature)}}" id="feature_image" alt="" class="w-100 mb-3">
                                            <label for="feature" class="btn btn-primary">
                                                <input onchange="readURL(this)" type="file" accept="image/*"  id="feature" name="feature" class="d-none">
                                                Choose Image
                                            </label>
                                        </div>

                                    </div>
                                    <div class="p-2 shadow">

                                        <div class="form-group">
                                            <button class="btn btn-success btn-block"> {{$blog->type==1?"Update Blog":"Update Experience"}}</button>
                                            <a href="{{route('admin.blog.home',['type'=>$blog->type])}}" class="btn btn-danger btn-block">Cancel </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div><!-- /.card-body -->
                </div>
        </div>
      </div>
    </div>
</main>



@endsection
@section('js')
<script src="https://cdn.tiny.cloud/1/4adq2v7ufdcmebl96o9o9ga7ytomlez18tqixm9cbo46i9dn/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak ',
      toolbar_mode: 'floating',
      images_upload_handler: function (blobInfo, success, failure) {
        var xhr, formData;
        xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', '{{route('admin.blog.imageupload')}}');
        xhr.onload = function() {
        var json;

        if (xhr.status != 200) {
            failure('HTTP Error: ' + xhr.status);
            return;
        }
        json = JSON.parse(xhr.responseText);

        if (!json || typeof json.location != 'string') {
            failure('Invalid JSON: ' + xhr.responseText);
            return;
        }
        success(json.location);
        };
        formData = new FormData();
        formData.append('_token',"{{csrf_token()}}");
        formData.append('file', blobInfo.blob(), blobInfo.filename());
        xhr.send(formData);
    }
   });

   function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
            document.getElementById('feature_image').src= e.target.result;
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

  </script>
@endsection
