@extends('layout.app')

@section('content')

    <div class="home-page">
        <section class="intro d-flex align-items-center">
            <div class="container">
                <h1 class="text-center pt-5 display-3" style="font-weight: 500">Lorem ipsum dolor sit amet.</h1>
            </div>
        </section>

        <section class="about">
            <div class="container">
                <h1>{{ __('Who are we?') }}</h1>
                <div class="about-text-wrapper">
                    <div class="about-text">
                        @if (app()->getLocale() == 'en')
                        Our company is specialized with power systems and solutions. It’s led and
                        directed by skilled hands and professional team with over 20 years of experience.<br>
                        It has a wide range of services. Also, we provide battery types, Inverters,
                        Solar systems, UPS, and lighting.<br>
                        Our inspiration to do our work comes from the interest of serving clients
                        and our country first.<br>
                        The professional team in AI-Awael Group keeps clients very satisfied
                        with the results to ensure the best service.
                        @else
                        تختص شركتنا بأنظمة الطاقة وحلولها، بقيادة وإدارة أيدي ماهرة وفريق احترافي
                        مع أكثر من 20 سنة خبرة في المجال.<br>
                        لدى الشركة مجال واسع من الخدمات، كما أننا نقوم بتوفير البطاريات بأنواعها،
                        الانفيرترات، أنظمة الطاقة الشمسية، وحدات عدم انقطاع التيار الكهربائي، والإنارة.<br>
                        الدافع والإلهام للقيام بعملنا يأتي من الاهتمام بخدمة زبائننا وبلدنا في المرتبة الأولى.<br>
                        يحافظ الفريق الاحترافي الخاص فينا على زبائننا سعيدين وراضيين بنتائج عملنا للتأكد من
                        حصولهم على أفضل خدمة.
                        @endif
                    </div>
                </div>
            </div>

            <section class="partners py-5">
                <div class="container text-center my-5">
                    <h1 class="mb-5">{{ __('Our Partners') }}</h1>
                    <div class="row mx-auto my-auto">
                        <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                            <div class="carousel-inner w-100" role="listbox">
                                <div class="carousel-item active">
                                    <div class="col-md-4">
                                        <div class="card card-body h-100">
                                            <img class="img-fluid mt-2 pb-1" width="200"
                                                src="{{ asset('images/trina-solar-logo.png') }}">
                                            <p class="text-dark text-left mt-4 pt-2">
                                                A global leading provider for
                                                photovoltaic (PV) module
                                                and smart energy solutions
                                            </p>
                                            <i class="fa-solid fa-globe h1 text-dark text-left mt-auto mt-auto"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="col-md-4">
                                        <div class="card card-body h-100">
                                            <img class="img-fluid" width="200"
                                                src="{{ asset('images/marvel logo eng_.png') }}">
                                            <p class="text-dark text-left mt-4">
                                                East is engaging in strategic
                                                sectors covering data center,
                                                smart energy (photovoltaic
                                                inverters and power
                                                generation systems,
                                                lithium batteries and
                                                energy storage systems.
                                            </p>
                                            <i class="fa-solid fa-globe h1 text-dark text-left mt-auto"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="col-md-4">
                                        <div class="card card-body h-100">
                                            <img class="img-fluid" width="200" src="{{ asset('images/EAST.png') }}">
                                            <p class="text-dark text-left mt-4">
                                                East is engaging in strategic
                                                sectors covering data center,
                                                smart energy (photovoltaic
                                                inverters and power
                                                generation systems,
                                                lithium batteries and
                                                energy storage systems.
                                            </p>
                                            <i class="fa-solid fa-globe h1 text-dark text-left mt-auto"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="col-md-4">
                                        <div class="card card-body h-100">
                                            <img class="img-fluid" width="200" src="{{ asset('images/Ritek.png') }}">
                                            <p class="text-dark text-left mt-4">
                                                RITEK is a diversified
                                                international group founded
                                                over 30 years ago.
                                                Its headquarters are located in
                                                Hsinchu, Taiwan.
                                            </p>
                                            <i class="fa-solid fa-globe h1 text-dark text-left mt-auto"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control carousel-control-prev w-auto" href="#recipeCarousel" role="button"
                                data-slide="prev">
                                <i class="fa-solid fa-angle-{{__('left')}}"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control carousel-control-next w-auto" href="#recipeCarousel" role="button"
                                data-slide="next">
                                <i class="fa-solid fa-angle-{{__('right')}}"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

        </section>

    </div>

@stop
