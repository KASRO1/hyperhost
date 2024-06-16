@extends('admin.content')

@section('content')

    <div id="kt_content_container" class="container-xxl">
        <div class="row">

            <form action="" method="post" enctype="multipart/form-data">
                <input type="file" class="form-control mb-3" name="img" placeholder="Картинка">
                <div class="d-flex gap-2">
                    <input type="text" class="form-control mb-3 d-none" value="asdad" name="title" placeholder="Заголовок">
                    <input type="text" class="form-control mb-3" name="key_title_translate"
                           placeholder="Ключ для перевода (в формате группа.ключ)">
                </div>
                <input type="text" class="form-control mb-3" name="link" placeholder="Ссылка">
                <input type="text" class="form-control mb-3" name="title_tag" placeholder="Title">
                <input type="text" class="form-control mb-3" name="descr" placeholder="Description">
                <input type="text" class="form-control mb-3" name="keys" placeholder="Keywords">
                <select name="cat" class="form-control mb-3">
                    @foreach($cats as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>
                <textarea name="text"  class="d-none" ">asdasd</textarea>
                <input type="text" class="form-control mb-3" name="key_text_translate"
                       placeholder="Ключ для перевода (в формате группа.ключ)">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <button name="add" class="btn btn-primary mt-3">Создать</button>
            </form>


        </div>
    </div>
@endsection
