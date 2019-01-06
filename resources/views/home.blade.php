@extends('layouts.app')
@section('css')
 <style type="text/css">
    .navbar-default {
        background-color: #0059a5 !important;
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
    #chartdiv {
        width: 100%;
        min-height: 392px;
    }
    #barchart_material, #donutchart {
        width: 100%;
        min-height: 400px;
    }
    .widget.states-mdl {
        /*margin: 0 0% 0% 1%;*/
        width: 100%;
    }
    .charts-grids.widget {
        width: 100%;
    }
    .widget {
    }
    .widget {
        /*padding: 0;*/
    }
    .charts-grids {
        background-color: transparent;
    }
    .widget {
        /*width: 32%;*/
        /*border: 1px solid #F5F1F1;*/
        /*padding: 0px;*/
        /*-webkit-box-shadow: 0px 0px 5px -2px rgba(0,0,0,0.75);*/
        /*-moz-box-shadow: 0px 0px 5px -2px rgba(0,0,0,0.75);*/
        /*box-shadow: 0px 0px 5px -2px rgba(0,0,0,0.75);*/
    }
</style>
    <link href="{{ asset('css/morris.css') }}" rel="stylesheet">
    <!-- <script src="{{ asset('js/modernizr.custom.js') }}"></script> -->
    <script src="{{ asset('js/raphael-min.js') }}"></script>
    <script src="{{ asset('js/morris.js') }}"></script>
    <script src="{{ asset('js/graph.js') }}"></script>
    <script src="{{ asset('js/proton.js') }}"></script>


