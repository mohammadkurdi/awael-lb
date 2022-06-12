<!DOCTYPE html>
<html lang="{{ Lang::locale() }}" dir="{{ App::isLocale('ar') ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Al Awael Lebanon') }}</title>
    {{-- Bootstrap --}}
    @if (Lang::locale() == 'en')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    @else
        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css">
    @endif
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    {{-- My CSS Files --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- google font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        html[lang="ar"] *:not(i) {
            font-family: "Segoe UI", "Fira Sans", sans-serif;
        }
    </style>
</head>

<body>
    <div class="header fixed-top bg-white">
        <div class="container">
            <nav class="navbar navbar-expand-lg py-1">
                <a class="navbar-brand" href="{{ route('site.index') }}">
                    <img src="{{ asset('images/logo.png') }}" width="100" class="image-fluid">
                </a>
                <button class="navbar-toggler p-0" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mt-4 mt-lg-0">
                        <li class="nav-item mx-4 font-weight-bold active">
                            <a class="nav-link" href="{{ route('site.index') }}">
                                {{ __('Home') }}
                                <hr class="active-link">
                            </a>
                        </li>
                        <li class="nav-item mx-4 font-weight-bold">
                            <a class="nav-link" href="{{ route('site.categories') }}">
                                {{ __('Products') }}
                                <hr class="active-link">
                            </a>
                        </li>
                        <li class="nav-item mx-4 font-weight-bold">
                            <a class="nav-link" href="{{ route('site.about') }}">
                                {{ __('About us') }}
                                <hr class="active-link">
                            </a>
                        </li>
                        <li class="nav-item mx-4 font-weight-bold">
                            <a class="nav-link" href="{{ route('site.contact') }}">
                                {{ __('Contact us') }}
                                <hr class="active-link">
                            </a>
                        </li>
                    </ul>
                    <form action="{{ route('site.search')}}" action="GET">
                        <form class="text-danger mx-auto mx-lg-0 d-table mb-3 mb-lg-0" >
                            <span class="search-bar mr-3">
                                <input type="submit" hidden />
                                <input type="text" class="search-hover" name="search"
                                    placeholder="{{ __('search here') }}..." />
                                <i class="fa-solid fa-search"></i>
                            </span>
                            <a href="/lang/{{ __('ar') }}" title="{{app()->getLocale() == 'en' ? 'عربي' : 'English'}}"><img src="{{ asset('images/translation-2.svg') }}"
                                    width="26" alt=""></a>
                        </form>
                    </form>
                </div>
            </nav>
        </div>
    </div>

    <div class="">
        @yield('content')
    </div>

    <footer class="pt-5 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-10 col-md-6 col-lg-5 mx-auto">
                    <form action="" class="d-flex">
                        <input type="text" class="form-control bg-transparent text-white" name="" id=""
                            placeholder="{{ __('Your e-mail') }}">
                        <button type="submit" class="btn btn-danger ml-3">{{ __('Subscribe') }}</button>
                    </form>
                </div>
                <div class="col-12 d-flex justify-content-center align-items-center mt-4 mb-3">
                    <hr class="bg-white border-0 w-25 mx-2 mx-md-3 my-0" style="height: 1px">
                    <div class="icons h5 ">
                        <a href="" class="mx-1"><i class="fa-brands fa-instagram"></i></a>
                        <a href="" class="mx-1"><i class="fa-brands fa-youtube"></i></a>
                        <a href="" class="mx-1"><i class="fa-brands fa-facebook"></i></a>
                        <a href="" class="mx-1"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                    <hr class="bg-white border-0 w-25 mx-2 mx-md-3 my-0" style="height: 1px">
                </div>
                <span class="w-100 text-center">© 2022 {{ __('Marvel. All rights reserved') }}</span>
            </div>
        </div>
    </footer>

    {{-- Jquery --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    {{-- my js --}}
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
