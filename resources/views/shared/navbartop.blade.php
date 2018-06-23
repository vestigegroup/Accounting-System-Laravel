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
                <a class="navbar-brand" href="#"> <i class="fa {{ $fa }} "> </i>  {{ $title }}</a>
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
                        <li><a href="" target="_blank"><i class="fa fa-print fa-lg"></i></a></li>
                    @endif

                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-1"></i> <span class="caret fa-1"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href=""> <i class="fa fa-user"></i> My Account</a></li>
                            <li><a href=""> <i class="fa fa-cog"></i> Settings </a></li>
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
<!-- End Navigatio Bar -->