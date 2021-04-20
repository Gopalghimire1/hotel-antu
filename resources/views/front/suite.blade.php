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
    @for ($i = 0; $i < 10; $i++)
        <div class="row m-0">
            <div class="col-md-6 p-0 {{($i%2)>0?"order-md-2":"order-md-1" }}">
                <img src="{{ asset('front/img/singleroom.png') }}" alt="" class="w-100">
            </div>
            <div class="col-md-6 singlesuite_container p-0 p-relative  {{($i%2)>0?"order-md-1":"order-md-2" }}" id="singlesuite_{{ $i }}">
                <div class="singlesuite text-center" >
                    <div class="singlesuite_name playfair">
                        hello world asdfasd sdfasd f
                    </div>
                    <div class="singlesuite_price number">
                       
                            Rs. 50000/-
                        
                    </div>
                    <div class="singlesuite_desc">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor voluptatem possimus dolorem sit distinctio? A nemo blanditiis excepturi inventore! Officia omnis a officiis labore adipisci inventore reprehenderit tempora rem laboriosam!
                    </div>
                    <div class="singlesuite_more ">
                        <a href="{{route('front.singleroom',['id'=>1])}}">
                            View In Detail
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
    @endfor

</div>
@endsection
