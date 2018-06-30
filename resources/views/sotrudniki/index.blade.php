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
        /*background: #fc636b none repeat scroll 0 0;*/
        color: #fff;
        display: inline-block;
        right: 0;
        padding: 0 10px 1px;
        position: absolute;
        top: 0;
        z-index: 99;
    }
    /*.product-new-top .fa .fa-trash {
        background: #fff none repeat scroll 0 0;
        color: #fff;
        display: inline-block;
        right: 0;
        padding: 0 10px 1px;
        position: absolute;
        top: 0;
        z-index: 99;
    }*/
    .item-info-product {
        text-align: center;
        margin: 20px 0 0;
    }
    .info-product-price {
        margin: 10px 0;
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
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10 rasxod-menu-spisokall  ">
                @include('shared.error')
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " style="padding: 0px;margin: 0px;">
                    <!-- Content You may write your code here -->
                    @foreach($sotrudnikis as $sotrudniki)
                        <div class="col-md-3 product-men" id="sotrudniki_{{ $sotrudniki->id }}">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img src="{{ $sotrudniki->photo_path }}" alt="" class="pro-image-front">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="single.html" class="link-product-add-cart">{{ $sotrudniki->imja_sotrudnika }}</a>
                                        </div>
                                    </div>
                                    <div class="product-new-top">
                                        <a href="{{ route('sotrudniki.edit', ['id' => $sotrudniki->id ]) }}" style="background-color: orange!important;padding: 3px 5px 6px 5px;">
                                            <span class=""><i class="fa fa-pencil fa-fw"></i></span>
                                        </a>
                                        <button  style="background-color: #fc636b!important;padding: 1px 5px 4px 5px;border: none;" value="{{ $sotrudniki->id }}" class="deletesotrudniki">
                                            <span class=""><i class="fa fa-trash fa-fw"></i></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="item-info-product ">
                                    <h4><a href="single.html">{{ $sotrudniki->imja_sotrudnika }}</a></h4>
                                    <div class="info-product-price">
                                        <span class="item_price" > <i class="fa fa-usd" style="color: orange !important;"></i> 45.99</span>
                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                        <span class="item_price"> <i class="fa fa-arrow-down" style="color: red !important;"></i> 45.99</span>
                                        
                                    </div>                                  
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

 <!-- Modal for Delete Zarplata -->
<div class="modal fade" id="deletesotrudniki" tabindex="-1" role="dialog">
    <div class='modal-dialog'>
        <!-- Modal content-->
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                <h4 class='modal-title'>Delete</h4>
            </div>
            <div class='modal-body'>
                <div class="">
                    <h4 class="text-center text-danger"> Zapis Budet Udalit!</h4>
                    <h4 class="text-center text-danger">We desvitelno xatite udalit eto zapisa?</h4>
                </div>
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-danger deletebtn' value=''>Delete</button>
                <!-- <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button> -->
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
    $('.deletesotrudniki').click(function(){
            $('#deletesotrudniki').modal('show');

            $('.deletebtn').val($(this).val());  
            
            var task_id = $('.deletebtn').val();

            $('.deletebtn').click(function(){
                $.ajax({
                    type: "get",
                    url:"/sotrudniki/deleteAjax/" + task_id,
                    success: function (data) {
                        $('#deletesotrudniki').modal('hide');
                        $("#sotrudniki_" + data[1]).fadeOut(800, function () {
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
