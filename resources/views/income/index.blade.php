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

                </div>
            </div>
        </div>
    </div>


    @include('shared.footer')

@endsection
@section('js')


@endsection
