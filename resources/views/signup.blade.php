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

    <div class="sectionbg" style="background: #f6f6f6 url('{{ asset('front_assets/images/bg-login-slice.png') }}') center bottom repeat-x;">
        <!-- Notifications -->
        @include('notifications')
        <form class="" action="{{ route('register') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="id" value="{{ $id_val }}">
            <ul class="one">
                <li width="20"><label class="label-size">Username</label></li>
                <li><input type="text" name="name" id="name"></li>
            </ul>
            <ul class="two">
                <li></li>
                <li class="error_msg"></li>
            </ul>
            <ul class="one">
                <li width="20"><label class="label-size">Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></li>
                <li><input type="text" name="email" id="name"></li>
            </ul>
            <ul class="two">
                <li></li>
                <li class="error_msg"></li>
            </ul>
            <ul class="three">
                <li><label class="label-size">Password</label></li>
                <li><input type="password" name="password" id="password"></li>
            </ul>
            <ul class="four">
                <li class="forgetpassword">
                    <input type="submit" value="Register" name="submit" class="button_green" />
                </li>
            </ul>
        </form>
    </div>
</div>
@endsection
@section('page_js')
@endsection