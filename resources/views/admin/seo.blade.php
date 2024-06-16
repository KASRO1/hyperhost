@extends('admin.content')

@section('content')

<div id="kt_content_container" class="container-xxl">
<div class="row">


<h3>Языки
    <a href="{{route('seo.create')}}" class="btn btn-primary" style="margin-left: 15px">Добавить новое правило для seo</a>
</h3>
<table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <!--begin::Table head-->
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="fw-bold text-gray-600">

                                     @foreach($seo as $item)
                                        <tr>
                                            <td>
                                                {{$item->page_url}}
                                            </td>
                                            <td>
                                                {{$item->title}}
                                            </td>
                                            <td>
                                                {{$item->keywords}}
                                            </td>
                                            <td>
                                                {{$item->description}}
                                            </td>
                                            <td>
                                                <a href="{{route("seo.update:id", [$item['id']])}}" class="btn btn-primary" style="margin-left: 15px">Изменить</a>
                                                <a href="{{route("seo.delete:id", [$item['id']])}}" class="btn btn-danger" style="margin-left: 15px">Удалить</a>
                                            </td>
                                        </tr>
                                     @endforeach

                                    </tbody>
                                    <!--end::Table body-->
                                </table>

         </div>
</div>
@endsection
