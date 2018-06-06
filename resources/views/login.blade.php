@extends('layouts.app')

@section('css')
<style type="text/css">
	html {
	height: 100%;
}
body {
	/* For fixed navbar */
    background-color: #074f7c;
}

/* Font owesome */
.fa-1 {
    font-size: 1.5em;
}
/*Login Page Design */
.login-top {
    margin-top: 20%;
}
.login-top .login-header {
    font-size: 5em;
    color: #fff;
    letter-spacing: 2px;
}
.form-top {
    border: 1px solid #fff;
    padding: 10px;

}
.form {
   
}
.form-top .input-group {
    margin-top: 7px;
}
.input-group-addon {
    background-color: #fff;
}
.btn-customlog {
    background-color: #fff;
}
</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-push-3">
            <div class="login-top text-center">
                <p class="login-header">
                   RAMZ SYSTEM
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="col-md-10 col-md-offset-1">
                <form class="form-horizontal" method="POST" action="{{ route('login') }}" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="form-group form-top">
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                            <input type="email" class="form-control" placeholder="Username" aria-describedby="sizing-addon2" name="email" value="{{ old('email') }}" required autofocus autocomplete="off">                        
                        </div>
                        <div class="input-group">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" placeholder="Password" aria-describedby="sizing-addon2" name="password" required  autocomplete="off">
                        </div>
                        <div class="input-group">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-group btn-block">
                            <button class="btn btn-customlog btn-block"> <i class="fa fa-sign-in" aria-hidden="true"></i> Login In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
