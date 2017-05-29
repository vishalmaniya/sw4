@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Edit User
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/pages/wizard.css') }}" rel="stylesheet">
<!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Edit user</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Users</li>
        <li class="active">Add New User</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"> <i class="livicon" data-name="users" data-size="16" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                        Editing user : {!! $courses->name!!}
                    </h3>
                    <span class="pull-right clickable">
                        <i class="glyphicon glyphicon-chevron-up"></i>
                    </span>
                </div>
                <div class="panel-body">

                    <!-- errors -->
                    <div class="has-error">
                        {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('price', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('public', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('category_id', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('free_content_limit', '<span class="help-block">:message</span>') !!}
                    </div>

                    <!--main content-->
                    <div class="row">

                        <div class="col-md-12">
                            <form id="commentForm" action="{{ route('courses.update', $courses) }}"
                                  method="POST" id="wizard-validation" enctype="multipart/form-data" class="form-horizontal">
                                <!-- CSRF Token -->
                                <input type="hidden" name="_method" value="PATCH"/>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                    <!-- CSRF Token -->
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Course Name: *</label>
                                        <div class="col-sm-10">
                                            <input id="name" name="name" type="text"
                                                   placeholder="Name" class="form-control required"
                                                   value="{!! old('name',$courses->name) !!}"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="col-sm-2 control-label">Course Description:</label>
                                        <div class="col-sm-10">
                                            <textarea id="description" name="description" class="form-control" placeholder="Description">{!! old('description',$courses->description) !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="price" class="col-sm-2 control-label">Price (XX.XX): *</label>
                                        <div class="col-sm-10">
                                            <input id="price" name="price" type="text"
                                                   placeholder="Price" class="form-control required"
                                                   value="{!! old('price',$courses->price) !!}"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="public" class="col-sm-2 control-label">Is course private or public?: *
                                        <span class="caption">Private courses will be hidden from non-admin users.</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <select name="public" class="form-control" id="public">
                                                <option value="0" @if($courses->public == 0){{ 'selected' }}@endif >Private</option>
                                                <option value="1" @if($courses->public == 1){{ 'selected' }}@endif >Public</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id" class="col-sm-2 control-label">Please select a category: *</label>
                                        <div class="col-sm-10">
                                            <select name="category_id" class="form-control" id="category_id">
                                                <option value="">Select Category</option>
                                                @foreach($category as $categories)
                                                <option value="{{ $categories->id }}" @if($courses->category_id == $categories->id){{ 'selected' }}@endif >{{ $categories->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <h2>Free Content Limit</h2>
                                          Please set the limit to the free content for this course. The limit is set by adding the number of lessons + the number of questions for each lesson you want free. For example, if you want the first lesson and first three questions for this course to be free, you would enter 4<br><br>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="free_content_limit" class="col-sm-2 control-label">Free Content Limit:</label>
                                        <div class="col-sm-10">
                                            <input id="free_content_limit" name="free_content_limit" type="text"
                                                   placeholder="Free Content Limit" class="form-control required"
                                                   value="{!! old('free_content_limit',$courses->free_content_limit) !!}"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <h2>Course Files</h2>
                                          Course Source Files (ZIP):<br/>
                                          <span class="caption">After creating this course, upload the zip file via FTP to /uploads/[course_name].</span><br/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="url" class="col-sm-2 control-label">Course Source Files (ZIP):</label>
                                        <div class="col-sm-10">
                                            <input id="url" name="url" type="text"
                                                   placeholder="Course Source Files URL" class="form-control"
                                                   value="{!! old('url',$courses->url) !!}"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                          <h2>Course Badges</h2>
                                          Please upload three badge image files to the /uploads/[course name]/ folder:<br/>
                                          <ul>
                                              <li><b>badge_sml.png</b> - Small 80px x 80px PNG</li>
                                              <li><b>badge.png</b> - Medium 110px x 110px PNG</li>
                                              <li><b>badge_lrg.png</b> - Large 140px x 140px PNG</li>
                                          </ul>
                                          <br/><br/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-4">
                                            <a class="btn btn-danger" href="{{ url('admin/courses') }}">
                                                Cancel
                                            </a>
                                            <button type="submit" class="btn btn-success">
                                                Add Course
                                            </button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                    <!--main content end--> 
                </div>
            </div>
        </div>
    </div>
    <!--row end-->
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" ></script>
    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/edituser.js') }}"></script>
@stop