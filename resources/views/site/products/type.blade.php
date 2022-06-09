@extends('layout.app')

@section('content')
    <style>
        .type {
            background-image: url('{{ asset('images/bg-type.png') }}');
            background-size: cover;
            background-repeat-y: repeat;

        }

        .type a {
            color: #fff;
            text-decoration: none;
        }

        .my-card {
            transition: 0.3s;
        }

        .type .my-card:hover {
            transform: scale(1.03);
        }

        .type img {
            border-radius: 20px;
            border: 3px solid #C30E0E;
            width: 100%;
            height: 100%;
        }

    </style>
    <div class="type" style="padding: 140px 0">
        <div class="container">
            <h1 class="text-center text-white">{{__('Batteries')}}</h1>
            <div class="row mt-5">
                @for ($i = 0; $i < 12; $i++)
                    <div class="col-6 col-md-4 col-lg-3 my-3">
                        <div class="my-card">
                            <a href="/products/view/1">
                                <img src="{{ asset('images/Rectangle 3.png') }}" alt="">
                                <h5 class="text-center mt-3">Lead Acid</h5>
                            </a>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
@endsection
