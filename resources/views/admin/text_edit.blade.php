@extends('admin.content')

@section('content')

<div id="kt_content_container" class="container-xxl">
<div class="row">
    @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
    @endforeach
    <form action="{{route("text.update.post:id", [$text['id']])}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" class="form-control mb-3" name="group" placeholder="Группа" value="{{$text['group']}}">
        <input type="text" class="form-control mb-3" name="key" placeholder="Ключ" value="{{$text['key']}}">
        @foreach($text['text'] as $key => $item)
            <label>Текст для языка - {{$key}}</label>
            <textarea rows="5" class="form-control mb-4" name="text[{{$key}}]">{{$item}}</textarea>
        @endforeach
        <button name="add" class="btn btn-primary mt-3">Создать</button>
    </form>


         </div>
</div>
@endsection
