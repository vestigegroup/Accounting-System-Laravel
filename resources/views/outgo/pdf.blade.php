<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/excel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/excel1.css') }}" rel="stylesheet">
    <style type="text/css">
        .alert-karz {
            color: #d9534f;
        }
        @media print{
            @page { size: landscape }
            #top-form, #absentexample_filter, .dt-buttons {
                display: none;
            }
        }
    </style>
</head>
<body>
<div class="container-fluid well" id="top-form">
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
                        <tr>
                            <th class="text-center"> Исполнитель </th>
                            <th class="text-center"> Наименование </th>
                            <th class="text-center"> Ед. изм </th>
                            <th class="text-center"> Кол-во </th>
                            <th class="text-center"> Цена </th>
                            <th class="text-center"> Общ. сумма  </th>
                            <th class="text-center"> Тип </th>
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