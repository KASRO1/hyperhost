@extends('content')
@section('title', 'Часто задаваемые вопросы – FAQ от Hyper.Hosting')

@section('description', 'Ответы на часто задаваемые вопросы о наших услугах хостинга и серверах от Hyper.Hosting.')
@section('content')

<main class="other_page">
                <div class="container">
                    <h1><span>{!! __("FREQUENTLY.title") !!}  </span>{!! __("F-A-Q.title") !!}</h1>
                </div>
            </main>

<div class="breadcrumbs container  m-auto">
    {{Breadcrumbs::render() }}
</div>


            <div class="container other_page faq">
                   <div class="left items">

                    @foreach($categories as $cat)
                    <p class="title">{{ __("$cat->name")}}</p>
                    @php
                    $faqs = DB::table('faqs')->where('category', '=', $cat->id)->get();
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
                            {{ __($faq->key_title_translate) }}</p>
                            </div>
                            <p class="text" style="display: none;">
                                {{ __($faq->key_text_translate) }}
                            </p>
                        </div>
                        @endforeach
                    @endforeach
                   </div>
                   <div class="right">
                        <div class="supp">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
                                    <path d="M25.0001 6.77079C14.9324 6.77079 6.77094 14.9323 6.77094 25C6.77094 28.3208 7.6574 31.4302 9.20635 34.1093C9.38344 34.4145 9.42823 34.7781 9.33135 35.1177L7.12719 42.8697L14.8772 40.6656C15.0451 40.6178 15.2208 40.6042 15.394 40.6257C15.5673 40.6471 15.7344 40.7032 15.8855 40.7906C18.6554 42.3932 21.8 43.2345 25.0001 43.2291C35.0678 43.2291 43.2293 35.0677 43.2293 25C43.2293 14.9323 35.0678 6.77079 25.0001 6.77079ZM4.16677 25C4.16677 13.4937 13.4939 4.16663 25.0001 4.16663C36.5064 4.16663 45.8334 13.4937 45.8334 25C45.8334 36.5062 36.5064 45.8333 25.0001 45.8333C21.5315 45.8383 18.1171 44.9738 15.0689 43.3187L6.49073 45.7583C5.11677 46.1489 3.84802 44.8791 4.23865 43.5062L6.67823 34.925C5.02513 31.8784 4.16169 28.4661 4.16677 25ZM16.6668 21.0937C16.6668 20.375 17.2501 19.7916 17.9689 19.7916H32.0314C32.2023 19.7916 32.3717 19.8253 32.5296 19.8907C32.6876 19.9562 32.8312 20.0521 32.9521 20.173C33.073 20.2939 33.1689 20.4374 33.2343 20.5954C33.2998 20.7534 33.3334 20.9227 33.3334 21.0937C33.3334 21.2647 33.2998 21.434 33.2343 21.592C33.1689 21.75 33.073 21.8935 32.9521 22.0144C32.8312 22.1353 32.6876 22.2312 32.5296 22.2967C32.3717 22.3621 32.2023 22.3958 32.0314 22.3958H17.9689C17.2501 22.3958 16.6668 21.8125 16.6668 21.0937ZM17.9689 27.6041C17.6235 27.6041 17.2923 27.7413 17.0481 27.9855C16.804 28.2297 16.6668 28.5609 16.6668 28.9062C16.6668 29.2515 16.804 29.5827 17.0481 29.8269C17.2923 30.0711 17.6235 30.2083 17.9689 30.2083H27.8647C28.21 30.2083 28.5412 30.0711 28.7854 29.8269C29.0296 29.5827 29.1668 29.2515 29.1668 28.9062C29.1668 28.5609 29.0296 28.2297 28.7854 27.9855C28.5412 27.7413 28.21 27.6041 27.8647 27.6041H17.9689Z" fill="white"/>
                                </svg>
                            </div>
                            <p>
                            {!! __("faq-text.title")  !!}
                            </p>
                            <a href="{{route('contacts')}}" class="btn">{!! __("Support-Service-faq.title")  !!}</a>
                        </div>
                   </div>
            </div>

@endsection
