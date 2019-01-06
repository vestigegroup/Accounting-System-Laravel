<!-- Navigatio Bar -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand text-capitalize" href="#"> &nbsp;<i class="fa {{ $fa }} "> </i>  &nbsp;{{ $title }}</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right" >
                    <li><a href="{{ route('home') }}"><i class="fa fa-home fa-lg"></i></a></li>
                    @if($goback)
                        <li><a href="{{ URL::previous() }}"><i class="fa fa-times-circle fa-lg"></i></a></li>
                    @endif

                    @if($addurl)
                        <li><a href="{{ route($addurl) }}"><i class="fa fa-plus-square fa-lg"></i></a></li>
                    @endif

                    @if($savedata)
                        <li><a href=""><button class="btn btn-danger btn-xs"  form="{{ $savedata }}" data-original-title="Save"><i class="fa fa-floppy-o fa-lg"></i></button></a></li>
                    @endif

                    @if($print)
                        <li><a href="{{ route($print) }}" target="_blank"><i class="fa fa-print fa-lg"></i></a></li>
                    @endif

                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-1"></i> <span class="caret fa-1"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" data-toggle="modal" data-target="#modalforpassword"> <i class="fa fa-user"></i> My Account</a></li>
                            <li><a href="#" class="" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash"></i> Удалить  все данные </a></li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="" method="POST" enctype="multipart/form-data"  action="{{ route('deletemonthlydata') }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12">
                        <div class="alert alert-warning alert-dismissible fade show">
                            if you delete this, it delete all the data.
                        </div>
                    </div>
                        {{ csrf_field() }}
                        <div class="col-sm-12">
                            <div class="col-sm-3 text-right">
                               <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Пароль:</label>
                            </div>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="password" class="form-control" placeholder="Парол" aria-describedby="basic-addon1" name="password" required >
                                    <span class="input-group-addon photo-title" id="basic-addon1"><i class="fa fa-unlock-alt fa-fw" aria-hidden="true" style="color: #0094c9 !important;"></i></span>
                                </div>
                            </div>
                        </div>
                            <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Нет</button>
                    <button type="submit" class="btn btn-primary">Удалить</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Navigatio Bar -->
<div class="modal fade" id="modalforpassword" tabindex="-1" role="dialog" aria-labelledby="modalforpassword" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="" method="POST" enctype="multipart/form-data" id="" action="{{ route('user') }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Изменить запись </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="col-sm-12">
                            <div class="col-sm-3 text-right">
                               <label class="" style="line-height: 1.3em;padding: 6px 12px;"> Пароль:</label>
                            </div>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="password" class="form-control" placeholder="Парол" aria-describedby="basic-addon1" name="password" required >
                                    <span class="input-group-addon photo-title" id="basic-addon1"><i class="fa fa-unlock-alt fa-fw" aria-hidden="true" style="color: #0094c9 !important;"></i></span>
                                </div>
                            </div>
                        </div>
                            <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                    <button type="submit" class="btn btn-primary">Вход</button>
                </div>
            </div>
        </form>
    </div>
</div>