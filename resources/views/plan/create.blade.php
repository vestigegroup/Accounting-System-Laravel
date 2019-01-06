@extends('layouts.app')
@section('css')
    <style type="text/css">
        .navbar-default {
            background-color: #b35138 !important;
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
        .dropdown-menu .fa {
            color: black !important;
        }
        .input-group-addon  {
        }
        .input-group-addon .fa {
            color: #b35138 !important;
        }
    </style>

@endsection
@section('content')
    @include('shared.navbartop')

    <div class="container-fluid rasxod-page">
        <div class="">
            @include('shared.leftbarnav')
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10 rasxod-menu-spisokall">
                @include('shared.error')

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 table-responsive" style="margin: 0px;">
                    <!-- Content You may write your code here -->
                    <form class="" method="POST" enctype="multipart/form-data" id="plansave" action="{{ route('plan.store') }}">
                        {{ csrf_field() }}
                        <div class="tab-content" style="padding: 10px;border: 1px solid #ddd">
                            <div id="home" class="tab-pane fade in active">
                                <br>
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                        <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Налог:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="number" class="form-control" placeholder="Налог" aria-describedby="basic-addon1" name="nalog" required>
                                            <span class="input-group-addon photo-title" id="basic-addon1"><i class="fa fa-building fa-fw" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr style="padding: 0px; margin: 10px;">
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                        <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Аренда:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="number" class="form-control" placeholder="Аренда" aria-describedby="basic-addon1" name="arenda" required>
                                            <span class="input-group-addon photo-title" id="basic-addon1"><i class="fa fa-list-alt fa-fw" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr style="padding: 0px; margin: 10px;">
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                        <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Зарплаты:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="number" class="form-control" placeholder="Зарплаты" aria-describedby="basic-addon1" name="zarplata" required>
                                            <span class="input-group-addon photo-title" id="basic-addon1"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                                <hr style="padding: 0px; margin: 10px;">
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                        <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Комунальные:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="number" class="form-control" placeholder="Комунальные" aria-describedby="basic-addon1" name="komunalni" required>
                                            <span class="input-group-addon photo-title" id="basic-addon1"><i class="fa fa-usd fa-fw" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr style="padding: 0px; margin: 10px;">
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                        <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Питание:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="number" class="form-control" placeholder="Питание" aria-describedby="basic-addon1" name="pitanie" required>
                                            <span class="input-group-addon photo-title" id="basic-addon1"><i class="fa fa-phone fa-fw" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr style="padding: 0px; margin: 10px;">
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                        <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Офисные расходы:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="number" class="form-control" placeholder="Офисные расходы" aria-describedby="basic-addon1" name="offisni_rasxod" required>
                                            <span class="input-group-addon photo-title" id="basic-addon1"><i class="fa fa-envelope fa-fw" aria-hidden="true"></i></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr style="padding: 0px; margin: 10px;">
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                        <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Другие:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="number" class="form-control" placeholder="Другие" aria-describedby="basic-addon1" name="drugie" required>
                                            <span class="input-group-addon photo-title" id="basic-addon1"><i class="fa fa-firefox fa-fw" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr style="padding: 0px; margin: 10px;">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @include('shared.footer')

@endsection
@section('js')
    <script type="text/javascript">

    </script>

@endsection
