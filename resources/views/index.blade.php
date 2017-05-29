@extends('layouts.default_login')
@section('title','Login')
@section('page_css')
@endsection
@section('content')
<div class="fullcol">

    <style type="text/css">
        .section { padding: 30px 50px; }
        .sectionbg { border-top: 1px solid #e2e2e2; }
        .sectionbg form { width: 500px; display: block; margin: 10px auto 0; }
    </style>

    <div class="section">
        <img src="{{ asset('front_assets/images/logo.png') }}" style="margin: 0 auto; display: block;">
    </div>
    <!-- Notifications -->
    @include('notifications')
    <div class="sectionbg" style="background: #f6f6f6 url('{{ asset('front_assets/images/bg-login-slice.png') }}') center bottom repeat-x;">
        
        <form class="formm" action="{{ route('login') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <ul class="one">
                <li width="20"><label  class="label-size">Username</label></li>
                <li><input type="text" name="email" id="email" maxlength="80" size="30"></li>
            </ul>
            <ul class="two">
                <li></li>
                <li class="error_msg"></li>
            </ul>
            <ul class="three">
                <li></li><label  class="label-size">Password</label></li>
                <li></li><input type="password" name="password" id="password" size="30"></li>
            </ul>
            <input type="hidden" name="remember-me" value="0">
            <div class="error" style="display:none;">
                <span class="error_msg">Invalid credentials.</span>
            </div>

            <ul class="four" >
                <li class="forgetpassword">
                    <input type="submit" value="Login" name="submit" class="button_green" />
                    <a class="forget" href="#">Forgot password?</a>
                </li>
            </ul>
        </form>

    </div>
</div>
@endsection
@section('page_js')
@endsection