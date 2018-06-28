<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
     <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
    <!-- Optional theme -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->

    <!-- Font Owesome -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/excel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/excel1.css') }}" rel="stylesheet">
    <style type="text/css">
        .alert-karz {
            color: #d9534f;
            /*background-color: #d9534f  !important;*/
            /*border-color: #d43f3a;*/
        }
        @media print{
            @page { size: landscape }
        }
    </style>
</head>
<body>
<div class="container-fluid well">
    <div class="container">
        <div class="col-md-8 col-md-push-2">
            <form class="form-inline" action=""  method="get" id="multiple">
                <div class="form-group has-error">
                    <label for="exampleInputName2" style="color: #a94442;margin-right: 10px;"> От:</label>
                    <input type="date" class="form-control" placeholder="Дата" value="null" name="from_data">
                </div>
                <div class="form-group has-error">
                    <label for="exampleInputName2" style="color: #a94442;margin-right: 10px;margin-left: 10px;"> До:</label>
                    <input type="date" class="form-control" placeholder="Дата" value="<?php echo date("Y-m-d");?>" name="to_data">
                </div>
                <div class="form-group has-error">
                   <button class="btn btn-info"><i class="fa fa-search"></i></button>
                </div>   
            </form>
        </div>
    </div>
</div>
    <div class="container">
        <div class="table-responsive">
            <div class="text-header text-center"> <h2 class="text-muted"> </h2></div>
                <table class="table table-bordered col-sm-12" style="margin-top:10px;" id="absentexample">
                    <colgroup>
                    </colgroup>
                    <thead>
                        <tr class="">
                            <th class="text-center"><i class="fa fa-users"></i> Имя Клиента </th>
                            <th class="text-center"><i class="fa fa-bank"></i> Називание Фирма </th>
                            <th class="text-center"><i class="fa fa-question"></i> Тип Заказ </th>
                            <th class="text-center"><i class="fa fa-exclamation"></i> Заказ </th>
                            <th class="text-center"><i class="fa fa-list-ol"></i> Количество </th>
                            <th class="text-center"><i class="fa fa-usd"></i> Cтоимост Заказ </th>
                            <th class="text-center"><i class="fa fa-percent"></i> Скидки </th>
                            <th class="text-center"><i class="fa fa-bank"></i> Общие сума </th>
                            <th class="text-center"><i class="fa fa-usd"></i>  Оплочно </th>
                            <th class="text-center"><i class="fa fa-usd"></i>  Остоток </th>
                            <th class="text-center"><i class="fa fa-calendar"></i>  Срок </th>
                        </tr>
                    </thead>                    
                    <tbody>
                        @foreach($incomes as $income)
                            <tr class="@if($income->ostotok>0){{'alert-karz'}} @endif">
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
                                <td class="text-center">{{ $income->srok }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

<!-- Scripts -->
<script  src="{{  asset('js/jqueryold.js')}}"></script>
<script  src="{{  asset('js/excel.js')}}"></script>
<script  src="{{  asset('js/excel1.js')}}"></script>
<script  src="{{  asset('js/excel2.js')}}"></script>
<script  src="{{  asset('js/excel3.js')}}"></script>
<script  src="{{  asset('js/excel4.js')}}"></script>
<script  src="{{  asset('js/excel5.js')}}"></script>
<script  src="{{  asset('js/excel6.js')}}"></script>
<script  src="{{  asset('js/excel7.js')}}"></script>
<script  src="{{  asset('js/excel8.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('#absentexample').DataTable( {
        dom: 'Bfrtip',
        "pageLength": 30,
        "autoWidth": false,

        buttons: [
            'excel', 'pdf', 'print'
        ]
    } );
} );
</script>