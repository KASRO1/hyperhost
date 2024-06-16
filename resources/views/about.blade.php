@extends('content')

@section('title', 'О нас – История и ценности Hyper.Hosting')

@section('description', 'Информация о компании, наши ценности и миссия. Узнайте больше о Hyper.Hosting.')

@section('content')


            <main class="other_page">  
                <div class="container">
                    <h1><span>{!! __("About our.title") !!}</span> {!! __("SERVICE.title") !!}</h1>
                </div>
            </main>
            <div class="breadcrumbs container  m-auto">
                {{Breadcrumbs::render() }}
            </div>
 


            <div class="container other_page about">
                <div class="item">
                    <img src="/img/about1.png" alt="">
                    <div>
                        <p class="title">{!! __("ADVANCED SOLUTIONS.title") !!}</p>
                        <p class="text">
                            {!! __("ADVANCED SOLUTIONS-text.title") !!}
                        </p>
                    </div>
                </div>
                <div class="item"> 
                    <div>
                        <p class="title">{!! __("RELIABILITY AND INNOVATION.title") !!}</p>
                        <p class="text">
                            {!! __("RELIABILITY AND INNOVATION-text.title") !!}
                        </p>
                    </div>
                    <img src="/img/about2.png" alt="">
                </div>
            </div>
    
@endsection