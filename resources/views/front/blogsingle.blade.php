@extends('front.layout.layout')
@section('title',$blog->title)
@section('style')
    <link rel="stylesheet" href="{{asset('front/css/singleblog.css')}}">
@endsection
@section('content')
<div id="singleblog_header">
    <img src="{{asset($blog->feature)}}" class="w-100" alt="">
</div>
<div id="singleblog">

    <div class="row">

        <div class="col-md-8">
            <div id="singleblog_title">
                <div>

                    {{$blog->title}}
                </div>
                <div id="published">
                    published {{$blog->created_at->diffForHumans()}}
                </div>

            </div>
            <div id="singleblog_content">
                {!! $blog->desc !!}
            </div>
        </div>
       
    
        <div class="col-md-4">
            <div class="shadow">
                <div style="background:#f1f1f1;padding:8px 15px; text-align:left;font-size:25px;font-weight:600;">
                    Recent {{$blog->type==1?"Blogs":"Experiences"}}
                </div>
                
                @foreach ($others as $other)

                <div class="other" >
                    {{-- <img src="{{asset($other->feature)}}" alt="" class="w-100"> --}}
                    <div class="title">
                        <a href="{{route('front.blogSingle',['blog'=>$other->id])}}"> {{$other->title}}</a> <br>
                        <div class="small">
                           {{$blog->created_at->diffForhumans()}}
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        
        </div>
    </div>
</div>
@endsection