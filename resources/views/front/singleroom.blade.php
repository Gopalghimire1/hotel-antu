@extends('front.layout.layout')
@section('title', 'single room name')
@section('style')
    <link rel="stylesheet" href="{{ asset('front/css/singleroom.css') }}">
@endsection
@section('content')
    <div id="singleroom">
        <div id="singleroom_header" style="background-image:url('{{ asset('front/img/singleroom.png') }}">

        </div>
        <div id="singleroom_name" class="text-center playfair">
            The Suite Name is to Be put
        </div>

        <div id="singleroom_desc">
            <div id="singleroom_book" class="shadow-sm">
                <span class="number">
                    Rs.50000 / Night
                </span>
                <a href="{{route('front.book')}}?roomid=1" class=""> Book Now</a>
            </div>
            <div  id="singleroom_desccontainer" >
                <p>
                    A hotel is an establishment that provides paid lodging on a short-term basis. Facilities provided inside a hotel room may range from a modest-quality mattress in a small room to large suites with bigger, higher-quality beds, a dresser, a refrigerator and other kitchen facilities, upholstered chairs, a flat screen television, and en-suite bathrooms. Small, lower-priced hotels may offer only the most basic guest services and facilities. Larger, higher-priced hotels may provide additional guest facilities such as a swimming pool, business centre (with computers, printers, and other office equipment), childcare, conference and event facilities, tennis or basketball courts, gymnasium, restaurants, day spa, and social function services. Hotel rooms are usually numbered (or named in some smaller hotels and B&Bs) to allow guests to identify their room. Some boutique, high-end hotels have custom decorated rooms. Some hotels offer meals as part of a room and board arrangement. In the United Kingdom, a hotel is required by law to serve food and drinks to all guests within certain stated hours.[citation needed] In Japan, capsule hotels provide a tiny room suitable only for sleeping and shared bathroom facilities.
                </p>
            </div>
            <div  id="singleroom_imagecontainer">

                <div class="singleroom_feature">
                    <img id="feature_image"  src="{{ asset('front/img/singleroom.png') }}" class="w-100 rounded" alt="">
                </div>

                <div class="d-flex f-wrap">
                    @for ($i = 0; $i < 5; $i++)
                        <div class="singleroom_gallery">
                            <img onclick="document.getElementById('feature_image').src='{{ asset('front/img/singleroom.png') }}';" src="{{ asset('front/img/singleroom.png') }}" class="w-100 rounded" alt="">
                        </div>
                    @endfor
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
                        @for ($i = 0; $i < 12; $i++)
                            
                            <div class="col-md-4">
                                <div class="singleroom_facilities_item"> 
                                    <i class="fas fa-check"></i> 
                                    <span>
                                        some shit service adsfasd
                                    </span>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
