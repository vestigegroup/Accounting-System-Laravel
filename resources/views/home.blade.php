@extends('layouts.app')
@section('css')

@endsection
@section('content')
    @include('shared.topnavbarhome')

    <div class="container-fluid rasxod-page">
        <div class="">
            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2 rasxod-menu">
                <div class="list-group">
                    <a href="" class="list-group-item"> <i class="fa fa-user fa-1"></i>  <span class="text-uppercase">Outgoing</span></a>
                    <a href="" class="list-group-item"> <i class="fa fa-connectdevelop"></i>  <span class="text-uppercase">Income</span></a>
                    <a href="" class="list-group-item"> <i class="fa fa-car"></i>  <span class="text-uppercase">Customer</span></a>
                    <a href="" class="list-group-item"> <i class="fa fa-star"></i>  <span class="text-uppercase">Workers</span></a>
                    <a href="" class="list-group-item"> <i class="fa fa-star"></i>  <span class="text-uppercase">Karzho</span></a>
                    <a href="" class="list-group-item"> <i class="fa fa-star"></i>  <span class="text-uppercase">Alert Customer</span></a>
                    <a href="" class="list-group-item"> <i class="fa fa-star"></i>  <span class="text-uppercase">Ramz</span></a>
                    <a href="" class="list-group-item"> <i class="fa fa-star"></i>  <span class="text-uppercase">Price List</span></a>
                    <a href="" class="list-group-item"> <i class="fa fa-star"></i>  <span class="text-uppercase">Works Otcheti</span></a>
                    <a href="" class="list-group-item"> <i class="fa fa-star"></i>  <span class="text-uppercase">Recycle Bin</span></a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10 rasxod-menu-spisokall">
                <div class="col-lg-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-lg-12">
                        @if (Session::has('message'))
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p class="alert-link">{!! Session::get('message') !!}</p>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 table-responsive" style="margin: 0px;">
                    
                </div>
            </div>
        </div>
    </div>

   
    <!-- Footer -->
    <div class="container-fluid footer">
        <p class="text-center">© 2018 Ramz . All Rights Reserved | Design by Ramz</a></p>
    </div>
    <!-- End Footer -->
@endsection
@section('js')


@endsection
