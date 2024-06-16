@extends('admin.content')

@section('content')

<div id="kt_content_container" class="container-xxl">
<div class="row">


<div class="col-lg-12">
    <div class="card mb-5 mt-5 p-5">
        <form action="" method="get">
            <p>Название</p>
            <input type="text" class="form-control mb-3" name="name" placeholder="Ключ для перевода (в формате группа.ключ)">
            <p>Ссылка</p>
            <input type="text" class="form-control mb-3" name="link" placeholder="Ссылка">
            <button class="btn btn-primary" name="new">Создать</button>
        </form>
        <!-- <a class="btn btn-danger">Удалить</a> -->
    </div>
</div>


@foreach($docs as $doc)
<div class="col-lg-4 mt-5 mb-5">
        <form action="" method="get">
            <input type="text" class="form-control mb-3" name="name" value="{{$doc->name}}" placeholder="Название">
            <input type="text" class="form-control mb-3" name="link" value="{{$doc->link}}" placeholder="Ссылка">
            <input type="hidden" name="id" value="{{$doc->id}}">
            <button class="btn btn-primary" name="save">Сохранить</button>
            <a href="?id={{$doc->id}}&del" class="btn btn-danger">Удалить</a>
        </form>
</div>
@endforeach


         </div>
</div>
@endsection
