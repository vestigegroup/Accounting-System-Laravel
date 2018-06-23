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
    .dropdown-menu .fa {
        color: black !important;
    }
    .input-group-addon  {
        /*background-color: #0db72d !important;*/
    }
    .input-group-addon .fa {
        /*background-color: #0db72d !important;*/
        color: black !important;
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
                   <form class="" method="POST" enctype="multipart/form-data" id="form-prixodi" action="{{ route('income.store') }}">
                        {{ csrf_field() }}
                        <div class="tab-content" style="padding: 10px;border: 1px solid #ddd">
                            <div id="home" class="tab-pane fade in active">
                                <br>
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                       <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Имя Клиента:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Имя Клиента" aria-describedby="basic-addon1" name="customer_name" required>
                                            <span class="input-group-addon photo-title" id="basic-addon1"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr style="padding: 0px; margin: 10px;">
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                       <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Називание Фирма:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Називание Фирма" aria-describedby="basic-addon1" name="company_name" required>
                                            <span class="input-group-addon photo-title" id="basic-addon1"><i class="fa fa-building fa-fw" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr style="padding: 0px; margin: 10px;">
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                       <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Тип Заказ:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <select class="form-control" name="type_of_zakaz">
                                                <option>Брендинг</option>
                                                <option>Полиграфия</option>
                                                <option>Шелькография</option>
                                                <option>Наружная реклама</option>
                                                <option>Веб-дизайн</option>
                                                <option>СММ</option>
                                            </select>
                                            <!-- <input type="text" class="form-control" placeholder="Тип Заказ" aria-describedby="basic-addon1" name="type_of_zakaz" required> -->
                                            <span class="input-group-addon photo-title" id="basic-addon1"><i class="fa fa-question fa-fw" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr style="padding: 0px; margin: 10px;">
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                       <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Заказ:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Флайер, Брошурка, Буклет, и тд...  " aria-describedby="basic-addon1" name="zakaz" required>
                                            <span class="input-group-addon photo-title" id="basic-addon1"><i class="fa fa-exclamation fa-fw" aria-hidden="true"></i></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr style="padding: 0px; margin: 10px;">
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                       <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Количество:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Количество " aria-describedby="basic-addon1" name="kolvo" required>
                                            <span class="input-group-addon photo-title" id="basic-addon1"><i class="fa fa-list-ol fa-fw" aria-hidden="true"></i></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr style="padding: 0px; margin: 10px;">
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                       <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Cтоимост Заказ:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="number" class="form-control" placeholder="сомони" aria-describedby="basic-addon1" name="stoimost_zakaz" id="stoimost_zakaz" required>
                                            <span class="input-group-addon facebook" id="basic-addon1"><i class="fa fa-usd fa-fw"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr style="padding: 0px; margin: 10px;">
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                       <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Скидки:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input min="0" max="100" maxlength="3" type="text" class="form-control" placeholder="%" aria-describedby="basic-addon1" name="sena_zakaz" id="sena_zakaz" required>
                                            <span class="input-group-addon instagram" id="basic-addon1"><i class="fa fa-percent fa-fw"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr style="padding: 0px; margin: 10px;">
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                       <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Общие сума:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control " placeholder="сомони" aria-describedby="basic-addon1" name="obshiye_summa" id="obshiye_summa" readonly>
                                            <span class="input-group-addon instagram" id="basic-addon1"><i class="fa fa-bank fa-fw"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr style="padding: 0px; margin: 10px;">
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                       <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Оплочно:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group ">
                                            <input type="text" class="form-control" placeholder="сомони" aria-describedby="basic-addon1" name="oplachno" id="oplachno" required>
                                            <span class="input-group-addon otherlink" id="basic-addon1"><i class="fa fa-money fa-fw" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr style="padding: 0px; margin: 10px;">
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                       <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Остоток:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="сомони" aria-describedby="basic-addon1" name="ostotok" id="ostotok" readonly>
                                            <span class="input-group-addon otherlink" id="basic-addon1"><i class="fa fa-dollar fa-fw" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr style="padding: 0px; margin: 10px;">
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                       <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Заметки:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group ">
                                            <!-- <input type="text" class="form-control" placeholder="Заметки" aria-describedby="basic-addon1" name="zametka"> -->
                                            <textarea class="form-control" rows="3" placeholder="Заметки" aria-describedby="basic-addon1" name="zametka">
                                            
                                            </textarea>

                                            <span class="input-group-addon otherlink" id="basic-addon1"><i class="fa fa-comment-o fa-fw" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr style="padding: 0px; margin: 10px;">
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                       <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Срок:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group ">
                                            <input type="date" class="form-control" placeholder="" aria-describedby="basic-addon1" name="srok" required>
                                            <span class="input-group-addon otherlink" id="basic-addon1"><i style="color: red;" class="fa fa-calendar fa-fw" aria-hidden="true"></i></span>
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
    $('#stoimost_zakaz').keyup(function(){
        $("#obshiye_summa").val($('#stoimost_zakaz').val() - $('#stoimost_zakaz').val() * $('#sena_zakaz').val()/100);
        $("#ostotok").val($('#obshiye_summa').val() - $('#oplachno').val());
        $("#obshiye_summa").css('background-color', 'pink');
    });

    $('#sena_zakaz').keyup(function(){
        $("#obshiye_summa").val($('#stoimost_zakaz').val() - $('#stoimost_zakaz').val() * $('#sena_zakaz').val()/100);
        $("#ostotok").val($('#obshiye_summa').val() - $('#oplachno').val());
        $("#obshiye_summa").css('background-color', 'pink');
    });

    $('#oplachno').keyup(function(){
        $("#ostotok").val($('#obshiye_summa').val() - $('#oplachno').val());
        $("#ostotok").css('background-color', 'pink');
    });
</script>

@endsection
