@extends('layouts.app')
@section('css')
<style type="text/css">
    .navbar-default {
        /*background-color: #8f111a !important;*/
        background-color: #0db72d !important;
    }
    .navbar-brand {
        color: white !important;
    }
    .fa {
        color: white !important;
    }
    .caret {
        color: white !important;
    }
    .dropdown-menu .fa, table .fa {
        color: black !important;
    }

</style>
@endsection
@section('content')
    @include('shared.navbartop')

    <div class="container-fluid rasxod-page">
        <div class="">
            @include('shared.leftbarnav')
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10 rasxod-menu-spisokall">
                @include('shared.error')
                
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 table-responsive" style="margin: 0px;">
                    <!-- Content You may write your code here -->
                    <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover clearfix" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th><i class="fa fa-users"></i> Имя Клиента </th>
                                    <th><i class="fa fa-bank"></i> Називание Фирма </th>
                                    <th><i class="fa fa-question"></i> Тип Заказ </th>
                                    <th><i class="fa fa-exclamation"></i> Заказ </th>
                                    <th><i class="fa fa-list-ol"></i> Количество </th>
                                    <th><i class="fa fa-usd"></i> Cтоимост Заказ </th>
                                    <th><i class="fa fa-percent"></i> Скидки </th>
                                    <th><i class="fa fa-bank"></i> Общие сума </th>
                                    <th><i class="fa fa-usd"></i>  Оплочно </th>
                                    <th><i class="fa fa-usd"></i>  Остоток </th>
                                    <th><i class="fa fa-comment-o"></i>  Заметки </th>
                                    <th><i class="fa fa-calendar"></i>  Срок </th>
                                    <th><i class="fa fa-edit"></i> Edit  &nbsp;&nbsp;<i class="fa fa-trash"></i> Delete </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($incomes as $income)
                                    <tr class="odd gradeX" id="doctors_{{$income->id}}">
                                        <td class="text-center">{{ $income->customer_name }}</td>
                                        <td class="text-center">{{ $income->company_name }}</td>
                                        <td class="text-center">{{ $income->type_of_zakaz }}</td>
                                        <td class="text-center">{{ $income->zakaz }}</td>
                                        <td class="text-center">{{ $income->kolvo }}</td>
                                        <td class="text-center">{{ $income->stoimost_zakaz }}</td>
                                        <td class="text-center">{{ $income->sena_zakaz }}</td>
                                        <td class="text-center">{{ $income->obshiye_summa }}</td>
                                        <td class="text-center">{{ $income->oplachno }}</td>


                                        <td class="text-center">{{ $income->ostotok }}  </td>
                                        
                                        <td class="text-center">{{ $income->zametka }}</td>
                                        <td class="text-center">{{ $income->srok }}</td>
                                        <td>
                                            <a class="btn btn-warning" href="{{ route('income.edit', ['id'=> $income->id ]) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <button class="btn btn-danger delete-task" value="{{{$income->id}}}" data-toggle="modal" data-target="#{{{$income->id}}}"><i class="fa fa-trash-o" aria-hidden="true" ></i></button>
                                            
                                            @if($income->ostotok>0)
                                                <i class="fa fa-circle customer-alert"></i>
                                            @endif
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('shared.footer')

@endsection
@section('js')


@endsection
