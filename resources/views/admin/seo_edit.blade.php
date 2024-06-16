@extends('admin.content')

@section('content')

<div id="kt_content_container" class="container-xxl">
<div class="row">
    @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
    @endforeach
    <form action="{{route("seo.update.post:id", $seo['id']) }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" class="form-control mb-3" value="{{$seo['page_url']}}" name="page_url" placeholder="Введите юрл для которого хотите добавить метатеги(пример: /base)">
        <input type="text" class="form-control mb-3" value="{{$seo['title']}}" name="title" placeholder="Title">
        <input type="text" class="form-control mb-3" value="{{$seo['keywords']}}" name="keywords" placeholder="keywords">
        <input type="text" class="form-control mb-3" value="{{$seo['description']}}" name="description" placeholder="Description">

        <button name="add" class="btn btn-primary mt-3">Создать</button>
    </form>


         </div>
</div>
@endsection
