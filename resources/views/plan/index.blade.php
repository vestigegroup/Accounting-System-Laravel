@extends('layouts.app')
@section('css')

    <style type="text/css">
        .navbar-default {
            /*background-color: #8f111a !important;*/
            background-color: #fe3400 !important;
        }
        .navbar-brand {
            color: white !important;
        }
        .fa, .btn .fa {
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
                                <th class="text-center"> Налог </th>
                                <th class="text-center"> Аренда </th>
                                <th class="text-center"> Зарплата </th>
                                <th class="text-center"> Комунальные</th>
                                <th class="text-center"> Питание </th>
                                <th class="text-center"> Офисные расходы </th>
                                <th class="text-center"> Другие </th>
                                <th class="text-center"><i class="fa fa-trash"></i>  </th>
                            </tr>
                            </thead>
                            <tbody class="clearfix">
                                @foreach($plans as $plan)
                                    <tr class="text-center" id="plan_{{$plan->id}}">
                                        <td>
                                            {{ $plan->nalog }}
                                        </td>
                                        <td>
                                            {{ $plan->arenda  }}
                                        </td>
                                        <td>
                                            {{ $plan->zarplata  }}
                                        </td>
                                        <td>
                                            {{ $plan->komunalni  }}
                                        </td>
                                        <td>
                                            {{ $plan->pitanie }}
                                        </td>
                                        <td>
                                            {{ $plan->offisni_rasxod }}
                                        </td>
                                        <td>
                                            {{ $plan->month }}
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-xs deleteplan" value="{{ $plan->id }}"><i class="fa fa-trash"></i> </button>
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
    <div class="modal fade" id="deleteplan" tabindex="-1" role="dialog">
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
        $('.deleteplan').click(function(){
            $('#deleteplan').modal('show');

            $('.deletebtn').val($(this).val());

            var task_id = $('.deletebtn').val();

            $('.deletebtn').click(function(){
                $.ajax({
                    type: "get",
                    url:"/plan/deleteAjax/" + task_id,
                    success: function (data) {
                        $('#deleteplan').modal('hide');
                        $("#plan_" + data[1]).fadeOut(800, function () {
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
