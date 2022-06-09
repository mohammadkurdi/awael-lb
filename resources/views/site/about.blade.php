@extends('layout.app')

@section('content')

    <style>
        .about-page-page {
            background-image: url('{{ asset('images/bg-about-page.png') }}');
            background-size: cover;
            background-position: center;
        }

        .about-page-page {
            color: #808080;
        }

        .bg-red {
            margin-top: 20px;
            margin-left: -40px;
            margin-right: -40px;
        }

        @media (min-width: 768px) {
            .bg-red {
                margin: 50px -40px -100px -40px;
            }
            html[lang="ar"] .vision {
            margin-bottom: 30px;
        }
        }

        html[lang="ar"] .bg-red {
            transform: scaleX(-1);
        }

        h1 {
            font-size: 7vmax;
        }

        .d-flex>img {
            z-index: 1;
        }



    </style>

    <div class="about-page-page" style="padding: 190px 0 100px">
        <div class="container">
            <div class="row col-md-12 col-lg-9 mx-auto rounded-lg shadow-lg" style="background: #F0F0F0; padding: 65px 40px">
                <div class="col-12 col-md-6">
                    {{-- <h2>{{__('Our')}}</h2> --}}
                    <h1>{{ __('History') }}</h1>
                </div>
                <div class="col-12 col-md-6">
                    <p>
                        @if (app()->getLocale() == 'en')
                            AI-Awael Group was established in 1998,<br>
                            through the main company AI-Awael for Computers<br>
                            by Eng. Moumen Al khateeb, Founder and Chairman of<br>
                            the Group. Through these years,<br>
                            business had developed more and more.<br>
                        @else
                            تم إنشاء شركتنا المتخصصة بالحواسب في عام 1998،<br>
                            وذلك من قِبَل المؤسس وصاحبها المهندس مؤمن الخطيب.<br>
                            مع مرور السنوات، تطوّرت وتنوعت خدماتها.<br>
                        @endif
                    </p>
                </div>
                <img class="w-75 bg-red" src="{{ asset('images/bg-red.png') }}" alt="">
                <div class="col-12 col-md-6 offset-md-6">
                    <div class="d-flex align-items-center">
                        {{-- <h2 class="mr-4">{{__('Our')}}</h2> --}}
                        <h1 class="vision">{{ __('Vision') }}</h1>
                    </div>
                    <p>
                        @if (app()->getLocale() == 'en')
                            For more than ten years, AI-Awael Group
                            has pioneered technology products distribution
                            to empower the world dream of technology.
                            The hard work that has been done,
                            is a proof of being a world-class group.
                        @else
                            لأكثر من 10 سنوات، كانت مجموعة الأوائل رائدة في مجال<br>
                            توزيع وتسويق المنتجات التقنية وذلك لتحقيق حلم العالم في التكنولوجيا.<br>
                            العمل المستمر والشاق الذي تم بذله دليل على كون<br>
                            مجموعة الأوائل مجموعة عالمية.<br>
                        @endif
                    </p>
                </div>
                <div class="col-12 col-md-6 mt-4 d-flex">
                    <img class="mx-auto" style="height: 300px; width: 220px"
                        src="{{ asset('images/img-gray.png') }}" alt="">
                </div>
                <div class="col-12 col-md-6 mt-4 d-flex">
                    <img class="mx-auto" style="height: 200px; width: 300px"
                        src="{{ asset('images/img-gray.png') }}" alt="">
                </div>
                <div class="col-12 mt-4 d-flex">
                    <img class="mx-auto" style="height: 200px; width: 600px"
                        src="{{ asset('images/img-gray.png') }}" alt="">
                </div>
                <img class="" style="
                            width: 11%;
                            position: absolute;
                            bottom: 25%;
                            left: 4%;
                            opacity: 0.7" src="{{ asset('images/points-x.png') }}">
                <img class="" style="
                            width: 11%;
                            position: absolute;
                            bottom: 5%;
                            right: 4%;
                            opacity: 0.7" src="{{ asset('images/points-y.png') }}">
            </div>
        </div>
    </div>

@stop
