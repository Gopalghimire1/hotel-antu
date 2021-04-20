@extends('front.layout.layout')
@section('title', 'Gallery')
@section('style')
<link rel="stylesheet" href="{{asset('front/css/gallery.css')}}">
@endsection
@section('content')
    <div id="gallery">
        <div id="gallery_title" class="playfair">
            Our Gallery
        </div>
        <div id="gallery_desc">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab, aliquam quidem voluptates nisi delectus autem iusto atque iste nesciunt reiciendis doloribus veniam esse sapiente porro et, consequuntur cumque corporis ipsa.
        </div>
        <div id="gallery_images">
            @foreach ($images as $image)
            <div class="gal_img">
                <img src="{{asset($image->image)}}" alt="" class="w-100">
            </div>
            @endforeach
        </div>
    </div>
@endsection
@section('script')
    
@endsection