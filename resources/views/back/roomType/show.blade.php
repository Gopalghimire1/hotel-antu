@extends('back.layouts.app')
@section('title','Room Type Show')
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
                                <h3 class="page-title mr-sm-auto"> Details of Room Types </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <a href="{{ route('roomType.index') }}" class="btn btn-primary">Room Type List</a>
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
                                                <dd class="col-md-6">{{$roomType->title}}</dd>
                                                <dt class="col-md-6">Slug :</dt>
                                                <dd class="col-md-6">{{$roomType->slug}}</dd>
                                                <dt class="col-md-6">Short Code :</dt>
                                                <dd class="col-md-6">{{$roomType->short_code}}</dd>
                                                <dt class="col-md-6">Base Capacity :</dt>
                                                <dd class="col-md-6">{{$roomType->base_capacity}}</dd>
                                                <dt class="col-md-6">Higher  Capacity :</dt>
                                                <dd class="col-md-6">{{$roomType->higher_capacity}}</dd>
                                                <dt class="col-md-6">Extra Bed :</dt>
                                                <dd class="col-md-6">{{$roomType->extra_bed?'YES':'NO'}}</dd>
                                                <dt class="col-md-6">Kids  Capacity :</dt>
                                                <dd class="col-md-6">{{$roomType->kids_capacity}}</dd>
                                                <dt class="col-md-6">Amenities :</dt>
                                                <dd class="col-md-6">
                                                    @foreach($roomType->amenity as $amenity)
                                                        <span class="badge badge-info">{{$amenity->name}}</span>
                                                    @endforeach
                                                </dd>
                                                <dt class="col-md-6">Base Price :</dt>
                                                <dd class="col-md-6">Rs. {{number_format($roomType->base_price,2)}} </dd>
                                                {{-- <dt class="col-md-6">Additional Person Price :</dt>
                                                <dd class="col-md-6">Rs. {{number_format($roomType->additional_person_price,2)}} </dd>
                                                <dt class="col-md-6">Extra Bed Price :</dt>
                                                <dd class="col-md-6">Rs,{{number_format($roomType->extra_bed_price,2)}} </dd> --}}
                                                <dt class="col-md-6">Status :</dt>
                                                <dd class="col-md-6"><span class="badge {{$roomType->status?'badge-success':'badge-danger'}}">{{$roomType->status?'Active':'Inactive'}}</span></dd>
                                            </dl>
                                            <hr>
                                            <label><strong>Description :</strong></label>
                                            <p> {{ $roomType->description }} </p>
                                </div>
                                <div class="col-md-7">
                                   <div class="row">
                                       @foreach ($roomType->roomTypeImageAdmin as $image)
                                       <div class="col-md-4" style="border:1px red solid; padding:1rem; margin-bottom:10px; margin-right:10px;">

                                               <img src="{{ asset($image->image) }}" alt="..." class="img-thumbnail" style="height:180px;" >
                                               <div class="mt-2 " style="text-align:center;">
                                                @if($image->featured)
                                                    <span class="badge badge-success">Featured</span>
                                                @else
                                                <a href="{{ route('image.featured',[$roomType->id,$image->id])}}" class="badge badge-primary">Make Featured</a>
                                                @endif
                                                    <a href="{{ route('image.delete',[$roomType->id,$image->id]) }}" class="badge badge-danger">Delete</a>
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
