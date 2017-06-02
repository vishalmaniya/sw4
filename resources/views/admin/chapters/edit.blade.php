@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Edit Chapter
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
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
        <li>Chapters</li>
        <li class="active">Add New Chapter</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> <i class="livicon" data-name="users" data-size="16" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                        Editing Chapter : {!! $chapters->name!!}
                    </h3>
                    <span class="pull-right clickable">
                        <i class="glyphicon glyphicon-chevron-up"></i>
                    </span>
                </div>
                <div class="panel-body">

                    <!-- errors -->
                    <div class="has-error">
                        {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('courses_id', '<span class="help-block">:message</span>') !!}
                    </div>

                    <!--main content-->
                    <div class="row">

                        <div class="col-md-12">
                            <form id="commentForm" action="{{ route('chapters.update', $chapters) }}"
                                  method="POST" id="wizard-validation" enctype="multipart/form-data" class="form-horizontal">
                                <!-- CSRF Token -->
                                <input type="hidden" name="_method" value="PATCH"/>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Course Name: *</label>
                                    <div class="col-sm-10">
                                        <input id="name" name="name" type="text"
                                               placeholder="Name" class="form-control required"
                                               value="{!! old('name',$chapters->name) !!}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="courses_id" class="col-sm-2 control-label">Please select a Course: *</label>
                                    <div class="col-sm-10">
                                        <select name="courses_id" class="form-control" id="courses_id">
                                            <option value="">Select Course</option>
                                            @foreach($course as $courses)
                                            <option value="{{ $courses->id }}" @if($chapters->courses_id == $courses->id){{ 'selected' }}@endif>{{ $courses->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-4">
                                        <a class="btn btn-danger" href="{{ url('admin/chapters') }}">
                                            Cancel
                                        </a>
                                        <button type="submit" class="btn btn-success">
                                            Update Chapter
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
    <script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/addchapter.js') }}"></script>
@stop