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

        .fa-angle-left {
            margin-right: -60px
        }

        .fa-angle-rigth {
            margin-left: -60px
        }
        .specifications ul {
            list-style: none;
        }
        .specifications ul li {
            margin-top: 0.6rem;
        }

        .specifications ul li::before {
            content: "\2022";
            color: #dc3545;
            font-weight: bold;
            font-size: 1.3rem;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
            margin-top: 0.4rem;
        }
    </style>
    <div class="product-view" style="padding: 0 0 140px">
        <div style="background: #224d42c0; padding: 160px 0 40px">
            <h1 class="text-center text-white">{{ __($item->name) }}</h1>
            <h3 class="text-center text-white font-weight-light">{{ __($item->description) }}</h3>
        </div>
        <div class="container mt-5 p-5">
            <div class="rounded bg-white p-5 mt-5">
                <div class="border border-danger rounded row p-3">
                    <div class="col-12 col-md-6">
                        <div id="custCarousel" class="carousel slide pb-5" data-ride="carousel" align="center"
                            data-interval="false">
                            <!-- slides -->

                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset($item->item_images->first()->image) }}" alt="Hills">
                                </div>
                                @foreach ($item_images as $item_image)
                                    <div class="carousel-item">
                                        <img src="{{ asset($item_image->image) }}" alt="Hills">
                                    </div>
                                @endforeach
                            </div>
                            <!-- Left right -->
                            <a class="carousel-control-prev d-none d-lg-flex" href="#custCarousel" data-slide="prev">
                                <i class="fas fa-angle-{{ __('left') }} text-dark h2"></i>
                            </a>
                            <a class="carousel-control-next d-none d-lg-flex" href="#custCarousel" data-slide="next">
                                <i class="fas fa-angle-{{ __('right') }} text-dark h2"></i>
                            </a>
                            <!-- Thumbnails -->
                            <ol class="carousel-indicators list-inline">
                                <li class="list-inline-item active">
                                    <a id="carousel-selector-0" class="selected" data-slide-to="0"
                                        data-target="#custCarousel">
                                        <img src="{{ asset($item->item_images->first()->image) }}" class="img-fluid">
                                    </a>
                                </li>
                                @foreach ($item_images as $item_image)
                                    <li class="list-inline-item">
                                        <a id="carousel-selector-1" data-slide-to="1" data-target="#custCarousel">
                                            <img src="{{ asset($item_image->image) }}" class="img-fluid">
                                        </a>
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mt-5 mt-md-0 d-flex flex-column align-items-center justify-content-center">
                        <a href= "{{ asset($item_data->file) }}" download> <button class="btn btn-danger py-2"
                            style="width: 200px; font-size: 20px;">{{ __('Datasheet') }}</button></a>
                        <a href= "{{ asset($item_manual->file) }}" download><button class="btn btn-danger mt-5 py-2"
                            style="width: 200px; font-size: 20px;">{{ __('User Manual') }}</button></a>
                        <button class="btn btn-danger mt-5 py-2"
                            style="width: 200px; font-size: 20px;">{{ __('Download Images') }}</button>
                    </div>
                </div>
            </div>

            <div class="rounded bg-white p-5 specifications" style="position: relative; margin-top:7rem">
                <h2 class="text-white bg-danger p-3 rounded" style="position: absolute;
                        top: -3rem;
                        left: 2rem;
                        transform: rotateZ(-5deg);">{{ __('Specifications') }}</h2>
                <div class="border border-danger rounded row px-3 py-4">
                    <div class="text-secondary">{!! nl2br($item->specifications) !!}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
