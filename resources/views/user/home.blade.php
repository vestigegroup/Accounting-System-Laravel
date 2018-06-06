@extends('layouts.app')
@section('content')
    @include('shared.topnavbarhome')

    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 well">
            <div class="col-lg-12">
                @if (Session::has('message'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p class="alert-link">{!! Session::get('message') !!}</p>
                    </div>
                @endif
            </div>
            <form class="form-horizontal col-md-10 col-md-offset-2" action="{{ route('user.edit') }}"  method="POST" id="multiple" enctype="multipart/form-data" name="myform" onsubmit="return validateForm()">
                {{ csrf_field() }}
                @foreach($users as $user)
                    <input type="hidden" name="userid" value="{{ $user->id }}">
                    
                    <div class="form-group has-success">
                        <label for="inputEmail3" class="col-sm-2  text-right control-label text-capitalize">Имя:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control"  placeholder="Имя" required name="username" value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="form-group has-success">
                        <label for="inputEmail3" class="col-sm-2  text-right control-label text-capitalize">Е-Мeйл:</label>
                        <div class="col-sm-5">
                            <input type="email" class="form-control"  placeholder="Е-Мeйл" required name="useremail" value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="form-group has-success">
                        <label for="inputEmail3" class="col-sm-2  text-right control-label text-capitalize ">пароль:</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control"  placeholder="Пароль" required name="userpassword" id="password" min="6">
                        </div>
                        <div class="col-sm-1">
                            <span class="btn btn-default" id="showpassword" onclick="showpassword()" ><i class="fa fa-eye" id="fapassword"></i></span>                        
                        </div>
                    </div>
                    <div class="form-group has-success">
                        <label for="inputEmail3" class="col-sm-2  text-right control-label text-capitalize">Повторит пароль:</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control"  placeholder="Повторит пароль" required name="userrepeatpassword" id="repeatpassword" min="6">
                        </div>
                        <div class="col-sm-1">
                            <span class="btn btn-default" onclick="showrepeatpassword()"><i class="fa fa-eye" id="farepeatpassword"></i></span>                        
                        </div>
                    </div>
                    <div class="has-error">
                        <p class="text-danger col-sm-5 col-sm-push-2" id="errors"></p>
                    </div>
                    <div class="form-group has-success">
                        <div class="col-md-7">
                            <button type="submit" class="btn btn-success pull-right text-capitalize">Сохранить</button>
                        </div>
                    </div>

                 @endforeach
            </form>
        </div>
    </div>

@endsection

@section('js')
<script type="text/javascript">
    function showpassword() {
        var texttoShow = document.getElementById('password');
        var idfapasswd = document.getElementById('fapassword');

        if (texttoShow.type === "password") {
            texttoShow.type = "text";
            idfapasswd.setAttribute('class', 'fa fa-eye-slash')

        } else {
            texttoShow.type = "password";
            idfapasswd.setAttribute('class', 'fa fa-eye')

        }
    }

    function showrepeatpassword() {
        var texttoShow = document.getElementById('repeatpassword');
        var idfarepeatpasswd = document.getElementById('farepeatpassword');


        if (texttoShow.type === "password") {
            texttoShow.type = "text";
            idfarepeatpasswd.setAttribute('class', 'fa fa-eye-slash')

        } else {
            texttoShow.type = "password";
            idfarepeatpasswd.setAttribute('class', 'fa fa-eye')
        }
    }
    
    function validateForm() {
        var passwd          = document.forms["myform"]["userpassword"].value;
        var repeatpasswd    = document.forms["myform"]["userrepeatpassword"].value;
        if (passwd != repeatpasswd) {
            document.getElementById('errors').innerHTML = '! Password must be sutisified';
            return false;
        } else {
            if (passwd.length < 5 ) {
                document.getElementById('errors').innerHTML = 'Password must have at least 6 characters';
                return false;
            } else {
                return true;
            }
        }
    }
</script>
@endsection