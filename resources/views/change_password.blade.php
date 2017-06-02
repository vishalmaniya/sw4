@extends('layouts.default_change_password')
@section('title','Login')
@section('page_css')
@endsection
@section('header')
<div class="title"></div>
<div class="headerr">
<div class="breadcrumbs"><a href="#">Dashboard</a> &nbsp;<img src="{{ asset('front_assets/images/breadcrumbs.gif') }}" alt=""> &nbsp;Welcome!</div>
<div class="user">
    <a href="#" class="profile"><img src="{{ asset('front_assets/profiles/default_sml.jpg') }}" alt="profile-img"></a>
    <div class="username">
        <a href="#">
            march05_admin
        </a>
    </div>
    <div class="points"><b>Total Points:</b> 160 points</div>
</div>
</div>
@endsection
@section('main_class','usersright users course')
@section('sub_class','change_password')
@section('content')
<div class="twocolwrapper">
    <div class="twocol">
        <div class="leftcol11">
        <div class="leftcol">
            <div class="section">
                <h1>Change Password</h1>
            </div>
            <div class="reminder">
                <form action="" method="post" accept-charset="utf-8">
                    <div class="form-action">
                        <div class="form-design">
                            <div>
                                <div class="label1"><label for="new_password">New Password:</label></div>
                                <div class="input1"><input name="new_password" value="" id="new_password" maxlength="20" size="30" class="error" type="text"></div>
                                <div class="error_msg">The New Password field is required.</div>
                            </div>
                            <div>
                                <div class="label1">
                                    <div class="wrong-input"><label for="confirm_new_password">Confirm New Password:</label></div>
                                    <div class="input1"><input name="confirm_new_password" value="" id="confirm_new_password" maxlength="20" size="30" class="" type="text"></div>
                                    <div class="error_msg">
                                       <ul></ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input value="Change Password" class="button_green" type="submit">
                </form>
            </div>
        </div>
        </div>
        <?php if(Sentinel::inRole('user')) { ?>
        @include('user.layouts.right_panel')
        <?php }else if(Sentinel::inRole('teacher')){ ?>
        @include('teacher.layouts.right_panel')
        <?php } ?>
        <div class="clear"></div>
    </div>
</div>
@endsection
@section('page_js')
@endsection