@extends('back.layouts.app')
@section('title','Paid Service Show')
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
                                <h3 class="page-title mr-sm-auto"> Details of Paid Service </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <a href="{{ route('paid.index') }}" class="btn btn-primary">Paid Service List</a>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                                @include('back.layouts.message')
                            <div class="row">
                                <div class="col-md-5">
                                        <dl class="row">
                                                <dt class="col-md-6">Title :</dt>
                                                <dd class="col-md-6">{{$paid->title}}</dd>

                                                <dt class="col-md-6">Price Type :</dt>
                                                <dd class="col-md-6"> {{ $paid->price_type }} </dd>

                                                <dt class="col-md-6">Price :</dt>
                                                <dd class="col-md-6"> {{ $paid->price }} </dd>

                                                <dt class="col-md-6">Status :</dt>
                                                <dd class="col-md-6"><span class="badge {{$paid->status?'badge-success':'badge-danger'}}">{{$paid->status?'Active':'Inactive'}}</span></dd>
                                                <dt class="col-md-6">Short Detail :</dt>
                                                <dd class="col-md-6"> {{ $paid->short_desc }} </dd>
                                            </dl>
                                            <hr>
                                            <label><strong>Description :</strong></label>
                                            <p> {!! $paid->long_desc !!} </p>
                                </div>
                                <div class="col-md-7">
                                   <div class="row">

                                       <div class="col-md-4" style="border:1px red solid; padding:1rem; margin-bottom:10px; margin-right:10px;">
                                               <img src="{{ asset($paid->image) }}" alt="..." class="img-thumbnail" style="height:180px;" >
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
