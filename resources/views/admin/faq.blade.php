@extends('admin.content')

@section('content')

<div id="kt_content_container" class="container-xxl">
<div class="row">

<div class="col-lg-6">
                    @foreach($cats as $cat)
                    <h2>{{ __("$cat->name")}}</h2>
                    @php
                    $faqs = DB::table('faqs')->where('category', '=', $cat->id)->get();
                    @endphp
                        @foreach($faqs as $faq)
                        <div class="mb-5 mt-5">
                            <form action="" method="GET">
                                <input type="text" name="title" hidden="" value="{{$faq->title}}" class="form-control mb-3">
                                <p>Заголовок</p>
                                <input type="text" class="form-control mb-3" name="key_title_translate"
                                       placeholder="Ключ для перевода (в формате группа.ключ)" value="{{ \App\Models\DataCenters::getTranslateKey($faq->key_title_translate)}}">
                                <textarea name="text" class="form-control d-none mb-3" style="height: 150px">{!! $faq->text !!}</textarea>
                                <p>Текст</p>
                                <input type="text" class="form-control mb-3" name="key_text_translate"
                                       placeholder="Ключ для перевода (в формате группа.ключ)" value="{{\App\Models\DataCenters::getTranslateKey($faq->key_text_translate)}}">
                                <input type="hidden" name="id" value="{{$faq->id}}">
                                <button class="btn btn-primary" name="save">Сохранить</button>
                                <a href="/admin/faq?id={{$faq->id}}&del" class="btn btn-danger">Удалить</a>
                            </form>
                        </div>
                        @endforeach
                    @endforeach
</div>

<div class="col-lg-6">
    <h1>Создать</h1>
    <div class="mb-5 mt-5">
        <form action="" method="GET">
            <select name="cat" id="" class="form-control mb-3">
                @foreach($cats as $cat)
                    <option value="{{$cat->id}}">{{ __("$cat->name")}}</option>
                @endforeach
            </select>
            <input type="text"  name="title" value="asdasd" hidden="" class="form-control mb-3">
            <p>Заголовок</p>
            <input type="text" class="form-control mb-3" name="key_title_translate"
                   placeholder="Ключ для перевода (в формате группа.ключ)" >
            <textarea name="text" class="form-control mb-3 d-none" style="height: 150px"> asdasd</textarea>
            <p>Текст</p>
            <input type="text" class="form-control mb-3" name="key_text_translate"
                   placeholder="Ключ для перевода (в формате группа.ключ)" >

            <button class="btn btn-primary" name="new">Создать</button>
        </form>
    </div>
</div>


         </div>
</div>
@endsection
