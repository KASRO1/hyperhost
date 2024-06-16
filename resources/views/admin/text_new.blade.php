@extends('admin.content')

@section('content')

<div id="kt_content_container" class="container-xxl">
<div class="row">
    @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
    @endforeach
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" class="form-control mb-3" name="group" placeholder="Группа">
        <input type="text" class="form-control mb-3" name="key" placeholder="Ключ">

        @foreach($languages as $item)
            <label>Текст для языка - {{$item['name']}}</label>
            <textarea rows="5" class="form-control classic mb-4" name="text[{{$item['id']}}]"></textarea>
        @endforeach
        <button name="add" class="btn btn-primary mt-3">Создать</button>
    </form>


         </div>
</div>
@endsection
