@extends('admin.content')

@section('content')

<div id="kt_content_container" class="container-xxl">
<div class="row">
    @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
    @endforeach
    <form action="{{route("seo.create.post")}}" method="post" enctype="multipart/form-data">
        @csrf


        <input type="text" class="form-control mb-3" name="page_url" placeholder="Введите юрл для которого хотите добавить метатеги(пример: /base)">
        <input type="text" class="form-control mb-3" name="title" placeholder="Title">
        <input type="text" class="form-control mb-3" name="keywords" placeholder="keywords">
        <input type="text" class="form-control mb-3" name="description" placeholder="Description">

        <button name="add" class="btn btn-primary mt-3">Создать</button>
    </form>


         </div>
</div>
@endsection
