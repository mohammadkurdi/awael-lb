@extends('layout.app')

@section('content')

    <section class="about-page">
        <div class="container">
            <div class="row">
                <img class="mx-auto" style="max-width: 90%" width="600"
                    src="{{ asset('images/keep-in-touch' . (app()->getLocale() == 'en' ? '' : '-2') . '.png') }}" alt="">
                <div class="col-12 mt-5">
                    <div style="background:#3B6767; border: 3px solid #fff">
                        <div class="row">
                            <div class="col-12 col-md-6 py-5">
                                <div class="address d-flex flex-column justify-content-center align-items-center">
                                    <img width="60" class="mx-auto" src="{{ asset('images/icon-location.svg') }}"
                                        alt="">
                                    <span class="text-white mt-3">{{ __('Address') }}</span>
                                </div>
                                <p class="px-5 mt-4 text-white">
                                    @if (app()->getLocale() == 'en')
                                        ALAWAEL SARL <br>
                                        LEBANON-BEIRUT-BAABDA-HAREET HRIEK STREET:<br>
                                        MR.ABBAS AL-MUSAWI-BUILDING<br>
                                        ALNASIM-NO.318-GROUND LEVEL-CENTER<br><br>
                                        Chtaura - Main Road - After Al-Mawarid Bank<br><br>
                                        Beirut - Haret Hreik - Burj Al-Barajneh Street<br><br>
                                        Beirut - Haret Hreik - near Al-Amilieh Al-Amilieh<br><br>
                                    @else
                                        <br>
                                        شتورا - الطريق العام - بعد بنك الموارد<br><br>
                                        بيروت - حارة حريك - شارع برج البراجنة<br><br>
                                        بيروت - حارة حريك - قرب المهنية العاملية<br><br>
                                    @endif
                                </p>
                                <div class="address row justify-content-around mt-5 text-white text-center">
                                    <div class="col-6">
                                        <img width="60" src="{{ asset('images/icon-call-us.svg') }}" alt="">
                                        <p class="mt-3">{{ __('Call Us') }}<br>
                                            +961 7682 9783<br>
                                            +961 7601 0307<br>
                                        </p>
                                    </div>
                                    <div class="col-6">
                                        <img width="60" src="{{ asset('images/icon-@.svg') }}" alt="">
                                        <p class="mt-3">{{ __('Email') }}<br>
                                            info@awael-lb.com
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="map">
                                    <div class="gmap_canvas"><iframe width="100%"
                                            height="{{ app()->getLocale() == 'en' ? '696' : '600' }}" id="gmap_canvas"
                                            style="margin-bottom: -20px"
                                            src="https://maps.google.com/maps?q=شركة+الأوائل+Marvel+tech%E2%80%AD&t=&z=9&ie=UTF8&iwloc=&output=embed"
                                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
