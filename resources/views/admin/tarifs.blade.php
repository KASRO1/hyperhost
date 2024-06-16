@extends('admin.content')

@section('content')

<div id="kt_content_container" class="container-xxl">
<div class="row">


<h3>Тарифы {{$data_center->name}} <a href="/admin/center/{{$data_center->id}}/tarifs/new" class="btn btn-primary" style="margin-left: 15px">Добавить новый</a></h3>
<table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <!--begin::Table head--> 
                                    <thead>
                                        <tr>
                                            <td>Название</td>
                                            <td>Категория</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="fw-bold text-gray-600">

                                     @foreach($tarifs as $item)
                                     @php
                                        $cat = DB::table('items_categories')->find($item->category);
                                     @endphp
                                        <tr>
                                            <td>
                                                {{ __("$item->name")}}
                                            </td>
                                            <td>{{$cat->name}}</td>
                                            <td>
                                                <a href="/admin/tarif/{{$item->id}}" class="btn btn-primary" style="margin-left: 15px">Настройки</a> 
                                            </td>
                                        </tr>
                                     @endforeach

                                    </tbody>
                                    <!--end::Table body-->
                                </table>
              
         </div>
</div>
@endsection