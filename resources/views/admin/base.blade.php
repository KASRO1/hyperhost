@extends('admin.content')

@section('content')

<div id="kt_content_container" class="container-xxl">
<div class="row">


<div class="col-lg-6">
    <h3>{!! __("base.title") !!} <a href="/admin/base/new" class="btn btn-primary" style="margin-left: 15px">Создать</a></h3>

    <table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <!--begin::Table body-->
                                    <tbody class="fw-bold text-gray-600">

                                     @foreach($base as $item)
                                        <tr>
                                            <td>
                                                {{$item->title}}
                                            </td>
                                            <td>
                                                <a href="/admin/base/{{$item->id}}" class="btn btn-primary" style="margin-left: 15px">Настройки</a>
                                            </td>
                                        </tr>
                                     @endforeach

                                    </tbody>
                                    <!--end::Table body-->
                                </table>

                                {{$base->links()}}
</div>

<div class="col-lg-6">
    <h3>Категории</h3>
    <table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <!--begin::Table body-->
                                    <tbody class="fw-bold text-gray-600">

                                        <form action="">
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" name="name" placeholder="Ключ для перевода (в формате группа.ключ)">
                                            </td>
                                            <td>
                                                <button class="btn btn-primary" name="add_cat">Создать</button>
                                            </td>
                                        </tr>
                                        </form>

                                     @foreach($cats as $item)
                                        <tr>
                                            <td>
                                                {{ __("$item->name")}}
                                            </td>
                                            <td>
                                                <a href="/admin/base?delcat={{$item->id}}" class="btn btn-danger" onclick="return confirm('Вы уверены? Будут удалены все статьи из этой категории')" style="">Удалить</a>
                                            </td>
                                        </tr>
                                     @endforeach

                                    </tbody>
                                    <!--end::Table body-->
                                </table>

</div>

         </div>
</div>
@endsection
