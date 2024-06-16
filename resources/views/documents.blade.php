@extends('content')
@section('title', 'Документы – Политики и правовая информация от Hyper.Hosting')

@section('description', 'Полезные документы, политики и правовая информация компании Hyper.Hosting.')
@section('content')

<main class="other_page">
                <div class="container">
                    <h1><span>{!! __("Documents.title") !!}</span> {!! __("company.title") !!}</h1>
                </div>
            </main>

<div class="breadcrumbs container  m-auto">
    {{Breadcrumbs::render() }}
</div>


            <div class="container other_page docs">
                 <p class="title"> {!! __("The “Know your Customer” policy.title") !!}</p>
                 <p class="text">
                    {!! __("The “Know your Customer” policy-text.title") !!}
                 </p>
                 <div class="items">

                    @foreach($docs as $doc)
                    <div class="item">
                        <img src="/img/pdf_icon.svg" alt="">
                        <p class="title">{!! __("$doc->name") !!}</p>
                        <a href="{{$doc->link}}" download class="more">{!! __("download.title") !!}</a>
                    </div>
                    @endforeach

                 </div>
            </div>

@endsection
