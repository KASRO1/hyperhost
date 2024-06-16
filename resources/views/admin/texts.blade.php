@extends('admin.content')

@section('content')

<div id="kt_content_container" class="container-xxl">
<div class="row">


<h3>Языки
    <a href="{{route('text.create')}}" class="btn btn-primary" style="margin-left: 15px">Добавить новый</a>
    <a href="{{route('languages')}}" class="btn btn-primary" style="margin-left: 15px">Языки</a>
</h3>
<table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <!--begin::Table head-->
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <thead>
                                        <tr>
                                            <th>Группа</th>
                                            <th>Ключ</th>
                                            <th>Текст</th>
                                            <th>Действие</th>
                                        </tr>
                                    </thead>

                                    <tbody class="fw-bold text-gray-600">

                                     @foreach($texts as $item)
                                        <tr>
                                            <td>
                                                {{$item->group}}
                                            </td>
                                            <td>
                                                {{$item->key}}
                                            </td>
                                            <td>
                                                {!! $item->text['ru'] !!}
                                            </td>
                                            <td>
                                                <a href="{{route("text.edit:id", [$item['id']])}}" class="btn btn-primary" style="margin-left: 15px">Изменить</a>
                                                <a href="{{route("text.delete:id", [$item['id']])}}" class="btn btn-danger" style="margin-left: 15px">Удалить</a>
                                            </td>
                                        </tr>
                                     @endforeach

                                    </tbody>
                                    <!--end::Table body-->
                                </table>

         </div>
</div>
@endsection
