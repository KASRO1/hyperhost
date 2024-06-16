@extends('admin.content')

@section('content')

<div id="kt_content_container" class="container-xxl">
<div class="row">


<h3>Языки
    <a href="{{route('language.create')}}" class="btn btn-primary" style="margin-left: 15px">Добавить новый</a>
    <a href="{{route('texts')}}" class="btn btn-primary" style="margin-left: 15px">Текста</a>
</h3>
<table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <!--begin::Table head-->
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="fw-bold text-gray-600">

                                     @foreach($languages as $item)
                                        <tr>
                                            <td>
                                                <img height="50" width="50" src="{{$item->icon_path}}" alt="">
                                                {{ __("$item->name")}}
                                            </td>
                                            <td>
                                                {{$item->status}}
                                            </td>
                                            <td>
                                                <a href="{{route("language.update:id", [$item['id']])}}" class="btn btn-primary" style="margin-left: 15px">Изменить</a>
                                                <a href="{{route("language.delete:id", [$item['id']])}}" class="btn btn-danger" style="margin-left: 15px">Удалить</a>
                                            </td>
                                        </tr>
                                     @endforeach

                                    </tbody>
                                    <!--end::Table body-->
                                </table>

         </div>
</div>
@endsection
