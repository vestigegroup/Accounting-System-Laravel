@extends('layouts.app')
@section('css')
<link href="{{ URL::asset('css/bootstrap-select.min.css') }}  " rel="stylesheet">

<style type="text/css">
    .navbar-default {
        /*background-color: #8f111a !important;*/
        background-color: #8f111a !important;
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
    .dropdown-menu .fa {
        color: black !important;
    }
    .input-group-addon  {
    }
    .input-group-addon .fa {
        color: black !important;
    }
    .btn-circle {
        border-radius: 60%;
    }

    .btn-add {        
        z-index: 99;
        background: #0C7CB4;
        color: #fff;
        border: 2px solid #fff;
        box-shadow: 0 0 0 0 rgb(87, 192, 244);
        border-radius: 50%;
        background-size:cover;
        background-repeat: no-repeat;
        cursor: pointer;
        -webkit-animation: pulsecustom 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
        -moz-animation: pulsecustom 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
        -ms-animation: pulsecustom 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
        animation: pulsecustom 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
    }

    @-webkit-keyframes pulsecustom {
        to {
            box-shadow: 0 0 0 45px rgba(232, 76, 61, 0);
        }
    }

    @-moz-keyframes pulsecustom {
        to {
            box-shadow: 0 0 0 45px rgba(232, 76, 61, 0);
        }
    }

    @-ms-keyframes pulsecustom {
        to {
            box-shadow: 0 0 0 45px rgba(232, 76, 61, 0);
        }
    }

    @keyframes pulsecustom {
        to {
            box-shadow: 0 0 0 45px rgba(232, 76, 61, 0);
        }
    }

    .btn-add:hover, .btn-add:focus, .btn-add:active {
        background: #28B8E1;
        border-color: #fff;
    }
    .btn-add i {

    }

    .btn-minus {
        z-index: 99;
        background: #8f111a;
        color: #fff;
        border: 2px solid #fff;
        box-shadow: 0 0 0 0 #8f111a;
        border-radius: 50%;
        background-size:cover;
        background-repeat: no-repeat;
        cursor: pointer;
    }

    @-webkit-keyframes pulsecustom {
        to {
            box-shadow: 0 0 0 45px rgba(232, 76, 61, 0);
        }
    }

    @-moz-keyframes pulsecustom {
        to {
            box-shadow: 0 0 0 45px rgba(232, 76, 61, 0);
        }
    }

    @-ms-keyframes pulsecustom {
        to {
            box-shadow: 0 0 0 45px rgba(232, 76, 61, 0);
        }
    }

    @keyframes pulsecustom {
        to {
            box-shadow: 0 0 0 45px rgba(232, 76, 61, 0);
        }
    }

    .btn-minus:hover, .btn-minus:focus, .btn-minus:active {
        background: #c21a26;
        border-color: #fff;
    }
    .btn-minus i {

    }
    .btn-danger {
        background: #8f111a;
        color: #fff;
        border: 2px solid #fff;
        box-shadow: 0 0 0 0 #8f111a;
        background-size:cover;
        background-repeat: no-repeat;
    }
    .table-striped {
        border-collapse: collapse !important;
        display: table;
        border-spacing: 0px !important;
        border-color: grey;
    }

    .form-control {
        display: block;
        width: 100% !important;
        height: 30px;
        padding: 6px 6px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    table {
        border:1px solid white !important;
    }

    .table>tbody>tr {
        border: 1px solid white!important;
    }
    .table>tbody>tr:nth-of-type(odd) input {
        background-color: #ddd !important;
        background-image: none;
        border:none;
        border-radius: 0px;
    }
    .table>tbody>tr:nth-of-type(even) input {
        background-color: #eee !important;
        background-image: none;
        border:none;
        border-radius: 0px;

    }
    .table>tbody>tr {
        border: 1px solid white!important;
    }
    input:-webkit-autofill, textarea:-webkit-autofill, select:-webkit-autofill {
        background-color: white !important;
        background-image: none !important;
        color: rgb(0, 0, 0) !important;
    }
</style>

@endsection
@section('content')
    @include('shared.navbartop')

    <div class="container-fluid rasxod-page" style="min-height: 853px;">
        <div class="">
            @include('shared.leftbarnav')
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10 rasxod-menu-spisokall">
                @include('shared.error')
                
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 well" style="margin: 0px;">
                   <form class="form-inline clearfix" method="POST" enctype="multipart/form-data" id="form-rasxodi" action="{{ route('outgo.store') }}">
                        {{ csrf_field() }}
                        <div class="col-lg-12 clearfix" style="margin: 0px;padding: 0px;">
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon" style="border:none; "><b>Исполнитель:</b> </div>
                                        <input type="text" class="form-control" id="exampleInputAmount" placeholder="Исполнителние" autocomplete="false" autofocus="false" name="ispolnitelni" required>
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon" style="border:none; "><b>Сумма:</b> </div>
                                        <input type="number" class="form-control" id="exampleInputAmount" placeholder="Сумма" name="summa" required>
                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon" style="border:none; "><b>Дата:</b> </div>
                                        <input type="date" class="form-control" id="exampleInputAmount" placeholder="Дата" value="<?php echo date('Y-m-d'); ?>" name="data">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <hr>
                        <br>
                        <div class="col-lg-12 clearfix">
                            <table class="table  table-condensed ">
                                <thead class="text-center">
                                    <th style="border-bottom: 2px solid #8f111a" > Наименование</th>
                                    <th style="border-bottom: 2px solid #8f111a" >Ед. изм</th>
                                    <th style="border-bottom: 2px solid #8f111a" >Кол-во</th>
                                    <th style="border-bottom: 2px solid #8f111a" >Цена</th>
                                    <th style="border-bottom: 2px solid #8f111a" >Общ. сумма</th>
                                    <th style="border-bottom: 2px solid #8f111a" >Тип</th>
                                    <th style="border-bottom: 2px solid #8f111a" ></th>
                                </thead>
                                <tbody class="table-hover">
                                    <tr id="row_1" class="">
                                        <td class="text-center">
                                            <input type="text" class="form-control" placeholder="Наименование" aria-describedby="basic-addon1" name="naimenovanie" required>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Ед. изм" aria-describedby="basic-addon1" name="ed_izm" >
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" placeholder="Кол-во" aria-describedby="basic-addon1" name="kol_vo" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" placeholder="Цена" aria-describedby="basic-addon1" name="sena" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" placeholder="Обш сумма" aria-describedby="basic-addon1" name="obwiya" required>
                                        </td>
                                        <td>
                                            <select  class="selectpicker" name="rasxod_type" data-size="auto" data-live-search="true">
                                                <option value="0|4|Ramz"><b>Рамз</b></option>
                                                <optgroup label="Income" data-divider="true">        
                                                    @foreach($incomes as $income)
                                                        <option value="{{ $income->id }}|1|{{ $income->company_name }}"> {{ $income->company_name }} -- {{ $income->customer_name}}</option>
                                                    @endforeach
                                                </optgroup>
                                                <optgroup label="Sotrudniki" data-divider="true">
                                                    @foreach($sotrudniki as $sotrudnik)
                                                        <option value="{{ $sotrudnik->id }}|2|{{ $sotrudnik->imja_sotrudnika }}" > {{ $sotrudnik->imja_sotrudnika }} </option>
                                                    @endforeach
                                                </optgroup>

                                                <optgroup label="Partner" data-divider="true">
                                                    @foreach($partners as $partner)
                                                        <option value="{{ $partner->id  }}|3|{{ $partner->nazivaniye_firma }}" > {{ $partner->nazivaniye_firma }} </option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </td>
                                        <td class="last">
                                            <button class="hide btn btn-success btn-circle  btn-sm btn-minus"> <i class="fa fa-minus"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    @include('shared.footer')

@endsection
@section('js')
<script src="{{ URL::asset('js/bootstrap-select.min.js') }}"></script>

<script type="text/javascript">

</script>

@endsection
