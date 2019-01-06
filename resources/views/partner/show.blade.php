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
    .dropdown-menu .fa, table .fa {
        color: black !important;
    }

    .product-men {
        margin: top;
        margin-top: 0.3em;
    }
    .men-pro-item {
        position: relative;
        box-shadow: 0px 0px 15px 0px #D6D6D6;
        padding-bottom: 20px;
    }

    .men-thumb-item {
        position: relative;
    }

    .men-thumb-item .pro-image-front {
        opacity: 1;
        visibility: visible;
    }

    .men-thumb-item img {
        transition: all 0.5s ease-out 0s;
        padding: 52px 50px 20px;
    }
    .men-thumb-item img {
        transition: all 0.5s ease-out 0s;
    }
    .men-thumb-item img {
        transition: all 0.5s ease-out 0s;
    }
    .product-men img {
        width: 100%;
        height: 250px;
    }

    .men-cart-pro {
        bottom: 0;
        left: 0;
        margin: auto;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        right: 0;
        text-align: center;
        top: 0;
        transition: all 0.5s ease-out 0s;
        visibility: hidden;
        z-index: 10;
    }
    .inner-men-cart-pro {
        height: 100%;
        position: relative;
        width: 100%;
        transition: all 0.5s ease-out 0s;
    }
    .inner-men-cart-pro .link-product-add-cart {
        width: 100%;
        top: 0;
        left: 0;
        position: absolute;
        transition: all 0.5s ease-out 0s;
    }
    .inner-men-cart-pro .link-product-add-cart {
        width: 100%;
        bottom: -40px;
        left: 0;
        position: absolute;
        transition: all 0.5s ease-out 0s;
    }
    .link-product-add-cart {
        background: #000 none repeat scroll 0 0;
        color: #fff;
        display: inline-block;
        height: 40px;
        line-height: 40px;
        text-transform: uppercase;
        transition: all 0.5s ease-out 0s;
    }
    .product-new-top {
        color: #fff;
        display: inline-block;
        right: 0;
        padding: 0 10px 1px;
        position: absolute;
        top: 0;
        z-index: 99;
    }
    .item-info-product {
        text-align: center;
        margin: 20px 0 0;
    }
    .info-product-price {
        margin: 10px 0;
    }

    .pro-image-front {
        opacity: 1;
        visibility: visible;
    }

</style>


@endsection
@section('content')
    @include('shared.navbartop')
    @include('sweetalert::alert')

    <div class="container-fluid rasxod-page">
        <div class="">
            @include('shared.leftbarnav')
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10 rasxod-menu-spisokall  ">
                @include('shared.error')
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " style="padding: 0px;margin: 0px;">
                    <!-- Content You may write your code here -->
                    <div class="well">
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="{{url('')}}/{{ $partner->photo_path }}" width="200px" height="200px">
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="col-md-12 list-group-item">
                                    <div class="col-md-6 text-right">
                                        Называние фирма:
                                    </div>
                                    <div class="col-md-6">
                                        {{ $partner->nazivaniye_firma }}
                                        <i class="fa fa-user fa-fw pull-right" style="color: #6d2890 !important;"></i>
                                    </div>
                                </div>
                                <div class="col-md-12 list-group-item">
                                    <div class="col-md-6 text-right">
                                        Тип занияти:
                                    </div>
                                    <div class="col-md-6">
                                        {{ $partner->tip_zanyata }}
                                        <i class="fa fa-list-alt fa-fw pull-right" style="color: #6d2890 !important;"></i>
                                    </div>
                                </div>
                                <div class="col-md-12 list-group-item">
                                    <div class="col-md-6 text-right">
                                        Маркетолог / Менеджер:
                                    </div>
                                    <div class="col-md-6">
                                        {{ $partner->marketolog }}
                                        <i class="fa fa-user-o fa-fw pull-right" style="color: #6d2890 !important;"></i>
                                    </div>
                                </div>
                                <div class="col-md-12 list-group-item">
                                    <div class="col-md-6 text-right">
                                        Тип скидки:
                                    </div>
                                    <div class="col-md-6">
                                        {{ $partner->tip_skidka }}
                                        <i class="fa fa-usd fa-fw pull-right" style="color: #6d2890 !important;"></i>
                                    </div>
                                </div>
                                <div class="col-md-12 list-group-item">
                                    <div class="col-md-6 text-right">
                                        Телефон:
                                    </div>
                                    <div class="col-md-6">
                                        {{ $partner->telefon }}
                                        <i class="fa fa-phone fa-fw pull-right" style="color: #6d2890 !important;"></i>
                                    </div>
                                </div>
                                <div class="col-md-12 list-group-item">
                                    <div class="col-md-6 text-right">
                                        Почта:
                                    </div>
                                    <div class="col-md-6">
                                        {{ $partner->mail }}
                                        <i class="fa fa-envelope-o fa-fw pull-right" style="color: #6d2890 !important;"></i>
                                    </div>
                                </div>
                                <div class="col-md-12 list-group-item">
                                    <div class="col-md-6 text-right">
                                        Веб:
                                    </div>
                                    <div class="col-md-6">
                                        {{ $partner->website }}
                                        <i class="fa fa-firefox fa-fw pull-right" style="color: #6d2890 !important;"></i>
                                    </div>
                                </div>
                                <div class="col-md-12 list-group-item">
                                    <div class="col-md-6 text-right">
                                        Адрес:
                                    </div>
                                    <div class="col-md-6">
                                        {{ $partner->adress }}
                                        <i class="fa fa-map-marker fa-fw pull-right" style="color: #6d2890 !important;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Content -->
                </div>
            </div>
        </div>
    </div>

    @include('shared.footer')

@endsection
@section('js')

@endsection
