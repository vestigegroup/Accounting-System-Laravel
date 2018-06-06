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
                <a class="navbar-brand" href="#"> <i class="fa {{ $fa }}"> </i>  {{ $title }}</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ route('home') }}"><i class="fa fa-home fa-1"></i></a></li>
                    <li><a href="{{ route('prixodi') }}"><i class="fa fa-list fa-1"></i></a></li>
                    <li><a href="" data-toggle="modal" data-target="#addzarplata" ><i class="fa fa-plus-square fa-1"></i></a></li>
                    <li><a href="{{ URL::to($url) }}" target="_blank"><i class="fa fa-print fa-1"></i></a></li>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-1"></i> <span class="caret fa-1"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('user') }}"> <i class="fa fa-user"></i> My Account</a></li>
                            <li><a href="{{ route('setting') }}"> <i class="fa fa-cog"></i> Settings </a></li>
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