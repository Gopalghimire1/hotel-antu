@extends('front.layout.layout')
@section('title', 'Home')
@section('style')
    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/home.css') }}">
@endsection
@section('content')
    <div class="home" id="home">
        <div id="home_header">

            <div id="home_carousel" class="owl-carousel owl-theme">
                @for ($i = 0; $i < 10; $i++)
                    <div class="item" >
                        <div class="owl_slider" style="background-image: url({{ asset('front/img/slide.png') }});">

                        </div>
                        {{-- <img src="{{ asset('front/img/slide.png') }}" alt="" class="w-100" id="slide_{{ $i }}"> --}}
                    </div>
                @endfor
            
            </div>
            @include('front.homepage.book_now')
        </div>
        @include('front.homepage.info')
        @include('front.homepage.other')
    </div>
@endsection
@section('script')
    <script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>

    <script>
        var start_date=new Date();
        var end_date=new Date();
        var today=new Date();
        end_date.setDate(start_date.getDate()+1);
        console.log(start_date.getDate());
        function checkDate(){
            start_date=document.getElementById('start_date').valueAsDate ;
            end_date=document.getElementById('end_date').valueAsDate ;
         
            if(today>start_date){
                alert('Please Select Appropraite date');
                start_date=today;
                document.getElementById('start_date').valueAsDate = start_date;

            }
            if(start_date>=end_date){
                end_date.setDate(start_date.getDate()+1);
                document.getElementById('end_date').valueAsDate = end_date;
            }
        }

        function refreshDate(){

            document.getElementById('start_date').valueAsDate = start_date;
            document.getElementById('end_date').valueAsDate = end_date;
        }
        $(function() {
            $slider=$('#home_carousel');
            $slider.owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                items: 1
              
            });
            $('#info_carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                items: 1,
                autoplay:true,
                autoplayTimeout:3000,
                autoplayHoverPause:true,
                dots:false
              
            });
            refreshDate();
        });

    </script>
@endsection
