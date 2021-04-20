<div class="fliker">
    <div class="text" id="fliker">
        <span class="fliker_social">
            <a href="">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="">
                <i class="fab fa-facebook"></i>
            </a>
        </span> |
        <a href="">Share Us</a> |
        <a href="">Contact Us</a> |
        <a href="">Book Now</a>
    </div>
</div>
<nav class="header">
    <div class="navbar-brand">
        <img src="{{ asset('front/img/logo.png') }}" />

    </div>
    <div class="navbar-nav">
        <a href="{{route('front.home')}}" class="nav-link">Home</a>
        <a href="{{route('front.suites')}}" class="nav-link">Rooms & Suites</a>
        <a href="{{route('front.gallery')}}" class="nav-link">Gallery</a>
        <a href="{{route('front.blog',['type'=>0])}}" class="nav-link">Experience</a>
        <a href="{{route('front.blog',['type'=>1])}}" class="nav-link">Blog</a>
        {{-- <a href="" class="nav-link">asdf</a> --}}
    </div>
    <div class="toogle_menu" onclick="openNav()">
        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="41" height="41" viewBox="0 0 172 172"
            style=" fill:#000000;">
            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                font-family="none" font-weight="none" font-size="none" text-anchor="none"
                style="mix-blend-mode: normal">
                <path d="M0,172v-172h172v172z" fill="none"></path>
                <g>
                    <path
                        d="M86,18.8125c-37.10663,0 -67.1875,30.08087 -67.1875,67.1875c0,37.10663 30.08087,67.1875 67.1875,67.1875c37.10663,0 67.1875,-30.08087 67.1875,-67.1875c0,-37.10663 -30.08087,-67.1875 -67.1875,-67.1875z"
                        fill="#186099"></path>
                    <path
                        d="M86,157.21875c-39.2375,0 -71.21875,-31.98125 -71.21875,-71.21875c0,-39.2375 31.98125,-71.21875 71.21875,-71.21875c39.2375,0 71.21875,31.98125 71.21875,71.21875c0,39.2375 -31.98125,71.21875 -71.21875,71.21875zM86,22.84375c-34.80312,0 -63.15625,28.35313 -63.15625,63.15625c0,34.80313 28.35313,63.15625 63.15625,63.15625c34.80313,0 63.15625,-28.35312 63.15625,-63.15625c0,-34.80313 -28.35312,-63.15625 -63.15625,-63.15625z"
                        fill="#ffffff"></path>
                    <path
                        d="M116.23438,69.875h-60.46875c-2.28438,0 -4.03125,-1.74688 -4.03125,-4.03125c0,-2.28438 1.74687,-4.03125 4.03125,-4.03125h60.46875c2.28437,0 4.03125,1.74687 4.03125,4.03125c0,2.28437 -1.74688,4.03125 -4.03125,4.03125zM116.23438,90.03125h-60.46875c-2.28438,0 -4.03125,-1.74688 -4.03125,-4.03125c0,-2.28437 1.74687,-4.03125 4.03125,-4.03125h60.46875c2.28437,0 4.03125,1.74688 4.03125,4.03125c0,2.28437 -1.74688,4.03125 -4.03125,4.03125z"
                        fill="#ffffff"></path>
                    <g fill="#ffffff">
                        <path
                            d="M116.23438,110.1875h-60.46875c-2.28438,0 -4.03125,-1.74688 -4.03125,-4.03125c0,-2.28437 1.74687,-4.03125 4.03125,-4.03125h60.46875c2.28437,0 4.03125,1.74688 4.03125,4.03125c0,2.28437 -1.74688,4.03125 -4.03125,4.03125z">
                        </path>
                    </g>
                </g>
            </g>
        </svg>
    </div>
</nav>
{{-- <div class="sidenav" id="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="logo">
        <img src="{{ asset('front/img/logo.png') }}" />
    </div>
    <div class="sidebar-nav">
        <a href="{{route('front.home')}}" class="nav-link">Home</a>
        <a href="{{route('front.suites')}}" class="nav-link">Rooms & Suites</a>
        <a href="{{route('front.gallery')}}" class="nav-link">Gallery</a>
        <a href="{{route('front.blog',['type'=>0])}}" class="nav-link">Experience</a>
        <a href="{{route('front.blog',['type'=>1])}}" class="nav-link">Blog</a>

    </div>
</div> --}}
