@extends('admin.content')

@section('content')

<div id="kt_content_container" class="container-xxl">
<div class="row">

    <div class="col-lg-12">
        <form action="" method="post" enctype="multipart/form-data">
            <p>Название</p>
            <div class="d-flex gap-2">
                <input type="text" placeholder="Название" value="{{$data_center->name}}" class="form-control d-none mb-3" name="name">
                <input type="text" placeholder="Ключ для перевода (в формате группа.ключ)" value="{{\App\Models\DataCenters::getTranslateKey($data_center->key_title_translate)}}" class="form-control mb-3" name="key_title_translate">
            </div>
            <p>Флаг</p>
            <input type="file" placeholder="Флаг" class="form-control mb-3" name="img">
            <p>Картинка на странице Дата центры</p>
            <input type="file" placeholder="Картинка на странице Дата центры"  class="form-control mb-3" name="big_img">
            <p>Текст</p>
            <textarea placeholder="Текст" class="d-none form-control mb-3" name="text" style="height: 150px">{!! $data_center->text !!}</textarea>
            <input type="text" placeholder="Ключ для перевода (в формате группа.ключ)" value="{{\App\Models\DataCenters::getTranslateKey($data_center->key_text_translate)}}" class="form-control mb-3" name="key_text_translate">
            <p>Инфо текст</p>
            <textarea name="info" class="d-none  mb-3">{!! $data_center->info !!}</textarea>
            <input type="text" placeholder="Ключ для перевода (в формате группа.ключ)" value="{{\App\Models\DataCenters::getTranslateKey($data_center->key_info_translate)}}" class="form-control mb-3" name="key_info_translate">
            <p>Город</p>
            <input type="text" placeholder="Город" value="{{$data_center->city}}" class="form-control mb-3" name="city">
            <p>Транслит для адресной строки</p>
            <input type="text" placeholder="Транслит для адресной строки" value="{{$data_center->link}}" class="form-control mb-3" name="link">
            <p>Англ. название</p>
            <input type="text" placeholder="Англ. название" value="{{$data_center->en_name}}" class="form-control mb-3" name="en_name">
            <p>Позиция на карте Y (%)</p>
            <input type="text" placeholder="Позиция на карте X (%)" value="{{$data_center->p_top}}" class="form-control mb-3" name="p_top">
            <p>Позиция на карте X (%)</p>
            <input type="text" placeholder="Позиция на карте Y (%)" value="{{$data_center->p_left}}" class="form-control mb-3" name="p_left">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <button class="btn btn-primary mb-3" name="save">Сохранить</button>
        </form>
            <a href="?del" onclick="return confirm('Вы уверены?')" class="btn btn-danger">Удалить</a>
    </div>


         </div>
</div>
@endsection
