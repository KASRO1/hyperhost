@extends('admin.content')

@section('content')

<div id="kt_content_container" class="container-xxl">
<div class="row">


<h3>{!! __("Data-centers.title") !!}<a href="/admin/center/new" class="btn btn-primary" style="margin-left: 15px">Добавить новый</a></h3>
<table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <!--begin::Table head-->
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="fw-bold text-gray-600">

                                     @foreach($data_centers as $item)
                                        <tr>
                                            <td>
                                                <img width="38" height="38" src="{{$item->img}}" alt="">
                                                {{ __("$item->name")}}
                                            </td>
                                            <td>
                                                <a href="/admin/center/{{$item->id}}" class="btn btn-primary" style="margin-left: 15px">Настройки</a>
                                                <a href="/admin/center/{{$item->id}}/tarifs" class="btn btn-primary" style="margin-left: 15px">Тарифы</a>
                                            </td>
                                        </tr>
                                     @endforeach

                                    </tbody>
                                    <!--end::Table body-->
                                </table>

         </div>
</div>
@endsection
