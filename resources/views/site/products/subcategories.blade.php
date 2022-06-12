@extends('layout.app')

@section('content')
    <style>
        .categories {
            background-image: url('{{ asset('images/bg-categories.png') }}');
            background-size: cover;
            background-repeat-y: repeat;

        }

        .categories a {
            color: #fff;
            text-decoration: none;
        }

        .my-card {
            transition: 0.3s;
        }

        .categories .my-card:hover {
            transform: scale(1.03);
        }

        .categories img {
            border-radius: 20px;
            border: 3px solid #C30E0E;
            width: 100%;
            height: 100%;
        }

    </style>
    <div class="categories" style="padding: 140px 0">
        <div class="container">
            <h1 class="text-center text-white">{{__($name)}}</h1>
            <div class="row mt-5">
                @foreach ($subcategories as $subcategories)
                    <div class="col-6 col-md-4 col-lg-3 my-3">
                        <div class="my-card">
                            <a href="{{ route('site.products',['name' => $subcategories->name, 'id' => $subcategories->id]) }}">
                                <img src="{{ asset($subcategories->image) }}" alt="">
                                <h5 class="text-center mt-3">{{ $subcategories->name }}</h5>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
