@extends('content')

@section('content')

@php
$data_centers = DB::table('data_centers')->get();
@endphp

<main class="other_page">
                <div class="container">
                    <h1><span>{!! __("date.title") !!}</span> {!! __("CENTERS.title") !!}</h1>
                </div>
            </main>
<div class="breadcrumbs container  m-auto">
    {{Breadcrumbs::render() }}
</div>



            <div class="container other_page data-centres">
                 <p class="text_page">{!! __("All equipment.title") !!}</p>
                    <div class="centres">
                        @foreach($data_centers as $center)
                            <a href="{{route('country', $center->link)}}" class="item">
                                <img src="{{$center->img}}" alt="">
                                <p>{!! __($center->key_title_translate) !!}</p>
                            </a>
                        @endforeach
                    </div>
                    <div class="items">
                        @foreach($items as $item)
                        <div class="item">
                            <img src="{{$item->big_img}}" class="img" alt="">
                            <div>
                                <div class="title">
                                    <p>{!! __($item->key_title_translate) !!}</p>
                                    <img src="{{$item->img}}" alt="">
                                </div>
                                <p class="text">
                                <p>{!! __($item->key_text_translate) !!}</p>
                                </p>
                                <a href="{{route('country', $item->link)}}" class="btn"> <p>{!! __("view the rates19.btn_text") !!}</p> <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M5 12H19M19 12L13 18M19 12L13 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg></div> </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
            </div>

@endsection
