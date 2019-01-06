@extends('layouts.app')
@section('css')
<!-- DataTables CSS -->
<link href="{{ URL::asset('css/dataTables.bootstrap.css') }}  " rel="stylesheet">
<!-- DataTables Responsive CSS -->
<link href="{{ URL::asset('css/dataTables.responsive.css') }}  " rel="stylesheet">
<style type="text/css">
    .navbar-default {
        /*background-color: #8f111a !important;*/
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
    .btn .fa {
        color: white!important;
    }
    .fa-fw {
        width: 0.9em;
    }
</style>
@endsection
@section('content')
    @include('shared.navbartop')
    @include('sweetalert::alert')
    
    <div class="container-fluid rasxod-page" style="min-height: 854px;">
        <div class="">
            @include('shared.leftbarnav')
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10 rasxod-menu-spisokall  ">
                @include('shared.error')
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " style="padding: 10px;">
                    <!-- Content You may write your code here -->
                    <div class="">
                        <table width="100%" class="table table-striped table-bordered table-hover clearfix" id="dataTables-example">
                            <colgroup>
                                <!-- <col width="11%"></col>
                                <col width="11%"></col>
                                <col width="11%"></col>
                                <col width="8%"></col>
                                <col width="8%"></col>
                                <col width="8%"></col>
                                <col width="8%"></col>
                                <col width="8%"></col>
                                <col width="5%"></col> -->
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="text-center"> Исполнитель </th>
                                    <th class="text-center"> Наименование </th>
                                    <th class="text-center"> Наз. фирмы </th>
                                    <th class="text-center"> Ед. изм </th>
                                    <th class="text-center"> Кол-во </th>
                                    <th class="text-center"> Цена </th>
                                    <th class="text-center">Обш сумма  </th>
                                    <th class="text-center">Затраты</th>
                                    <th class="text-center"> Дата </th>
                                    <th><i class="fa fa-edit"></i>  <i class="fa fa-trash"></i>  </th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($outgos as $outgo)
                                    <tr class="odd gradeX" id="outgo_{{$outgo->id}}">
                                        <td class="text-center">{{ $outgo->ispolnitelni }}</td>
                                        <td class="text-center">{{ $outgo->naimenovanie }}</td>
                                        <td class="text-center">{{ $outgo->tip_name }}</td>
                                        <td class="text-center">{{ $outgo->ed_izm }}</td>
                                        <td class="text-center">{{ $outgo->kol_vo }}</td>
                                        <td class="text-center">{{ $outgo->sena }}</td>
                                        <td class="text-center">{{ $outgo->summa }}</td>
                                        <td class="text-center">{{ $outgo->obwiya }}</td>
                                        <td class="text-center">{{ $outgo->created_at }}</td>
                                        <td>
                                            <a class="btn btn-warning btn-xs" href="{{ route('outgo.edit', ['id'=> $outgo->id ]) }}"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i></a>
                                            <button class="btn btn-danger btn-xs deleteoutgo" value="{{ $outgo->id }}"><i class="fa fa-trash fa-fw"></i> </button>
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
                <h4 class='modal-title'>Удалить</h4>
            </div>
            <div class='modal-body'>
                <div class="">
                    <h4 class="text-center text-danger"> Запис будет удалить.</h4>
                    <h4 class="text-center text-danger">Ви действо хотет удалить?</h4>
                </div>
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-danger deletebtn' value=''>Да</button>
                <button type='button' class='btn btn-default' data-dismiss='modal'>Нет</button>
            </div>
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
        $('#dataTables-example').DataTable({
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
