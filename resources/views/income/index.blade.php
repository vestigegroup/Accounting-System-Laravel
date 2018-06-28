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
<!-- DataTables CSS -->
<link href="{{ URL::asset('css/dataTables.bootstrap.css') }}  " rel="stylesheet">
<!-- DataTables Responsive CSS -->
<link href="{{ URL::asset('css/dataTables.responsive.css') }}  " rel="stylesheet">
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
                                    <th class="text-center"><i class="fa fa-users"></i> Имя Клиента </th>
                                    <th class="text-center"><i class="fa fa-bank"></i> Називание Фирма </th>
                                    <th class="text-center"><i class="fa fa-question"></i> Тип Заказ </th>
                                    <th class="text-center"><i class="fa fa-exclamation"></i> Заказ </th>
                                    <th class="text-center"><i class="fa fa-list-ol"></i> Количество </th>
                                    <!-- <th class="text-center"><i class="fa fa-usd"></i> Cтоимост Заказ </th> -->
                                    <!-- <th class="text-center"><i class="fa fa-percent"></i> Скидки </th> -->
                                    <!-- <th class="text-center"><i class="fa fa-bank"></i> Общие сума </th> -->
                                    <!-- <th class="text-center"><i class="fa fa-usd"></i>  Оплочно </th> -->
                                    <!-- <th class="text-center"><i class="fa fa-usd"></i>  Остоток </th> -->
                                    <!-- <th class="text-center"><i class="fa fa-calendar"></i>  Срок </th> -->
                                    <th><i class="fa fa-edit"></i>  <i class="fa fa-trash"></i>  </th>
                                </tr>
                            </thead>
                            <tbody class="clearfix">
                                @foreach($incomes as $income)
                                    <tr class="odd gradeX" id="income_{{$income->id}}">
                                        <td class="text-center">{{ $income->customer_name }}</td>
                                        <td class="text-center">{{ $income->company_name }}</td>
                                        <td class="text-center">{{ $income->type_of_zakaz }}</td>
                                        <td class="text-center">{{ $income->zakaz }}</td>
                                        <td class="text-center">{{ $income->kolvo }}</td>
                                        <!-- <td class="text-center">{{ $income->stoimost_zakaz }}</td> -->
                                        <!-- <td class="text-center">{{ $income->sena_zakaz }}</td> -->
                                        <!-- <td class="text-center">{{ $income->obshiye_summa }}</td> -->
                                        <!-- <td class="text-center">{{ $income->oplachno }}</td> -->
                                        <!-- <td class="text-center">{{ $income->ostotok }}  </td> -->
                                        <!-- <td class="text-center">{{ $income->srok }}</td> -->
                                        <td>
                                            <a class="btn btn-warning btn-sm" href="{{ route('income.edit', ['id'=> $income->id ]) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <button class="btn btn-danger btn-sm deleteincome" value="{{ $income->id }}"><i class="fa fa-trash"></i> </button>
                                            
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

 <!-- Modal for Delete Zarplata -->
<div class="modal fade" id="deleteincome" tabindex="-1" role="dialog">
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
    $('.deleteincome').click(function(){
            $('#deleteincome').modal('show');

            $('.deletebtn').val($(this).val());  
            
            var task_id = $('.deletebtn').val();

            $('.deletebtn').click(function(){
                $.ajax({
                    type: "get",
                    url:"/income/deleteAjax/" + task_id,
                    success: function (data) {
                        $('#deleteincome').modal('hide');
                        $("#income_" + data[1]).fadeOut(800, function () {
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
