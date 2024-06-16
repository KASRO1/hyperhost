@extends('admin.content')

@section('content')

<div id="kt_content_container" class="container-xxl">
<div class="row">

    <div class="col-lg-12">
        <form action="" method="post" enctype="multipart/form-data">
            <p>Название</p>
            <div class="d-flex gap-2">
                <input type="text" placeholder="Название" value="asdasd"  class="form-control d-none mb-3" name="name">
                <input type="text" placeholder="Ключ для перевода (в формате группа.ключ)"  class="form-control mb-3" name="key_title_translate">
            </div>
            <p>Флаг</p>
            <input type="file" placeholder="Флаг" value="" class="form-control mb-3" name="img">
            <p>Картинка на странице Дата центры</p>
            <input type="file" placeholder="Картинка на странице Дата центры" value="" class="form-control mb-3" name="big_img">
            <p>Текст</p>
            <textarea placeholder="Текст" class="form-control d-none mb-3" hidden="" name="text" style="height: 150px">asdasd</textarea>
            <input type="text" placeholder="Ключ для перевода (в формате группа.ключ)" class="form-control mb-3" name="key_text_translate">
            <p>Инфо текст</p>
            <textarea name="info" class="d-none" hidden="">asdasd</textarea>
            <input type="text" placeholder="Ключ для перевода (в формате группа.ключ)" class="form-control mb-3" name="key_info_translate">
            <p>Город</p>
            <input type="text" placeholder="Город" value="" class="form-control mb-3" name="city">
            <p>Транслит для адресной строки</p>
            <input type="text" placeholder="Транслит для адресной строки" value="" class="form-control mb-3" name="link">
            <p>Англ. название</p>
            <input type="text" placeholder="Англ. название" value="" class="form-control mb-3" name="en_name">
            <p>Позиция на карте Y (%)</p>
            <input type="text" placeholder="Позиция на карте Y (%)" value="" class="form-control mb-3" name="p_top">
            <p>Позиция на карте X (%)</p>
            <input type="text" placeholder="Позиция на карте X (%)" value="" class="form-control mb-3" name="p_left">

            <button class="btn btn-primary mb-3" name="save">Сохранить</button>
        </form>
    </div>


         </div>
</div>
@endsection
