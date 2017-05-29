@extends('layouts.default')
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
@section('content')
<div class="twocolwrapper">
    <div class="twocol">
        <div class="leftcol">
            <div class="section">
                <h1>Change Password</h1>
            </div>
            <div class="sectionbg">

                <form action="" method="post" accept-charset="utf-8">
                    <table>
                        <tbody>
                            <tr>
                                <td><label for="new_password">New Password:</label></td>
                                <td><input name="new_password" value="" id="new_password" maxlength="20" size="30" class="error" type="text"></td>
                                <td class="error_msg">
                                    <ul>
                                        <li class="alert_error">The New Password field is required.</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="confirm_new_password">Confirm New Password:</label></td>
                                <td><input name="confirm_new_password" value="" id="confirm_new_password" maxlength="20" size="30" class="" type="text"></td>
                                <td class="error_msg">
                                    <ul></ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <input value="Change Password" class="button_green" type="submit">
                </form>
            </div>
        </div>
        @include('user.layouts.right_panel')
        <div class="clear"></div>
    </div>
</div>
@endsection
@section('page_js')
@endsection