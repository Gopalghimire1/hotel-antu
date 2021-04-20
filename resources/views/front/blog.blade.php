@extends('front.layout.layout')
@section('title')
{{$type==1?'Blogs':'Experiences'}}
@endsection
@section('style')
<link rel="stylesheet" href="{{asset('front/css/gallery.css')}}">
@endsection
@section('content')
    <div id="gallery">
        <div id="gallery_title" class="playfair">
            {{$type==1?'Blogs':'Experiences'}}
        </div>
        <div id="gallery_desc">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab, aliquam quidem voluptates nisi delectus autem iusto atque iste nesciunt reiciendis doloribus veniam esse sapiente porro et, consequuntur cumque corporis ipsa.
        </div>
        <div id="gallery_images_blog">
            @foreach ($blogs as $blog)
            <div class="gal_img" onclick="window.location.href='{{route('front.blogSingle',['blog'=>$blog->id])}}';">
                <img src="{{asset($blog->feature)}}" alt="" class="w-100">
                <div class="title">
                    {{$blog->title}}

                    <div class="text-right">
                        <small class="text-white">{{$blog->created_at->diffForhumans()}}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
@section('script')
    
@endsection