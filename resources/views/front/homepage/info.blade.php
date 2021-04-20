<div id="info">
   
        <div class="info_title d-block d-lg-none playfair">
            combining <br>
            nature & luxury
        </div>
        <div class="row">
            <div class="col-md-7 ">
                <div id="info_carousel" class="owl-carousel owl-theme">
                    @for ($i = 0; $i < 10; $i++)
                        <div class="item" >
                            <img src="{{ asset('front/img/slide.png') }}" alt="" class="w-100" id="slide_{{ $i }}">
                        </div>
                    @endfor
                
                </div>

            </div>
            <div class="col-md-5 about">
                <div class="info_title d-none d-lg-block playfair">
                    combining <br>
                    nature & luxury
                </div>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsum, ea rem? Voluptates suscipit
                    inventore iste ratione natus, aliquid porro maiores laboriosam sed dolores, sunt quidem deserunt
                    placeat a enim saepe?
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsum, ea rem? Voluptates suscipit
                    inventore iste ratione natus, aliquid porro maiores laboriosam sed dolores, sunt quidem deserunt
                    placeat a enim saepe?
                </p>
                <div class="detail">
                    <a href="">
                        View Detail
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32"
                            viewBox="0 0 172 172" style=" fill:#000000;">
                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                style="mix-blend-mode: normal">
                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                <g fill="currentColor">
                                    <path
                                        d="M113.88281,49.88672l-7.55859,7.72656l23.01172,23.01172h-107.83594v10.75h107.83594l-23.01172,23.01172l7.55859,7.72656l36.11328,-36.11328z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                    </a>

                </div>
            </div>
        </div>
    
</div>
