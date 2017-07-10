@extends('layouts.default_login')
@section('title','Login')
@section('page_css')
@endsection
@section('sub_class','index')
@section('content')
<div class="fullcol">

    <div class="section">
        <img src="{{ asset('front_assets/images/logo.png') }}" style="margin: 0 auto; display: block;">
    </div>
    <!-- Notifications -->
    @include('notifications')
    <div class="sectionbg" style="background: #f6f6f6 url('{{ asset('front_assets/images/bg-login-slice.png') }}') center bottom repeat-x;">
        
        <form class="formm" action="{{ route('login') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
			<input type="hidden" name="remember-me" value="0">
            <ul class="one">
			
                <li width="20"><label  class="label-size">Username/Email:</label></li>
                <li><input type="text" name="user_name" id="email" maxlength="80" size="30"></li>
            </ul>
            <ul class="two">
                <li></li>
                <li class="error_msg"></li>
            </ul>
            <ul class="three">
                <li></li><label  class="label-size" style="padding: 0 0 0 9%;">Password:</label></li>
                <li></li><input type="password" name="password" id="password" size="30"></li>
            </ul>
            
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
	<div class="ban_error_msg"></div>
    </div>
</div>
@endsection
@section('page_js')
@endsection