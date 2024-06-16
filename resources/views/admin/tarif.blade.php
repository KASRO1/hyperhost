@extends('admin.content')

@section('content')

<!-- <div id="kt_content_container" class="container-xxl">
<div class="row">

    <div class="col-lg-12">
        <form action="">
            <input type="text" placeholder="Название" class="form-control mb-3">
            <input type="text" placeholder="Процессор" class="form-control mb-3">
            <input type="text" placeholder="Оперативная память" class="form-control mb-3">
            <input type="text" placeholder="Диск" class="form-control mb-3">
            <input type="text" placeholder="Порт" class="form-control mb-3">
            <input type="text" placeholder="IP адрес" class="form-control mb-3">
            <input type="text" placeholder="Виртуализация" class="form-control mb-3">
            <input type="text" placeholder="Трафик" class="form-control mb-3">
            <input type="text" placeholder="Операционные системы" class="form-control mb-3">
            <input type="text" placeholder="Панели управления" class="form-control mb-3">
            <input type="text" placeholder="Стоимость" class="form-control mb-3">
            <input type="text" placeholder="Ссылка на кнопку" class="form-control mb-3">
            <button class="btn btn-primary mb-3">Сохранить</button> 
        </form>
            <a href="?del" onclick="return confirm('Вы уверены?')" class="btn btn-danger">Удалить</a>
    </div>

              
         </div>
</div> -->

<div id="kt_content_container" class="container-xxl">
<div class="row">

    <div class="col-lg-12">
        <form action="" method="get">
            <p>Категория</p>
            <select class="form-control mb-3" name="cat">
                @foreach($cats as $cat)
                    <option value="{{$cat->id}}" @if($tarif->category == $cat->id) selected @endif>{{$cat->name}}</option>
                @endforeach
            </select>
            <p>Название</p>
            <input type="text" placeholder="Название" class="form-control mb-3" value="{{$tarif->name}}" name="name">
            <p>Процессор</p>
            <input type="text" placeholder="Процессор" class="form-control mb-3" value="{{$tarif->proc}}" name="proc">
            <p>Оперативная память</p>
            <input type="text" placeholder="Оперативная память" class="form-control mb-3" value="{{$tarif->opera}}" name="opera">
            <p>Диск</p>
            <input type="text" placeholder="Диск" class="form-control mb-3" value="{{$tarif->disk}}" name="disk">
            <p>{!! __("Port.title") !!}</p>
            <input type="text" placeholder="Порт" class="form-control mb-3" value="{{$tarif->port}}" name="port">
            <p>IP адрес</p>
            <input type="text" placeholder="IP адрес" class="form-control mb-3" value="{{$tarif->ip}}" name="ip">
            <p>Виртуализация</p>
            <input type="text" placeholder="Виртуализация" class="form-control mb-3" value="{{$tarif->virt}}" name="virt">
            <p>Трафик</p>
            <input type="text" placeholder="Трафик" class="form-control mb-3" value="{{$tarif->traf}}" name="traf">
            <p>Операционные системы</p>
            <input type="text" placeholder="Операционные системы" class="form-control mb-3" value="{{$tarif->os}}" name="os">
            <p>Панели управления</p>
            <input type="text" placeholder="Панели управления" class="form-control mb-3" value="{{$tarif->panel}}" name="panel">
            <p>Стоимость</p>
            <input type="text" placeholder="Стоимость" class="form-control mb-3" value="{{$tarif->price}}" name="price">
            <p>Ссылка на кнопку</p>
            <input type="text" placeholder="Ссылка на кнопку" class="form-control mb-3" value="{{$tarif->link}}" name="link">
            <button class="btn btn-primary mb-3" name="save">Сохранить</button> 
        </form>
            <a href="?del" onclick="return confirm('Вы уверены?')" class="btn btn-danger">Удалить</a>
    </div>

              
         </div>
</div>
@endsection