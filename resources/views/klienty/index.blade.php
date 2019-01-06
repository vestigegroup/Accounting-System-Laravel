@extends('layouts.app')
@section('css')

<style type="text/css">
    .navbar-default {
        /*background-color: #8f111a !important;*/
        background-color: #00917e !important;
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
        color: white !important;
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
                                    <th class="text-center"> Количество </th>
                                    <th class="text-center"> Дата </th>
                                </tr>
                            </thead>
                            <tbody class="clearfix">
                                @foreach($incomes as $income)
                                    <tr class="odd gradeX" id="klienty_{{$income->id}}">
                                        <td class="text-center">{{ $income->customer_name }}</td>
                                        <td class="text-center">{{ $income->company_name }}</td>
                                        <td class="text-center">{{ $income->type_of_zakaz }}</td>
                                        <td class="text-center">{{ $income->zakaz }}</td>
                                        <td class="text-center">{{ $income->kolvo }}</td>
                                        <td class="text-center">{{ $income->created_at }}</td>
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
@endsection
