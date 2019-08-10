@extends('layouts.base')

@section('css')
<link rel='stylesheet' href='/css/shorten_result.css' />
@endsection

@section('content')
<h3>生成的短网址</h3>
<div class="input-group">
    <input type='text' class='result-box form-control' value='{{$short_url}}' id='short_url' />
    <div class='input-group-addon' id='clipboard-copy' data-clipboard-target='#short_url' data-toggle='tooltip' data-placement='bottom' data-title='Copied!'>
        <i class='fa fa-clipboard' aria-hidden='true' title='点击复制'></i>
    </div>
</div>
<a id="generate-qr-code" class='btn btn-primary'>生成短网址二维码</a>
<a href='{{route('index')}}' class='btn btn-info'>继续生成短网址</a>

<div class="qr-code-container"></div>

@endsection


@section('js')
<script src='/js/qrcode.min.js'></script>
<script src='/js/clipboard.min.js'></script>
<script src='/js/shorten_result.js'></script>
@endsection
