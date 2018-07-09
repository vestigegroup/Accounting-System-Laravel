@extends('layouts.app')
@section('css')

    <style type="text/css">
        .navbar-default {
            background-color: #abd745 !important;
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
    <!-- DataTables CSS -->
    <link href="{{ URL::asset('css/dataTables.bootstrap.css') }}  " rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="{{ URL::asset('css/dataTables.responsive.css') }}  " rel="stylesheet">
@endsection
@section('content')
    @include('shared.navbartop')
    @include('sweetalert::alert')
    @extends('layouts.app')
@section('css')
    <!-- DataTables CSS -->
    <link href="{{ URL::asset('css/dataTables.bootstrap.css') }}  " rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="{{ URL::asset('css/dataTables.responsive.css') }}  " rel="stylesheet">
    <style type="text/css">
        .navbar-default {
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
        .dropdown-menu .fa, table .fa {
            color: black !important;
        }
    </style>
@endsection
@section('content')
    @include('shared.navbartop')
    @include('sweetalert::alert')

    <div class="container-fluid rasxod-page">
        <div class="">
            @include('shared.leftbarnav')
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10 rasxod-menu-spisokall  ">
                @include('shared.error')
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " style="padding: 10px;">
                    <!-- Content You may write your code here -->
                    <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover clearfix ramzdatatable" id="ramzdatatable">
                            <thead>
                            <tr>
                                <th class="text-center"><i class="fa fa-users"></i> Исполнителние </th>
                                <th class="text-center"><i class="fa fa-bank"></i> Наименование </th>
                                <th class="text-center"><i class="fa fa-question"></i> Ед. изм </th>
                                <th class="text-center"><i class="fa fa-exclamation"></i> Кол-во </th>
                                <th class="text-center"><i class="fa fa-dollar"></i> Цена </th>
                                <th class="text-center"><i class="fa fa-dollar"></i> Обш сумма  </th>
                                <th class="text-center"><i class="fa fa-question"></i> Тип Расход  </th>
                                <th><i class="fa fa-edit"></i>  <i class="fa fa-trash"></i>  </th>
                            </tr>
                            </thead>
                            <tbody class="clearfix">
                            @foreach($outgos as $outgo)
                                <tr class="odd gradeX" id="outgo_{{$outgo->id}}">
                                    <td class="text-center">{{ $outgo->ispolnitelni }}</td>
                                    <td class="text-center">{{ $outgo->naimenovanie }}</td>
                                    <td class="text-center">{{ $outgo->ed_izm }}</td>
                                    <td class="text-center">{{ $outgo->kol_vo }}</td>
                                    <td class="text-center">{{ $outgo->sena }}</td>
                                    <td class="text-center">{{ $outgo->obwiya }}</td>
                                    <td class="text-center">{{ $outgo->tip_rasxod }}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="{{ route('outgo.edit', ['id'=> $outgo->id ]) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <button class="btn btn-danger btn-sm deleteoutgo" value="{{ $outgo->id }}"><i class="fa fa-trash"></i> </button>

                                    <!-- @if($outgo->ostotok>0)
                                        <i class="fa fa-circle customer-alert"></i>
                                    @endif -->

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

    <!-- Modal for Delete Zarplata -->
    <div class="modal fade" id="deleteoutgo" tabindex="-1" role="dialog">
        <div class='modal-dialog'>
            <!-- Modal content-->
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    <h4 class='modal-title'>Delete</h4>
                </div>
                <div class='modal-body'>
                    <div class="">
                        <h4 class="text-center text-danger"> Zapis Budet Udalit!</h4>
                        <h4 class="text-center text-danger">We desvitelno xatite udalit eto zapisa?</h4>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-danger deletebtn' value=''>Delete</button>
                    <!-- <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button> -->
                </div>
            </div>
        </div>


    @include('shared.footer')

    @endsection
    @section('js')
        <!-- DataTables JavaScript -->
            <script src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script>
            <script src="{{ URL::asset('js/dataTables.bootstrap.min.js') }}"></script>
            <script src="{{ URL::asset('js/dataTables.responsive.js') }}"></script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#ramzdatatable').DataTable({
                        responsive: true
                    });
                });
            </script>
            <script type="text/javascript">
                $('.deleteoutgo').click(function(){
                    $('#deleteoutgo').modal('show');

                    $('.deletebtn').val($(this).val());

                    var task_id = $('.deletebtn').val();

                    $('.deletebtn').click(function(){
                        $.ajax({
                            type: "get",
                            url:"/outgo/deleteAjax/" + task_id,
                            success: function (data) {
                                $('#deleteoutgo').modal('hide');
                                $("#outgo_" + data[1]).fadeOut(800, function () {
                                    $(this).remove();
                                });
                            },
                            error: function (data) {
                            }
                        });
                    });
                });
            </script>

        @endsection

    <div class="container-fluid rasxod-page">
        <div class="">
            @include('shared.leftbarnav')
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10 rasxod-menu-spisokall  ">
                @include('shared.error')
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " style="padding: 10px;">
                    <!-- Content You may write your code here -->
                    <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover clearfix" id="dataTables-example">
                            <thead>
                            <tr>
                                <th class="text-center"><i class="fa fa-users"></i> Имя Клиента </th>
                                <th class="text-center"><i class="fa fa-bank"></i> Називание Фирма </th>
                                <th class="text-center"><i class="fa fa-question"></i> Тип Заказ </th>
                                <th class="text-center"><i class="fa fa-exclamation"></i> Заказ </th>
                                <th class="text-center"><i class="fa fa-usd"></i> Остоток: </th>
                            </tr>
                            </thead>
                            <tbody class="clearfix">
                            <!--  -->


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @include('shared.footer')


    <!-- Modal for Delete Zarplata -->
    <div class="modal fade" id="platitdolgi" tabindex="-1" role="dialog">
        <div class='modal-dialog'>
            <!-- Modal content-->
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    <h4 class='modal-title'>Долги</h4>
                </div>
                <div class='modal-body'>
                    <!-- <div class="">
                        <h4 class="text-center text-danger"> Zapis Budet Udalit!</h4>
                        <h4 class="text-center text-danger">We desvitelno xatite udalit eto zapisa?</h4>
                    </div> -->
                    <form class="" method="POST" enctype="multipart/form-data" id="dolgi_store" action="{{ route('dolgi.store') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" class="custommer_id">
                        <div class="col-sm-12">
                            <div class="col-sm-3 text-right">
                                <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Имя Клиента:</label>
                            </div>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control customer_name" placeholder="Имя Клиента" aria-describedby="basic-addon1" name="customer_name" required >
                                    <span class="input-group-addon photo-title" id="basic-addon1"><i class="fa fa-user fa-fw" aria-hidden="true" style="color: #0094c9 !important;"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr style="padding: 0px; margin: 10px;">
                        <div class="col-sm-12">
                            <div class="col-sm-3 text-right">
                                <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Cумма :</label>
                            </div>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="number" class="form-control" placeholder="Cумма" aria-describedby="basic-addon1" name="summa" required>
                                    <span class="input-group-addon photo-title" id="basic-addon1"><i class="fa fa-usd fa-fw" aria-hidden="true" style="color: #0094c9 !important;"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr style="padding: 0px; margin: 10px;">
                        <div class="col-sm-12">
                            <div class="col-sm-3 text-right">
                                <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Date :</label>
                            </div>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="date" class="form-control" aria-describedby="basic-addon1" name="data" required value="<?php echo date('Y-m-d'); ?>">
                                    <span class="input-group-addon photo-title" id="basic-addon1"><i class="fa fa-calendar fa-fw" aria-hidden="true" style="color: #0094c9 !important;"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr style="padding: 0px; margin: 10px;">

                    </form>

                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                    <button type='submit' class='btn btn-danger' form="dolgi_store" >Oplatit</button>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('js')
    <!-- DataTables JavaScript -->
    <script src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/dataTables.responsive.js') }}"></script>
    <script type="text/javascript">
        $('.dolgi').click(function(){
            $('#platitdolgi').modal('show');

            var id = $(this).val();

            $('.custommer_id').attr('value', id);
            $('.customer_name').attr('value', $('#income_'+id).find('#person_name').text());

        });
    </script>

@endsection
