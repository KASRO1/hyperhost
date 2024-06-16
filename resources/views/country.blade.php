@extends('content')
@section('title', 'VPS/VDS сервера – Высокоскоростные решения от Hyper.Hosting')

@section('description', 'Эффективные виртуальные серверы. Быстрый и стабильный хостинг от Hyper.Hosting.')
@section('content')

@php
$data_centers = DB::table('data_centers')->get();
@endphp


<main>
                <div class="container">
                    <div class="slider country">
                        <div class="slide">
                            <div>
                                <p class="title">
                                    {!! __("VPS/VDS-rental-in.title") !!} {{__($data_center->key_title_translate)}}, <br>
                                    <span>{!! __("city.title") !!} {{ __("$data_center->city")}}
                                        <img src="{{$data_center->img}}" alt="">
                                    </span>
                                </p>
                                <p class="text">
                                {!! nl2br(__($data_center['key_text_translate'])) !!}
                                </p>
                                <a href="#tarifs" class="btn"> <p>{!! __("View-rates.title")  !!}</p> <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M5 12H19M19 12L13 18M19 12L13 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div> </a>
                            </div>
                            <img src="/img/data-center.png" alt="">
                        </div>
                    </div>
                </div>
            </main>

            <div class="slider flags" style="display: none">
                @php $i=1 @endphp
                @foreach($data_centers as $data_cent)
                <div class="slide @if($data_cent->id == $data_center->id) active @endif" data-country="{{$data_cent->en_name}}" data-id="{{$data_cent->id}}">
                    <img src="{{$data_cent->img}}" alt="">
                    <p>{{ __($data_cent->name)}}</p>
                </div>
                @php $i++; @endphp
                @endforeach
            </div>

            <div class="container" id="tarifs">
                <div style="display: none" class="tabs">
                    @php $i=1 @endphp
                    @foreach($categories as $category)
                    <div  class="tab
                     @if($type == $category->id) active @endif"
                          data-id="{{$category->id}}">{{ __("$category->name")}}</div>
                    @php $i++; @endphp
                    @endforeach
                </div>
                <div class="tarifs country" style="min-height: 719.14px; transition: 0.2s">

                </div>
            </div>

            <section class="servers_countries">
                <div class="container">
                    <p class="title">{!! __("Servers in other countries.title") !!}</p>
                    <div class="items">
                        @foreach($data_centers as $center)
                            <a href="{{route('country', $center->link)}}" class="item">
                                <img src="{{$center->img}}" alt="">
                                <p>{{ __("$center->name")}}</p>
                            </a>
                        @endforeach
                    </div>
                </div>
            </section>
            <section class="country_info">
                <div class="container">
                    <div class="content">
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M13.3949 9.882L9.95993 10.3125L9.83693 10.8825L10.5119 11.007C10.9529 11.112 11.0399 11.271 10.9439 11.7105L9.83693 16.9125C9.54593 18.258 9.99443 18.891 11.0489 18.891C11.8664 18.891 12.8159 18.513 13.2464 17.994L13.3784 17.37C13.0784 17.634 12.6404 17.739 12.3494 17.739C11.9369 17.739 11.7869 17.4495 11.8934 16.9395L13.3949 9.882ZM13.4999 6.75C13.4999 7.14782 13.3419 7.52936 13.0606 7.81066C12.7793 8.09196 12.3978 8.25 11.9999 8.25C11.6021 8.25 11.2206 8.09196 10.9393 7.81066C10.658 7.52936 10.4999 7.14782 10.4999 6.75C10.4999 6.35218 10.658 5.97064 10.9393 5.68934C11.2206 5.40804 11.6021 5.25 11.9999 5.25C12.3978 5.25 12.7793 5.40804 13.0606 5.68934C13.3419 5.97064 13.4999 6.35218 13.4999 6.75Z" fill="white"/>
                          </svg></div>
                          {!! __($data_center->key_info_translate)  !!}
                    </div>

                </div>
            </section>

            <section class="infos">
                <h2><span>{!! __("PERFECT HOSTING.title") !!} </span> {!! __("FOR-YOU.title") !!}</h2>
                <div class="container">
                    <div class="item">
                        <img src="/img/icons/icon_shield.svg" alt="">
                        <p class="title">{!! __("ADAPTIVE-PROTECTION.title") !!}</p>
                        <p class="text">
                        {!! __("Adaptive_Protection_text.title") !!}   
                        </p>
                    </div>
                    <div class="item">
                        <img src="/img/icons/icon_rocket.svg" alt="">
                        <p class="title">{!! __("FAST_WORK.title") !!}</p>
                        <p class="text">
                        {!! __("FAST_WORK_text.title") !!}
                        </p>
                    </div>
                    <div class="item">
                        <img src="/img/icons/icon_dashboard.svg" alt="">
                        <p class="title">{!! __("CONVENIENT-OPERATION.title") !!}</p>
                        <p class="text">
                        {!! __("CONVENIENT-OPERATION-text.title") !!}
                        </p>
                    </div>

                    <div class="item">
                        <div class="dot"></div>
                        <img src="/img/icons/icon_support.svg" alt="">
                        <p class="title">{!! __("for_you_support.title") !!}</p>
                        <p class="text">
                        {!! __("SUPPORT-SERVICE-text.title") !!}
                        </p>
                    </div>
                    <div class="item">
                        <div class="dot"></div>
                        <img src="/img/icons/icon-park-solid_speed-one.svg" alt="">
                        <p class="title">{!! __("SERVER-UPTIME.title") !!}</p>
                        <p class="text">
                        {!! __("SERVER-UPTIME-text.title") !!}
                        </p>
                    </div>
                    <div class="item">
                        <div class="dot"></div>
                        <img src="/img/icons/connect_icon.svg" alt="">
                        <p class="title">{!! __("SSH-ACCESS.title") !!}</p>
                        <p class="text">
                        {!! __("SSH-ACCESS-text.title") !!}
                        </p>
                    </div>
                </div>
            </section>

            <section class="faq">
                <div class="container">
                    <h2 class="title"><span>{!! __("FREQUENTLY.title") !!} </span>{!! __("F-A-Q.title") !!}</h2>
                    <div class="items">

                        @php
                        $faqs = DB::table('faqs')->where('category', '=', 2)->get();
                        $i = 0;
                        @endphp
                        @foreach($faqs as $faq)
                        @php
                          $i++;
                        @endphp
                        <div class="item">
                            <div class="arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path d="M15.7443 4.06464L15.2202 3.5369C15.0552 3.37208 14.8358 3.28128 14.6012 3.28128C14.3668 3.28128 14.1471 3.37208 13.9822 3.5369L8.00358 9.51574L2.0181 3.53026C1.85341 3.36545 1.6337 3.27478 1.3993 3.27478C1.16489 3.27478 0.945048 3.36545 0.780234 3.53026L0.256002 4.05475C-0.085334 4.39583 -0.085334 4.95141 0.256002 5.29249L7.38243 12.4445C7.54712 12.6092 7.76657 12.7253 8.00306 12.7253H8.00579C8.24033 12.7253 8.45978 12.6091 8.62446 12.4445L15.7443 5.31187C15.9092 5.14719 15.9997 4.9211 16 4.68669C16 4.45216 15.9092 4.22919 15.7443 4.06464Z" fill="#4093FF"/>
                                </svg>
                            </div>
                            <div class="head">
                                <p>{{ __($faq->key_title_translate) }}</p>
                            </div>
                            <p class="text" style="display: none;">
                                {{ __($faq->key_text_translate) }}
                            </p>
                        </div>
                        @endforeach

                   </div>
                   <a href="#" class="more">{!! __("Support-Service-faq.title") !!}</a>
                </div>
            </section>

@endsection
