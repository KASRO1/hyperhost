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
        <input type="file" class="form-control mb-3" name="icon_path" >
        <input type="text" class="form-control mb-3" name="id" placeholder="ID языка (например en)" value="{{$lang['id']}}">
        <input type="text" class="form-control mb-3" name="name" placeholder="Название языка" value="{{$lang['name']}}">
        <div class="d-flex gap-2">
        <input type="checkbox" value="1" {{$lang['active']}} class="mb-3 form-check" id="active_el" name="active" placeholder="Активен">
            <label for="active_el">Активен</label>
        </div>
        <div class="d-flex gap-2">
            <input type="checkbox" {{$lang['default']}} value="1" class="mb-3 form-check" id="default_el" name="default" placeholder="По-умолчанию">
            <label for="default_el">По-умолчанию</label>
        </div>

        <button name="add" class="btn btn-primary mt-3">Сохранить</button>
    </form>


         </div>
</div>
@endsection
