@extends('layout.app')

@section('content')
    <style>
        .product-view {
            background-image: url('{{ asset('images/bg-type.png') }}');
            background-size: cover;
            background-repeat-y: repeat;
        }

        .carousel-inner img {
            width: 100%;
            height: 100%;
        }

        #custCarousel .carousel-indicators {
            position: static;
            margin-top: 20px;
        }

        #custCarousel .carousel-indicators>li {
            width: 100px;
        }

        #custCarousel .carousel-indicators li img {
            display: block;
            opacity: 0.5;
        }

        #custCarousel .carousel-indicators li.active img {
            opacity: 1;
        }

        #custCarousel .carousel-indicators li:hover img {
            opacity: 0.75;
        }
        .fa-angle-left{
            margin-right: -60px
        }
        .fa-angle-rigth{
            margin-left: -60px
        }

    </style>
    <div class="product-view" style="padding: 0 0 140px">
        <div style="background: #224d42c0; padding: 160px 0 40px">
            <h1 class="text-center text-white">{{ __('MR 18-12') }}</h1>
            <h3 class="text-center text-white font-weight-light">{{ __('18AH-12V') }}</h3>
        </div>
        <div class="container mt-5 p-5">
            <div class="rounded bg-white row p-5 mt-5">
                <div class="col-12 col-md-6">
                    <div id="custCarousel" class="carousel slide pb-5" data-ride="carousel" align="center" data-interval="false">
                        <!-- slides -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{asset('images/battery.png')}}" alt="Hills">
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('images/battery.png')}}" alt="Hills">
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('images/battery.png')}}" alt="Hills">
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('images/battery.png')}}" alt="Hills">
                            </div>
                        </div>
                        <!-- Left right -->
                        <a class="carousel-control-prev d-none d-lg-flex" href="#custCarousel" data-slide="prev">
                            <i class="fas fa-angle-{{__('left')}} text-dark h2"></i>
                        </a>
                        <a class="carousel-control-next d-none d-lg-flex" href="#custCarousel" data-slide="next">
                            <i class="fas fa-angle-{{__('right')}} text-dark h2"></i>
                        </a>
                        <!-- Thumbnails -->
                        <ol class="carousel-indicators list-inline">
                            <li class="list-inline-item active">
                                <a id="carousel-selector-0" class="selected" data-slide-to="0"
                                    data-target="#custCarousel">
                                    <img src="{{asset('images/battery.png')}}" class="img-fluid">
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a id="carousel-selector-1" data-slide-to="1" data-target="#custCarousel">
                                    <img src="{{asset('images/battery.png')}}" class="img-fluid">
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a id="carousel-selector-2" data-slide-to="2" data-target="#custCarousel">
                                    <img src="{{asset('images/battery.png')}}" class="img-fluid">
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a id="carousel-selector-2" data-slide-to="3" data-target="#custCarousel">
                                    <img src="{{asset('images/battery.png')}}" class="img-fluid">
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-5 mt-md-0 d-flex flex-column align-items-center justify-content-center">
                    <button class="btn btn-danger py-2" style="width: 200px; font-size: 20px;">{{__('Datasheet')}}</button>
                    <button class="btn btn-danger mt-5 py-2" style="width: 200px; font-size: 20px;">{{__('User manual')}}</button>
                </div>
            </div>
        </div>
    </div>
@endsection