@endsection
@section('content')
    @include('shared.navbartop')

    @include('sweetalert::alert')

    <div class="container-fluid rasxod-page">
        <div class="">
            @include('shared.leftbarnav')
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10 rasxod-menu-spisokall widget" style="margin: 0px;padding: 0px;">
                @include('shared.error')

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin: 0px;padding: 0px;">
                    <div class="col-md-8">
                        <div class="col-md-12 charts-grids widget states-mdl">
                        <!-- Chart code -->
                            <script src="js/amcharts.js"></script>
                            <script src="js/serial.js"></script>
                            <script>
                                var chart;

                                var chartData = [
                                    {
                                        "year":  "{{ now()->format('Y-m-d') }}",
                                        "income": {{ $income }},
                                        "outgo": {{ $outgo }},
                                        "pribl": {{ $income - $outgo}},
                                        "plans": {{ $plan }},
                                        "dolgi": {{ $dolgi }}
                                    }
                                ];


                                AmCharts.ready(function () {
                                    // SERIAL CHART
                                    chart = new AmCharts.AmSerialChart();
                                    chart.dataProvider = chartData;
                                    chart.categoryField = "year";
                                    chart.startDuration = 1;
                                    chart.plotAreaBorderColor = "#DADADA";
                                    chart.plotAreaBorderAlpha = 1;
                                    // this single line makes the chart a bar chart
                                    chart.rotate = true;

                                    // AXES
                                    // Category
                                    var categoryAxis = chart.categoryAxis;
                                    categoryAxis.gridPosition = "start";
                                    categoryAxis.gridAlpha = 0.1;
                                    categoryAxis.axisAlpha = 0;
                                    categoryAxis.fillColor = "#DADADA";

                                    // value
                                    var valueAxis = new AmCharts.ValueAxis();
                                    valueAxis.axisColor = "#DADADA";
                                    valueAxis.title = "";
                                    valueAxis.gridAlpha = 0.1;
                                    chart.addValueAxis(valueAxis);

                                    // GRAPH
                                    var graph1 = new AmCharts.AmGraph();
                                    graph1.title = "Приход";
                                    graph1.valueField = "income";
                                    graph1.type = "column";
                                    graph1.balloonText = "Приход: [[value]]";
                                    graph1.lineAlpha = 0;
                                    graph1.fillColors = ["#03b98e"];
                                    graph1.fillAlphas = 1;
                                    chart.addGraph(graph1);

                                    var graph2 = new AmCharts.AmGraph();
                                    graph2.title = "Расход";
                                    graph2.valueField = "outgo";
                                    graph2.type = "column";
                                    graph2.balloonText = "Расход: [[value]]";
                                    graph2.lineAlpha = 0;
                                    graph2.fillColors = ["#8f111a"];
                                    graph2.fillAlphas = 1;
                                    chart.addGraph(graph2);


                                    var graph3 = new AmCharts.AmGraph();
                                    graph3.title = "Прибыль";
                                    graph3.valueField = "pribl";
                                    graph3.type = "column";
                                    graph3.balloonText = "Прибыль: [[value]]";
                                    graph3.lineAlpha = 0;
                                    graph3.fillColors = ["#ff456f"];
                                    graph3.fillAlphas = 1;
                                    chart.addGraph(graph3);

                                    var graph4 = new AmCharts.AmGraph();
                                    graph4.title = "План";
                                    graph4.valueField = "plans";
                                    graph4.type = "column";
                                    graph4.balloonText = "План: [[value]]";
                                    graph4.lineAlpha = 0;
                                    graph4.fillColors = ["#fe3400"];
                                    graph4.fillAlphas = 1;
                                    chart.addGraph(graph4);

                                    var graph5 = new AmCharts.AmGraph();
                                    graph5.title = "Долги";
                                    graph5.valueField = "dolgi";
                                    graph5.type = "column";
                                    graph5.balloonText = "Долги: [[value]]";
                                    graph5.lineAlpha = 0;
                                    graph5.fillColors = ["#0094c9"];
                                    graph5.fillAlphas = 1;
                                    chart.addGraph(graph5);


                                    // LEGEND
                                    var legend = new AmCharts.AmLegend();
                                    chart.addLegend(legend);

                                    // WRITE
                                    chart.write("barchart_material");
                                });
                            </script>

                            <div id="barchart_material"></div>
                            <div class="clearfix"> </div>

                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="col-md-12 charts-grids widget states-mdl">
                            <script src="js/pie.js" type="text/javascript"></script>
                            <script>
                                var chartdonut;

                                var chartDatadonut = [
                                    {
                                        "moneytype": "Приход",
                                        "moneys": {{ $income }}
                                    }, {
                                        "moneytype": "Расход",
                                        "moneys": {{ $outgo }}
                                    }, {
                                        "moneytype": "План",
                                        "moneys": {{ $plan }}
                                    },
                                    {
                                        "moneytype": "Прибыль",
                                        "moneys": {{ $income - $outgo }}
                                    },
                                    {
                                        "moneytype": "Долги",
                                        "moneys": {{ $dolgi }}
                                    }
                                ];

                                AmCharts.ready(function() {
                                    // PIE CHART
                                    chartdonuts = new AmCharts.AmPieChart();

                                    chartdonuts.dataProvider = chartDatadonut;
                                    chartdonuts.titleField = "moneytype";
                                    chartdonuts.valueField = "moneys";
                                    chartdonuts.sequencedAnimation = true;
                                    chartdonuts.startEffect = "elastic";
                                    chartdonuts.innerRadius = "30%";
                                    chartdonuts.startDuration = 2;
                                    chartdonuts.labelRadius = 15;
                                    chartdonuts.colors = ["#03b98e", "#8f111a", "#fe3400", "#ff456f", "#0094c9"];
                                    chartdonuts.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>";
                                    // the following two lines makes the chart 3D
                                    chartdonuts.depth3D = 10;
                                    chartdonuts.angle = 15;

                                    // WRITE
                                    chartdonuts.write("donutchart");
                                });
                            </script>

                            <div id="donutchart"></div>
                            <div class="clearfix"> </div>
                        </div>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="col-md-12 charts-grids widget states-mdl">
                        <div class="card-header">
                        <hr>
                            <h3 class="text-center"></h3>
                        </div>
                        <div id="chartdiv"></div>
                    </div>
                    <!-- for amcharts js -->
                    <script src="js/export.min.js"></script>
                    <link rel="stylesheet" href="css/export.css" type="text/css" media="all" />
                    <script src="js/light.js"></script>
                    <!-- for amcharts js -->
                    <script type="text/javascript" src="js/index1.js"></script>
                </div>
                <hr>
                <br>
                <hr>
                <div class="clearfix"></div>
            </div>
        <hr>
        </div>
    </div>


    @include('shared.footer')

@endsection
@section('js')



@endsection
