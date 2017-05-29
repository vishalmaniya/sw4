@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
View Course Details
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet"/>
<link href="{{ asset('assets/vendors/x-editable/bootstrap-editable.css') }}" rel="stylesheet"/>
<link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet"/>
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <!--section starts-->
        <h1>Course: {{ $courses->name }} </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">Courses</a>
            </li>
            <li class="active">Course</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>{{ $courses->name }}</td>
                        </tr>
                        <tr>
                            <td>Category</td>
                            <td>{{ $courses->category->name }}</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>{{ $courses->description }}</td>
                        </tr>
                        <tr>
                            <td>Source Url</td>
                            <td>{{ $courses->source }}</td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>{{ $courses->price }}</td>
                        </tr>
                        <tr>
                            <td>Position</td>
                            <td>{{ $courses->position }}</td>
                        </tr>
                        <tr>
                            <td>Public</td>
                            <td>{{ $courses->public }}</td>
                        </tr>
                        <tr>
                            <td>Free Content Limit</td>
                            <td>{{ $courses->free_content_limit }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@stop

{{-- page level scripts --}}
@section('footer_scripts')
<!-- Bootstrap WYSIHTML5 -->
<script  src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
@stop