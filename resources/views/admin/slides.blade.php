@extends('admin.content')

@section('content')

<div id="kt_content_container" class="container-xxl">
<div class="row">

<div class="col-lg-6">
    @foreach($slides as $slide)

    <div class="card mb-5 p-5">
        <form action="" method="post" enctype="multipart/form-data">
            <p>Заголовок</p>
            <textarea class="form-control mb-3 d-none" hidden="" name="title">{!! $slide->title !!}</textarea>
            <input type="text" class="form-control mb-3" name="key_title_translate"
                   placeholder="Ключ для перевода (в формате группа.ключ)" value="{{\App\Models\DataCenters::getTranslateKey($slide['key_title_translate'])}}">
            <p>Текст</p>
            <textarea class="form-control mb-3 d-none" hidden="" name="text" style="height: 150px">{!! $slide->text !!}</textarea>
            <input type="text" class="form-control mb-3" name="key_text_translate"
                   placeholder="Ключ для перевода (в формате группа.ключ)" value="{{\App\Models\DataCenters::getTranslateKey($slide['key_text_translate'])}}">
            <p>Картинка</p>
            <input type="file" class="form-control mb-3" name="img" value="{{$slide->img}}">
            <p>Текст кнопки</p>
            <input type="text" class="form-control mb-3" name="btn_text" value="{{$slide->btn_text}}">
            <p>Ссылка на кнопке</p>
            <input type="text" class="form-control mb-3" name="btn_link" value="{{$slide->btn_link}}">
            <input type="hidden" name="id" value="{{$slide->id}}">
            <button class="btn btn-primary" name="save">Сохранить</button>
            <a href="/admin/slides/{{$slide->id}}/delete" class="btn btn-danger">Удалить</a>
        </form>
    </div>

    @endforeach
</div>

<div class="col-lg-6">
    <div class="card mb-5 p-5">
        <form action="" method="post" enctype="multipart/form-data">
            <p>Заголовок</p>
            <textarea class="form-control mb-3 d-none"  name="title">asdasd</textarea>
            <input type="text" class="form-control mb-3" name="key_title_translate"
                   placeholder="Ключ для перевода (в формате группа.ключ)">
            <p>Текст</p>
            <textarea class="form-control mb-3 d-none" name="text" style="height: 150px">adsasd</textarea>
            <input type="text" class="form-control mb-3" name="key_text_translate"
                   placeholder="Ключ для перевода (в формате группа.ключ)">
            <p>Картинка</p>
            <input type="file" class="form-control mb-3" name="img" value="">
            <p>Текст кнопки</p>
            <input type="text" class="form-control mb-3" name="btn_text" value="">
            <p>Ссылка на кнопке</p>
            <input type="text" class="form-control mb-3" name="btn_link" value="">
            <button class="btn btn-primary" name="new">Создать</button>
        </form>
    </div>
</div>


         </div>
</div>
@endsection
