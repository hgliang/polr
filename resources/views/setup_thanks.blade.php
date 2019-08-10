@extends('layouts.minimal')

@section('title')
Setup Completed
@endsection

@section('css')
<link rel='stylesheet' href='/css/default-bootstrap.min.css'>
<link rel='stylesheet' href='/css/setup.css'>
@endsection

@section('content')
<div class="navbar navbar-default navbar-fixed-top">
    <a class="navbar-brand" href="/">Polr</a>
</div>

<div class='row'>
    <div class='col-md-3'></div>

    <div class='col-md-6 setup-body well'>
        <div class='setup-center'>
            <img class='setup-logo' src='/img/logo.png'>
        </div>
        <h2>安装完成</h2>
        <p>你的短网址管理系统已经安装完成。 你现在可以登录<a href='{{route('login')}}'>登录</a> 或者
            访问你的网站<a href='{{route('index')}}'>主页</a>。
        </p>
        <p>Consider taking a look at the <a href='http://docs.polr.me/'>docs</a> or <a href='//github.com/cydrobolt/polr'>README</a>
            for assistance.
        </p>
        <p>You may also join us on IRC at <a href='//webchat.freenode.net/?channels=#polr'><code>#polr</code></a> on freenode for assistance or questions.</p>

        <p>Thanks for using Polr!</p>
    </div>

    <div class='col-md-3'></div>
</div>


@endsection
