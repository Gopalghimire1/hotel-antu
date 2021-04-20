
@extends('back.layouts.app')
<link rel="stylesheet" href="{{asset('admin1/css/gallery.css')}}">
@section('title','Gallery')
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

                        <div class="card-body">
                            <div id="admin_gallery">

                                <div  class="card mb-4 shadow p-3">
                                    <form method="post" action="{{route('admin.gallery.add')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-2" id="">
                                                <div class="form-group">
                                                    <label for="">Caption</label>
                                                    <input type="text" name="caption" id="caption" required class="form-control">

                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label for="">Images</label>
                                                    <input type="file" multiple name="images[]" id="images"  accept="image/*" required class="form-control">
                                                </div>

                                            </div>
                                            <div class="col-md-3">
                                                <button class="btn btn-success mt-4"> Add Images</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card shadow p-3">
                                    <div class="gallery">
                                        <div>

                                            @foreach ($images as $image)
                                              @include('back.gallery.single',['image'=>$image])
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
            </div>
          </div>
        </div>
</main>

@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    function del(id){
        url="/admin/gallery/del/"+id;
        axios.get(url)
        .then((res)=>{
            $('#gallery_item_'+id).remove();
        })
        .catch((err)=>{
            console.log(err);
        })
    }
</script>
@endsection














