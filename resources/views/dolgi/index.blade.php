@extends('layouts.app')
@section('css')

<style type="text/css">
    .navbar-default {
        /*background-color: #8f111a !important;*/
        background-color: #0094c9 !important;
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
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10 rasxod-menu-spisokall" style="min-height: 853px;">
                @include('shared.error')
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " style="padding: 10px;">
                    <!-- Content You may write your code here -->
                    <div class="">
                        <table width="100%" class="table table-striped table-bordered table-hover clearfix" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th class="text-center"> Имя клиента </th>
                                    <th class="text-center"> Название фирмы </th>
                                    <th class="text-center"> Тип заказа </th>
                                    <th class="text-center"> Заказ </th>
                                    <th class="text-center"> Остаток: </th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($incomes as $income )
                                    <tr id="income_{{ $income->id }}">
                                        <td id="person_name" class="text-center">{{ $income->customer_name }}</td>
                                        <td class="text-center">{{ $income->company_name }}</td>
                                        <td class="text-center">{{ $income->type_of_zakaz }}</td>
                                        <td class="text-center">{{ $income->zakaz }}</td>
                                        <td class="text-center">{{ $income->ostotok }} <button class="btn btn-danger btn-xs pull-right dolgi" value="{{ $income->id }}"><i class="fa fa-usd" style="color: white !important;"></i></button></td>   
                                    </tr>

                                    @if($income->dolgiData)
                                        @foreach($income->dolgiData as $dolgadata)
                                            <tr>
                                                <td colspan="4" class="text-right">{{ $dolgadata->data_dolgi }}</td>
                                                <td>{{ $dolgadata->summa }}</td>
                                            </tr>
                                        @endforeach
                                    @endif

                               @endforeach
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
                           <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Дата :</label>
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
                <button type='button' class='btn btn-default' data-dismiss='modal'>Закрит</button>
                <button type='submit' class='btn btn-danger' form="dolgi_store" >Оплатит</button>
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
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });

    $('.dolgi').click(function(){
        $('#platitdolgi').modal('show');

        var id = $(this).val();
        
        $('.custommer_id').attr('value', id);
        $('.customer_name').attr('value', $('#income_'+id).find('#person_name').text());

    });
</script>

@endsection
