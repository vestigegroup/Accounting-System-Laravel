@extends('layouts.app')
@section('css')
<!-- DataTables CSS -->
<link href="{{ URL::asset('css/dataTables.bootstrap.css') }}  " rel="stylesheet">
<!-- DataTables Responsive CSS -->
<link href="{{ URL::asset('css/dataTables.responsive.css') }}  " rel="stylesheet">
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
                        <table width="100%" class="table table-striped table-bordered table-hover clearfix" id="dataTables-example">
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
