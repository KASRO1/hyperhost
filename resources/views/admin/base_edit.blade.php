@extends('admin.content')

@section('content')

<div id="kt_content_container" class="container-xxl">
<div class="row">

    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" class="form-control mb-3" name="img" value="{{$base->img}}" placeholder="Картинка">
        <div class="d-flex gap-2">
        <input type="text" class="form-control mb-3 d-none" name="title" value="{{$base->title}}" placeholder="Заголовок">
            <input type="text" class="form-control mb-3" name="key_title_translate"
                   placeholder="Ключ для перевода (в формате группа.ключ)" value="{{ \App\Models\DataCenters::getTranslateKey($base->key_title_translate)}}">
        </div>
        <input type="text" class="form-control mb-3" name="link" value="{{$base->link}}" placeholder="Ссылка">
        <input type="text" class="form-control mb-3" name="title_tag" value="{{$base->title_tag}}" placeholder="Title">
        <input type="text" class="form-control mb-3" name="descr" value="{{$base->description}}" placeholder="Description">
        <input type="text" class="form-control mb-3" name="keys" value="{{$base->keywords}}" placeholder="Keywords">
        <select name="cat" class="form-control mb-3">
            @foreach($cats as $cat)
                <option value="{{$cat->id}}" @if($cat->id == $base->category) selected @endif>{{ __("$cat->name")}}</option>
            @endforeach
        </select>
        <textarea name="text" class="d-none" id="classic">{!! $base->text !!}</textarea>
        <input type="text" class="form-control mb-3" name="key_text_translate"
               placeholder="Ключ для перевода (в формате группа.ключ)" value="{{\App\Models\DataCenters::getTranslateKey($base->key_text_translate)}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <button name="save" class="btn btn-primary mt-3">Сохранить</button> <br> <br>
        <a href="?del" onclick="return confirm('Вы уверены?')" class="btn btn-danger">Удалить</a>
    </form>


         </div>
</div>
@endsection
