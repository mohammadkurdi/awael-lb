@extends('layout.app')

@section('content')
    <style>
        .products {
            background-image: url('{{ asset('images/bg-type.png') }}');
            background-size: cover;
            background-repeat-y: repeat;

        }

        .products a {
            color: #fff;
            text-decoration: none;
        }

        .my-card {
            background: #F2EBEB;
            transition: 0.3s;
        }

        .products .my-card:hover {
            transform: scale(1.03);
        }

        .products img {
            width: 100%;
            height: 100%;
            background: #BFBEC4;
        }
    </style>
    <div class="products" style="padding: 0  0 100px 0">
        <div class="countener-fluid" style="background: rgba(255, 255, 255, 0.863)">
            <div class="row justify-content-center align-items-center" style="padding: 160px 0 40px; color: #224d42c0">
                <div class="col-12 col-md-6 d-flex">
                    <h1 style="border-left: #D94B26 8px solid" class="mx-auto px-3">{{ $subcategory->name }}</h1>
                </div>
                <div class="col-12 col-md-6 pl-5 mt-4 mt-md-0">
                    <h3>{{ __('Description') }}</h3>
                    <p>{{ $subcategory->description }}</p>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                @foreach ($items as $item)
                    <div class="col-6 col-md-4 col-lg-3 my-3">
                        <div class="my-card p-4">
                            <a href="{{ route('site.product',$item->id) }}">
                                <img src="{{ asset($item->item_images->first()->image) }}" alt="">
                                <h5 class="text-center mt-4 text-secondary">{{ $item->name }}</h5>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
