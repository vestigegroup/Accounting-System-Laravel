@extends('layouts.app')
@section('css')

    <link href="{{ asset('css/morris.css') }}" rel="stylesheet">

    <script src="{{ asset('js/raphael-min.js') }}"></script>
    <script src="{{ asset('js/morris.js') }}"></script>

@endsection
@section('content')
    @include('shared.navbartop')

    @include('sweetalert::alert')

    <div class="container-fluid rasxod-page">
        <div class="">
            @include('shared.leftbarnav')
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10 rasxod-menu-spisokall">
                @include('shared.error')

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 table-responsive" style="margin: 0px;">
                    <!-- Content You may write your code here -->
                    <div class="agile-last-grids">
                        <div class=" agile-last-left agile-last-middle">
                            <div class="agile-last-grid">
                                <div class="area-grids-heading">
                                    <h3 class="text-center">Rasxodi</h3>
                                </div>
                                <div id="rasxods"></div>
                                <script>
                                    $(document).ready(function() {
                                        $.ajax({
                                            type: "get",
                                            url:"/home/getrasxodi/",
                                            success: function (data) {
                                                console.log(data);
                                                Morris.Bar({
                                                    element: 'rasxods',
                                                    data: data[1],
                                                    xkey: 'created_at',
                                                    ykeys: ['obwiya'],
                                                    labels: ['Приход'],
                                                    xLabelAngle: 89,
                                                    gridTextColor: '#a70909',
                                                    gridTextSize: 15,
                                                    yLabelFormat: null,
                                                    xLabelAngle: 90,
                                                    numLines: 6,
                                                    padding: 50,
                                                    postUnits: ' com',
                                                    preUnits: '',
                                                    ymax: 'auto',
                                                    ymin: 'auto 0'
                                                });
                                            },
                                            error: function (data) {
                                                console.log(data);
                                            }
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>

                <hr>
                <hr>
                <hr>
                
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 table-responsive" style="margin: 0px;">
                    <!-- Content You may write your code here -->
                    <div class="agile-last-grids">
                        <div class=" agile-last-left agile-last-middle">
                            <div class="agile-last-grid">
                                <div class="area-grids-heading">
                                    <h3 class="text-center">Приход</h3>
                                </div>
                                <div id="prixods"></div>
                                <script>
                                    $(document).ready(function() {
                                        $.ajax({
                                            type: "get",
                                            url:"/home/getprixodi/",
                                            success: function (data) {
                                                console.log(data);
                                                Morris.Bar({
                                                    element: 'prixods',
                                                    data: data[1],
                                                    xkey: 'created_at',
                                                    ykeys: ['obshiye_summa'],
                                                    labels: ['Приход'],
                                                    xLabelAngle: 89,
                                                    gridTextColor: '#a70909',
                                                    gridTextSize: 15,
                                                    yLabelFormat: null,
                                                    xLabelAngle: 90,
                                                    numLines: 6,
                                                    padding: 50,
                                                    postUnits: ' com',
                                                    preUnits: '',
                                                    ymax: 'auto',
                                                    ymin: 'auto 0'
                                                });
                                            },
                                            error: function (data) {
                                                console.log(data);
                                            }
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('shared.footer')

@endsection
@section('js')

    <script src="{{ asset('js/raphael-min.js') }}"></script>
    <script src="{{ asset('js/morris.js') }}"></script>

@endsection
