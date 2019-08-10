@extends('layouts.minimal')

@section('title')
Setup
@endsection

@section('css')
<link rel='stylesheet' href='/css/default-bootstrap.min.css'>
<link rel='stylesheet' href='/css/setup.css'>
@endsection

@section('content')
<div class="navbar navbar-default navbar-fixed-top">
    <a class="navbar-brand" href="/">Polr</a>
</div>

<div class="row" ng-controller="SetupCtrl" class="ng-root">
    <div class='col-md-3'></div>

    <div class='col-md-6 setup-body well'>
        <div class='setup-center'>
            <img class='setup-logo' src='/img/logo.png'>
        </div>

        <form class='setup-form' method='POST' action='/setup'>
            <h4>数据库配置</h4>

            <p>数据库主机:</p>
            <input type='text' class='form-control' name='db:host' value='localhost'>

            <p>数据库端口:</p>
            <input type='text' class='form-control' name='db:port' value='3306'>

            <p>数据库用户名:</p>
            <input type='text' class='form-control' name='db:username' value='root'>

            <p>数据库密码:</p>
            <input type='password' class='form-control' name='db:password' value='password'>

            <p>
                数据库名称:
                <setup-tooltip content="必须是存在的数据库，你需要手动创建。"></setup-tooltip>
            </p>
            <input type='text' class='form-control' name='db:name' value='polr'>


            <h4>网站程序设置</h4>

            <p>网站名称:</p>
            <input type='text' class='form-control' name='app:name' value='Polr'>

            <p>网站访问协议:</p>
            <input type='text' class='form-control' name='app:protocol' value='https://'>

            <p>网站域名(输入你的域名，不要带 https:// 和反斜杠 / ):</p>
            <input type='text' class='form-control' name='app:external_url' value='yoursite.com'>

            <p>
                访问分析:
                <button data-content="开启后将统计：访问地域、时间等信息，会影响性能。"
                    type="button" class="btn btn-xs btn-default setup-qmark" data-toggle="popover">?</button>
            </p>
            <select name='setting:adv_analytics' class='form-control'>
                <option value='false' selected='selected'>关闭</option>
                <option value='true'>开启</option>
            </select>

            <p>权限:</p>
            <select name='setting:shorten_permission' class='form-control'>
                <option value='false' selected='selected'>所有人都可以生成短网址</option>
                <option value='true'>只允许已注册的用户生成短网址</option>
            </select>

            <p>公用接口:</p>
            <select name='setting:public_interface' class='form-control'>
                <option value='true' selected='selected'>显示公用接口(默认)</option>
                <option value='false'>重定向到指定地址</option>
            </select>

            <p>404错误信息:</p>
            <select name='setting:redirect_404' class='form-control'>
                <option value='false' selected='selected'>显示错误信息(默认)</option>
                <option value='true'>不显示错误信息，重定向到指定网址</option>
            </select>

            <p>
                重定向指定网址:
                <setup-tooltip content="将上述选项重定向到该地址"></setup-tooltip>
            </p>
            <input type='text' class='form-control' name='setting:index_redirect' placeholder='http://your-main-site.com'>
            <p class='text-muted'>
                若启用请转到 http://yoursite.com/login 登录
            </p>

            <p>
                短网址字符生成方式:
                <setup-tooltip content="如果选择随机生成短网址字符，则字符不会按顺序生成"></setup-tooltip>
            </p>
            <select name='setting:pseudor_ending' class='form-control'>
                <option value='false' selected='selected'>按先后顺序生成(短网址字符按顺序生成，如0、1、2、3)</option>
                <option value='true'>随机生成(短网址字符随机生成，如6LxZ3j、5gHe8K等)</option>
            </select>

            <p>
                短网址字符配置:
                <setup-tooltip content="如果选择随机生成，则此选项不用设置"></setup-tooltip>
            </p>
            <select name='setting:base' class='form-control'>
                <option value='32' selected='selected'>32 -- lowercase letters & numbers (default)</option>
                <option value='62'>62 -- lowercase, uppercase letters & numbers</option>
            </select>

            <h4>
                网站管理员用户设置
                <setup-tooltip content="这些设置将作用于配置网站管理员用户信息"></setup-tooltip>
            </h4>

            <p>管理员用户名:</p>
            <input type='text' class='form-control' name='acct:username' value='polr'>

            <p>管理员邮箱:</p>
            <input type='text' class='form-control' name='acct:email' value='polr@admin.tld'>

            <p>管理员用户密码:</p>
            <input type='password' class='form-control' name='acct:password' value='polr'>

            <h4>
                SMTP 邮件设置
                <setup-tooltip content="如需邮箱认证或邮箱找回用户名密码，则需要进行以下设置"></setup-tooltip>
            </h4>

            <p>SMTP Server:</p>
            <input type='text' class='form-control' name='app:smtp_server' placeholder='smtp.gmail.com'>

            <p>SMTP Port:</p>
            <input type='text' class='form-control' name='app:smtp_port' placeholder='25'>

            <p>SMTP Username:</p>
            <input type='text' class='form-control' name='app:smtp_username' placeholder='example@gmail.com'>

            <p>SMTP Password:</p>
            <input type='password' class='form-control' name='app:smtp_password' placeholder='password'>

            <p>SMTP From:</p>
            <input type='text' class='form-control' name='app:smtp_from' placeholder='example@gmail.com'>
            <p>SMTP From Name:</p>
            <input type='text' class='form-control' name='app:smtp_from_name' placeholder='noreply'>

            <h4>API 设置</h4>

            <p>匿名API:</p>
            <select name='setting:anon_api' class='form-control'>
                <option selected value='false'>关闭 -- 只允许已注册的用户使用API</option>
                <option value='true'>开启 -- 允许使用无秘钥API</option>
            </select>

            <p>
                匿名API限制:
                <setup-tooltip content="每个IP每分钟使用API限制"></setup-tooltip>
            </p>
            <input type='text' class='form-control' name='setting:anon_api_quota' placeholder='10'>

            <p>自动生成API:</p>
            <select name='setting:auto_api_key' class='form-control'>
                <option selected value='false'>关闭 -- 由管理员用户手动给已注册的用户分配API</option>
                <option value='true'>开启 -- 每个用户登录后自动获取API</option>
            </select>

            <h4>其他设置</h4>

            <p>
                用户注册设置:
                <setup-tooltip content="开启后可进行网站用户注册"></setup-tooltip>
            </p>
            <select name='setting:registration_permission' class='form-control'>
                <option value='none'>禁止注册</option>
                <option value='email'>开启注册，需要认证注册邮箱</option>
                <option value='no-verification'>开启注册，不需要认证注册邮箱</option>
            </select>

            <p>
                注册时所用的邮箱域名限制管理:
                <setup-tooltip content="限制某些邮件域名"></setup-tooltip>
            </p>
            <select name='setting:restrict_email_domain' class='form-control'>
                <option value='false'>允许任何邮件域名的邮箱进行注册</option>
                <option value='true'>限制可注册的邮件域名</option>
            </select>

            <p>
                允许注册的邮件域名:
                <setup-tooltip content="每个邮件域名之间用英文逗号分隔"></setup-tooltip>
            </p>
            <input type='text' class='form-control' name='setting:allowed_email_domains' placeholder='company.com,company-corp.com'>

            <p>
                密码重置:
                <setup-tooltip content="通过注册邮箱来重置密码"></setup-tooltip>
            </p>
            <select name='setting:password_recovery' class='form-control'>
                <option value='false'>不允许重置密码</option>
                <option value='true'>允许重置密码</option>
            </select>
            <p class='text-muted'>
                开启允许重置密码选项时，需要确保网站的邮件系统可以正常使用。
            </p>

            <p>
                注册验证码设置
                <setup-tooltip content="You must provide your reCAPTCHA keys to use this feature."></setup-tooltip>
            </p>
            <select name='setting:acct_registration_recaptcha' class='form-control'>
                <option value='false'>注册时不需要验证码</option>
                <option value='true'>需要验证码进行注册</option>
            </select>

            <p>
                验证码设置:
                <setup-tooltip content="You must provide reCAPTCHA keys if you intend to use any reCAPTCHA-dependent features."></setup-tooltip>
            </p>

            <p>
                reCAPTCHA Site Key
            </p>
            <input type='text' class='form-control' name='setting:recaptcha_site_key'>

            <p>
                reCAPTCHA Secret Key
            </p>
            <input type='text' class='form-control' name='setting:recaptcha_secret_key'>

            <p class='text-muted'>
                You can obtain reCAPTCHA keys from <a href="https://www.google.com/recaptcha/admin">Google's reCAPTCHA website</a>.
            </p>

            <p>网站主题设置 (<a href='https://github.com/cydrobolt/polr/wiki/Themes-Screenshots'>点击预览主题</a>):</p>
            <select name='app:stylesheet' class='form-control'>
                <option value=''>Modern (default)</option>
                <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cyborg/bootstrap.min.css'>Midnight Black</option>
                <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/united/bootstrap.min.css'>Orange</option>
                <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/simplex/bootstrap.min.css'>Crisp White</option>
                <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/darkly/bootstrap.min.css'>Cloudy Night</option>
                <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cerulean/bootstrap.min.css'>Calm Skies</option>
                <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/paper/bootstrap.min.css'>Google Material Design</option>
                <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/superhero/bootstrap.min.css'>Blue Metro</option>
                <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/sandstone/bootstrap.min.css'>Sandstone</option>
                <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/lumen/bootstrap.min.css'>Newspaper</option>
                <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/solar/bootstrap.min.css'>Solar</option>
                <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css'>Cosmo</option>
                <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css'>Flatly</option>
                <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/yeti/bootstrap.min.css'>Yeti</option>
            </select>

            <div class='setup-form-buttons'>
                <input type='submit' class='btn btn-success' value='点击进行安装'>
                <input type='reset' class='btn btn-warning' value='清空以上已填写的信息'>
            </div>
            <input type="hidden" name='_token' value='{{csrf_token()}}' />
        </form>
    </div>

    <div class='col-md-3'></div>
</div>

<div class='setup-footer well'>
    Polr is <a href='https://opensource.org/osd' target='_blank'>open-source
    software</a> licensed under the <a href='//www.gnu.org/copyleft/gpl.html'>GPLv2+
    License</a>.

    <div>
        Polr Version {{env('VERSION')}} released {{env('VERSION_RELMONTH')}} {{env('VERSION_RELDAY')}}, {{env('VERSION_RELYEAR')}} -
        <a href='//github.com/cydrobolt/polr' target='_blank'>Github</a>

        <div class='footer-well'>
            &copy; Copyright {{env('VERSION_RELYEAR')}}
            <a class='footer-link' href='//cydrobolt.com' target='_blank'>Chaoyi Zha</a> &amp;
            <a class='footer-link' href='//github.com/Cydrobolt/polr/graphs/contributors' target='_blank'>other Polr contributors</a>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="/js/bootstrap.min.js"></script>
<script src='/js/angular.min.js'></script>
<script src='/js/base.js'></script>
<script src='/js/SetupCtrl.js'></script>
@endsection
