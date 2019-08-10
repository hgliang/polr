@extends('layouts.base')

@section('css')
<link rel='stylesheet' href='css/login.css' />
@endsection

@section('content')
<div class="center-text">
    <h1>Login</h1><br/><br/>
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <form action="login" method="POST">
            <input type="text" placeholder="username" name="username" class="form-control login-field" />
            <input type="password" placeholder="password" name="password" class="form-control login-field" />
            <input type="hidden" name='_token' value='{{csrf_token()}}' />
            <input type="submit" value="Login" class="login-submit btn btn-success" />

            <p class='login-prompts'>
            @if (env('POLR_ALLOW_ACCT_CREATION') == true)
                <small>还没注册？ <a href='{{route('signup')}}'>点击注册</a></small>
            @endif

            @if (env('SETTING_PASSWORD_RECOV') == true)
                <small>忘记密码？ <a href='{{route('lost_password')}}'>点击重置</a></small>
            @endif
            </p>
        </form>
    </div>
    <div class="col-md-3"></div>
</div
@endsection
