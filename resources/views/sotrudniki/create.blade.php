@extends('layouts.app')
@section('css')
<style type="text/css">
    .navbar-default {
        background-color: #2851aa !important;
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
        color: #2851aa !important;
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
                   <form class="" method="POST" enctype="multipart/form-data" id="sotrudnikiform" action="{{ route('sotrudniki.store') }}">
                        {{ csrf_field() }}
                        <div class="tab-content" style="padding: 10px;border: 1px solid #ddd">
                            <div id="home" class="tab-pane fade in active">
                                <br>
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                       <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Имя Сотрудники:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Имя Сотрудники" aria-describedby="basic-addon1" name="imja_sotrudnika" required>
                                            <span class="input-group-addon photo-title" id="basic-addon1"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr style="padding: 0px; margin: 10px;">
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                       <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Дата Рождения:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="date" class="form-control" placeholder="Називание Фирма" aria-describedby="basic-addon1" name="data_rojdeniya" required>
                                            <span class="input-group-addon photo-title" id="basic-addon1"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr style="padding: 0px; margin: 10px;">
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                       <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Место Рождения:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Место Рождения" aria-describedby="basic-addon1" name="mesto_rojdeniya" required>
                                            <span class="input-group-addon photo-title" id="basic-addon1"><i class="fa fa-building fa-fw" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr style="padding: 0px; margin: 10px;">
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                       <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Теллефон:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="tel" class="form-control" placeholder="tel" aria-describedby="basic-addon1" name="telefon" required>
                                            <span class="input-group-addon photo-title" id="basic-addon1"><i class="fa fa-phone fa-fw" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr style="padding: 0px; margin: 10px;">
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                       <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Зарплата:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="number" class="form-control" placeholder="Зарплата" aria-describedby="basic-addon1" name="zarplata" required>
                                            <span class="input-group-addon photo-title" id="basic-addon1"><i class="fa fa-usd fa-fw" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr style="padding: 0px; margin: 10px;">
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                       <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Должност:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <textarea class="form-control" rows="3" placeholder="Заметки" aria-describedby="basic-addon1" name="doljnost">
                                            
                                            </textarea>
                                            <span class="input-group-addon photo-title" id="basic-addon1"><i class="fa fa-building fa-fw" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr style="padding: 0px; margin: 10px;">
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                       <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Фото:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="file" class="form-control" placeholder="Количество " aria-describedby="basic-addon1" name="photo_path" required>
                                            <span class="input-group-addon photo-title" id="basic-addon1"><i class="fa fa-list-ol fa-fw" aria-hidden="true"></i></i></span>
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
