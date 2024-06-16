@extends('content')
@section('title', 'Правила и условия использования услуг Hyper.Hosting')

@section('description', 'Важные правила и условия предоставления наших услуг хостинга и серверов.')
@section('content')

<main class="other_page">  
                <div class="container">
                    <h1><span>{!! __("Rules.title") !!}</span> {!! __("OUR SERVICE.title") !!}</h1>
                </div>
            </main>

<div class="breadcrumbs container  m-auto">
    {{Breadcrumbs::render() }}
</div>


            <div class="container other_page">
                {!! __("List of service.title") !!}
            </div>

@endsection