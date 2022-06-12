@extends('layout.app')

@section('content')
    <style>
        .categories {
            background-image: url('{{ asset('images/bg-categories.png') }}');
            background-size: cover;
            background-position: center;
        }

        .icon-container>a>img {
            width: 75px;
            transition: 0.4s;
        }

        .icon-container>a:hover>img {
            transform: scale(1.07);
        }

        .icon-container>a {
            padding: 40px 55px 20px;
            color: #1C6565;
            text-decoration: none;
        }

        .icon-container>a:nth-child(1) {
            background: #E2DDDD;
        }

        .icon-container>a:nth-child(2) {
            background: #CFD1D2;
        }

        .icon-container>a:nth-child(3) {
            background: #B4B9BB;
        }

        .icon-container>a:nth-child(4) {
            background: #A4A4A4;
        }

        .icon-container>a:nth-child(5) {
            background: #8B8D8E;
        }

        @media (max-width:973px) {
            .icon-container>a {
                border-radius: 0 !important;
            }
        }
        .categories a{
            display: flex;
            flex-direction: column;
            align-items: center;
        }

    </style>

    <div class="d-flex align-items-center justify-content-center categories" style="padding: 140px 0; min-height: calc(81vh - 1px)">
        <div>
            <h1 class="text-center text-white">{{ __('Categories') }}</h1>
            <div class="d-flex justify-content-center icon-container flex-wrap mt-5">
                @foreach ($categories as $category)
                    <a href="{{ route('site.subcategories',[ 'name'=>$category->name, 'id'=>$category->id]) }}" class="rounded-left">
                        <img src="{{ asset($category->image) }}" alt="">
                        <h6 class="text-center mt-4">{{ __($category->name) }}</h6>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
