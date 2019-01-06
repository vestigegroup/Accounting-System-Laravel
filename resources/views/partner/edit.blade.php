@extends('layouts.app')
@section('css')
<style type="text/css">
    .navbar-default {
        background-color: #6d2890 !important;
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
        color: #6d2890 !important;
    }
</style>

@endsection
@section('content')
    @include('shared.navbartop')

    <div class="container-fluid rasxod-page">
        <div class="">
            @include('shared.leftbarnav')
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10 rasxod-menu-spisokall" style="min-height: 853px;">
                @include('shared.error')

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 table-responsive" style="margin: 0px;">
                    <!-- Content You may write your code here -->
                   <form class="" method="POST" enctype="multipart/form-data" id="partnersaveedited"  action="{{ route('partner.update', [ 'id' => $partner->id ]) }}">
                        {{ csrf_field() }}
                        <div class="tab-content" style="padding: 10px;border: 1px solid #ddd">
                            <div id="home" class="tab-pane fade in active">
                                <br>
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                       <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Называние фирма:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Называние фирма" aria-describedby="basic-addon1" name="nazivaniye_firma" required value="{{ $partner->nazivaniye_firma }}">
                                            <span class="input-group-addon photo-title" id="basic-addon1"><i class="fa fa-building fa-fw" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr style="padding: 0px; margin: 10px;">
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                       <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Тип занияти:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Тип занияти" aria-describedby="basic-addon1" name="tip_zanyata" required value="{{ $partner->tip_zanyata }}">
                                            <span class="input-group-addon photo-title" id="basic-addon1"><i class="fa fa-list-alt fa-fw" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr style="padding: 0px; margin: 10px;">
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                       <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Маркетолог / Менеджер:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Маркетолог / Менеджер" aria-describedby="basic-addon1" name="marketolog" required value="{{ $partner->marketolog }}">
                                            <span class="input-group-addon photo-title" id="basic-addon1"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="clearfix"></div>
                                <hr style="padding: 0px; margin: 10px;">
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                       <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Тип скидки:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Classic / VIP" aria-describedby="basic-addon1" name="tip_skidka" required value="{{ $partner->tip_skidka }}">
                                            <span class="input-group-addon photo-title" id="basic-addon1"><i class="fa fa-usd fa-fw" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr style="padding: 0px; margin: 10px;">
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                       <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Телефон:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="tel" class="form-control" placeholder="(+992) ___ - __ - __ - __" aria-describedby="basic-addon1" name="telefon" required value="{{ $partner->telefon }}">
                                            <span class="input-group-addon photo-title" id="basic-addon1"><i class="fa fa-phone fa-fw" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr style="padding: 0px; margin: 10px;">
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                       <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Почта:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="email" class="form-control" placeholder="Почта " aria-describedby="basic-addon1" name="mail" required value="{{ $partner->mail }}">
                                            <span class="input-group-addon photo-title" id="basic-addon1"><i class="fa fa-envelope fa-fw" aria-hidden="true"></i></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr style="padding: 0px; margin: 10px;">
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                       <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Веб:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Веб" aria-describedby="basic-addon1" name="website" required value="{{ $partner->website }}">
                                            <span class="input-group-addon photo-title" id="basic-addon1"><i class="fa fa-firefox fa-fw" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr style="padding: 0px; margin: 10px;">
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                       <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Адрес:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Адрес" aria-describedby="basic-addon1" name="adress" required value="{{ $partner->adress }}">
                                            <span class="input-group-addon photo-title" id="basic-addon1"><i class="fa fa-map-marker fa-fw" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr style="padding: 0px; margin: 10px;">
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                       <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Логотип:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="file" class="form-control" placeholder="Количество " aria-describedby="basic-addon1" name="photo_path">
                                            <span class="input-group-addon photo-title" id="basic-addon1"><i class="fa fa-photo fa-fw" aria-hidden="true"></i></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr style="padding: 0px; margin: 10px;">
                                <div class="col-sm-12">
                                    <div class="col-sm-3 text-right">
                                       <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Заметка:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <textarea class="form-control" name="zametka">
                                                {{ $partner->zametka }}
                                            </textarea>
                                            <span class="input-group-addon photo-title" id="basic-addon1"><i class="fa fa-commenting-o fa-fw" aria-hidden="true"></i></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr style="padding: 0px; margin: 10px;">

                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                    <input name="_method" type="hidden" value="PUT">
                                </div>
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
