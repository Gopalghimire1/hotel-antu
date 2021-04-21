@extends('front.layout.layout')
@section('title', 'single room name')
@section('style')
    <link rel="stylesheet" href="{{ asset('front/css/singleroom.css') }}">
@endsection
@section('content')
    <div id="singleroom">
        <div id="singleroom_header" style="background-image:url('{{ asset($singleroom->featuredImage()->image) }}">

        </div>
        <div id="singleroom_name" class="text-center playfair">
            {{ $singleroom->title }}
        </div>

        <div id="singleroom_desc">
            <div id="singleroom_book" class="shadow-sm">
                <span class="number">
                    Rs. {{ $singleroom->base_price }} / Night
                </span>
                <a href="{{route('front.book')}}?roomid={{ $singleroom->id }}" class=""> Book Now</a>
            </div>
            <div  id="singleroom_desccontainer" >
                <p>
                    {!! $singleroom->description !!}
                </p>
            </div>
            <div  id="singleroom_imagecontainer">

                <div class="singleroom_feature">
                    <img id="feature_image"  src="{{ asset($singleroom->roomTypeImage[0]->image) }}" class="w-100 rounded" alt="">
                </div>

                <div class="d-flex f-wrap">
                    @foreach ($singleroom->roomTypeImage as $image)
                    <div class="singleroom_gallery">
                        <img onclick="document.getElementById('feature_image').src='{{ asset($image->image) }}';" src="{{ asset($image->image) }}" class="w-100 rounded" alt="">
                    </div>
                    @endforeach
                </div>
            </div>

            <div id="singleroom_facilities">
                <div id="singleroom_facilities_header"class="playfair">
                    <span>
                        Facilities
                    </span>
                </div>
                <div>
                    <div class="row ">
                        @foreach($singleroom->amenity as $amenity)
                            <div class="col-md-4">
                                <div class="singleroom_facilities_item">
                                    <i class="fas fa-check"></i>
                                    <span>
                                        {{ $amenity->name }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
