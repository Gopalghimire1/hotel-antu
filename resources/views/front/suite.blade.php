@extends('front.layout.layout')
@section('title',"Suite")
@section('style')
    <link rel="stylesheet" href="{{asset('front/css/suite.css')}}">
@endsection
@section('content')

<div id="suite">
    <div id="suite_title" class="playfair">

        SUITE AND ROOMS
    </div>
    <div id="suite_desc">
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Necessitatibus nobis itaque modi tenetur facere ullam
        soluta eaque, suscipit alias ipsum doloribus consequuntur magnam expedita, recusandae nostrum placeat deserunt
        dolores repellendus.
    </div>
    @php
        $i =0;
    @endphp
    @foreach ($rooms as $room)
        <div class="row m-0">
            <div class="col-md-6 p-0 {{($i%2)>0?"order-md-2":"order-md-1" }}">
                <img src="{{ asset($room->featuredImage()->image) }}" alt="" class="w-100">
            </div>
            <div class="col-md-6 singlesuite_container p-0 p-relative  {{($i%2)>0?"order-md-1":"order-md-2" }}" id="singlesuite_{{ $i }}">
                <div class="singlesuite text-center" >
                    <div class="singlesuite_name playfair">
                        {{ $room->title }}
                    </div>
                    <div class="singlesuite_price number">

                            Rs. {{ $room->base_price }}

                    </div>
                    <div class="singlesuite_desc">
                        {{ $room->short_desc }}
                    </div>
                    <div class="singlesuite_more ">
                        <a href="{{route('front.singleroom',['id'=>$room->id])}}">
                            View In Detail
                        </a>

                    </div>
                </div>
            </div>
        </div>
        @php
            $i++;
        @endphp
    @endforeach

</div>
@endsection
