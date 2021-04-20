@extends('back.layouts.app')
@section('title','Blogs')
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
                            <h3 class="page-title mr-sm-auto"> {{$type==1?"Blogs":"Experience"}} </h3><!-- .btn-toolbar -->
                            <div class="dt-buttons btn-group">
                                <a href="{{route('admin.blog.add',['type'=>$type])}}" class="btn btn-primary">Add New {{$type==1?"Blog":"Experience"}}</a>
                            </div><!-- /.btn-toolbar -->
                        </div>
                    </div><!-- /.card-header -->
                    <!-- .card-body -->
                    <div class="card-body">
                        <div class="p-4">
                            <div>
                                <div class="row">
                                    @foreach ($blogs as $blog)
                                        <div class="col-md-4 mb-3">
                                            <div class="card h-100 shadow">
                                                <img src="{{asset($blog->feature)}}" alt="" class="w-100">
                                                <div class="p-2">
                                                    <p class="text-bold">
                                                        {{$blog->title}}
                                                    </p>
                                                    <p>
                                                        <a href="{{route('admin.blog.update',['blog'=>$blog->id])}}" class="btn btn-success">Edit</a>
                                                        <a href="{{route('admin.blog.del',['blog'=>$blog->id])}}" class="btn btn-danger">Delete</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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
