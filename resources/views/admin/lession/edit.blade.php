@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Edit Lesson
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
    <h1>Edit Lesson</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Lessons</li>
        <li class="active">Add New Lesson</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> <i class="livicon" data-name="users" data-size="16" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                        Editing Lesson : {!! $lession->name!!}
                    </h3>
                    <span class="pull-right clickable">
                        <i class="glyphicon glyphicon-chevron-up"></i>
                    </span>
                </div>
                <div class="panel-body">

                    <!-- errors -->
                    <div class="has-error">
                        {!! $errors->first('courses_id', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('chapter_id', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('video_url', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('video_length', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('video_width', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('video_height', '<span class="help-block">:message</span>') !!}
                    </div>

                    <!--main content-->
                    <div class="row">

                        <div class="col-md-12">
                            <form id="commentForm" action="{{ route('lession.update', $lession) }}"
                                  method="POST" id="wizard-validation" enctype="multipart/form-data" class="form-horizontal">
                                <!-- CSRF Token -->
                                <input type="hidden" name="_method" value="PATCH"/>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                <div class="form-group">
                                    <label for="courses_id" class="col-sm-2 control-label">Select a Course: *</label>
                                    <div class="col-sm-10">
                                        <select name="courses_id" class="form-control" id="courses_id" onchange="onchange_course(this.value)">
                                            <option value="">Select Course</option>
                                            @foreach($cource as $courses)
                                            <option value="{{ $courses->id }}" @if($lession->chapter->course->id == $courses->id){{ 'selected' }}@endif >{{ $courses->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="chapter_id" class="col-sm-2 control-label">Select a Chapter: *</label>
                                    <div class="col-sm-10">
                                        <select name="chapter_id" class="form-control" id="chapter_id">
                                            <option value="">Select Chapter</option>
                                            @foreach($chapter as $chapters)
                                            <option value="{{ $chapters->id }}" @if($lession->chapter_id == $chapters->id){{ 'selected' }}@endif >{{ $chapters->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Lesson Name: *</label>
                                    <div class="col-sm-10">
                                        <input id="name" name="name" type="text"
                                               placeholder="Name" class="form-control required"
                                               value="{!! old('name',$lession->name) !!}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description" class="col-sm-2 control-label">Description:</label>
                                    <div class="col-sm-10">
                                        <textarea name="description" placeholder="description" id="description" class="form-control">{{ old('description',$lession->description) }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="video_url" class="col-sm-2 control-label">Video Url:</label>
                                    <div class="col-sm-10">
                                        <input id="video_url" name="video_url" type="url"
                                               placeholder="Video Url" class="form-control required"
                                               value="{!! old('video_url',$lession->video_url) !!}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="video_length" class="col-sm-2 control-label">Video Length:</label>
                                    <div class="col-sm-10">
                                        <input id="video_length" name="video_length" type="number"
                                               placeholder="Video Length" class="form-control required"
                                               value="{!! old('video_length',$lession->video_length) !!}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="video_width" class="col-sm-2 control-label">Video Width:</label>
                                    <div class="col-sm-10">
                                        <input id="video_width" name="video_width" type="number"
                                               placeholder="Video Width" class="form-control required"
                                               value="{!! old('video_width',$lession->video_width) !!}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="video_height" class="col-sm-2 control-label">Video Height:</label>
                                    <div class="col-sm-10">
                                        <input id="video_height" name="video_height" type="number"
                                               placeholder="Video Height" class="form-control required"
                                               value="{!! old('video_height',$lession->video_height) !!}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-4">
                                        <a class="btn btn-danger" href="{{ url('admin/lession') }}">
                                            Cancel
                                        </a>
                                        <button type="submit" class="btn btn-success">
                                            Edit Lesson
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
    <script src="{{ asset('assets/js/pages/addlession.js') }}"></script>
    <script>
        function onchange_course(course_id){
            $("#chapter_id").removeAttr('disabled');
            $.ajax({
                url: "{{ route('change_course') }}",
                type: "post",
                data: {_token:'{{ csrf_token() }}',course_id:course_id},
                success: function (data) {
                    $("#chapter_id").html(data);
                }
            });
        }
    </script>
@stop