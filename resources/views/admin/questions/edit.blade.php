@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Edit Question
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
<link href="{{ asset('assets/vendors/bootstrap3-wysihtml5-bower/css/bootstrap3-wysihtml5.min.css') }}"  rel="stylesheet" media="screen"/>
<link href="{{ asset('assets/css/pages/editor.css') }}" rel="stylesheet" type="text/css"/>
<!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Edit Question</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Questions</li>
        <li class="active">Add New Question</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> <i class="livicon" data-name="users" data-size="16" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                        Editing Question : 
                    </h3>
                    <span class="pull-right clickable">
                        <i class="glyphicon glyphicon-chevron-up"></i>
                    </span>
                </div>
                <div class="panel-body">

                    <!-- errors -->
                    <div class="has-error">
                        {!! $errors->first('lession_id', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('type', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('question', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('language', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('answer_type', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('answer', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('option1', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('option2', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('option3', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('option4', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('option5', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('default', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('points_correct', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('points_incorrect', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('hint_points', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('hint1', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('hint2', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('hint3', '<span class="help-block">:message</span>') !!}
                    </div>

                    <!--main content-->
                    <div class="row">

                        <div class="col-md-12">
                            <form id="commentForm" action="{{ route('questions.update', $question) }}"
                                  method="POST" id="wizard-validation" enctype="multipart/form-data" class="form-horizontal">
                                <!-- CSRF Token -->
                                <input type="hidden" name="_method" value="PATCH"/>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                
                                <div class="form-group chapter_review textarea multichoise">
                                    <label for="lession_id" class="col-sm-3 control-label">Lesson: *</label>
                                    <div class="col-sm-9">
                                        <select name="lession_id" class="form-control" id="lession_id">
                                            <option value="">Select Lesson</option>
                                            @foreach($lession as $lessions)
                                            <option value="{{ $lessions->id }}" @if(old('lession_id',$question->lession_id) == $lessions->id){{ 'selected' }}@endif >{{ $lessions->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group chapter_review textarea multichoise">
                                    <label for="type" class="col-sm-3 control-label">Question Type: *</label>
                                    <div class="col-sm-9">
                                        <select name="type" class="form-control" id="type" onchange="change_quetion(this.value)">
                                            <option value="chapter_review" @if(old('type',$question->type) == 'chapter_review'){{ 'selected' }}@endif >Chapter Review</option>
                                            <option value="multichoise" @if(old('type',$question->type) == 'multichoise'){{ 'selected' }}@endif >Multi-Choise</option>
                                            <option value="textarea" @if(old('type',$question->type) == 'textarea'){{ 'selected' }}@endif >Textarea Question</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group chapter_review textarea multichoise">
                                    <label for="question" class="col-sm-3 control-label">Question: *</label>
                                    <div class="col-sm-9">
                                        <textarea id="question" name="question" class="form-control" 
                                                  placeholder="Question">{!! old('question',$question->question_join->question) !!}</textarea>
                                    </div>
                                </div>
                                <div class="form-group chapter_review textarea multichoise">
                                    <label for="description" class="col-sm-3 control-label">Description: *</label>
                                    <div class="col-sm-9">
                                        <textarea id="description" name="description" class="form-control" 
                                                  placeholder="Description">{!! old('description',$question->description) !!}</textarea>
                                    </div>
                                </div>
                                <div class="form-group chapter_review textarea">
                                    <label for="language" class="col-sm-3 control-label">Language</label>
                                    <div class="col-sm-9">
                                        <select name="language" class="form-control" id="language">
                                            <option value="">Select Language</option>
                                            <option @if(old('language',$question->question_join->language) == 'html'){{ 'selected' }}@endif value="html">HTML</option>
                                            <option @if(old('language',$question->question_join->language) == 'css'){{ 'selected' }}@endif value="css">CSS</option>
                                            <option @if(old('language',$question->question_join->language) == 'javascript'){{ 'selected' }}@endif value="javascript">Javascript</option>
                                            <option @if(old('language',$question->question_join->language) == 'php'){{ 'selected' }}@endif value="php">PHP</option>
                                            <option @if(old('language',$question->question_join->language) == 'text'){{ 'selected' }}@endif value="text">Text</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group chapter_review textarea">
                                    <label for="answer_type" class="col-sm-3 control-label">Answer Type</label>
                                    <div class="col-sm-9">
                                        <select name="answer_type" class="form-control" id="answer_type">
                                            <option value="">Select Answer Type</option>
                                            <option @if(old('answer_type',$question->question_join->answer_type) == 'exact_sensitive'){{ 'selected' }}@endif value="exact_sensitive">Match string exactly (case sensitive)</option>
                                            <option @if(old('answer_type',$question->question_join->answer_type) == 'exact_insensitive'){{ 'selected' }}@endif value="exact_insensitive">Match string exactly (case insensitive)</option>
                                            <option @if(old('answer_type',$question->question_join->answer_type) == 'regular_expression'){{ 'selected' }}@endif value="regular_expression">Regular Expresson</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group chapter_review textarea">
                                    <label for="answer" class="col-sm-3 control-label">Answer</label>
                                    <div class="col-sm-9">
                                        <textarea id="answer_text" name="answer_text" class="form-control" 
                                                  placeholder="Answer">{!! old('answer',$question->question_join->answer) !!}</textarea>
                                    </div>
                                </div>
                                <div class="form-group multichoise">
                                    <label for="answer" class="col-sm-3 control-label">Answer</label>
                                    <div class="col-sm-9">
                                        <select name="answer" class="form-control" id="answer">
                                            <option value="">Select Answer</option>
                                            <option @if(old('answer_type',$question->question_join->answer) == 'option1'){{ 'selected' }}@endif value="option1">Option1</option>
                                            <option @if(old('answer_type',$question->question_join->answer) == 'option2'){{ 'selected' }}@endif value="option2">Option2</option>
                                            <option @if(old('answer_type',$question->question_join->answer) == 'option3'){{ 'selected' }}@endif value="option3">Option3</option>
                                            <option @if(old('answer_type',$question->question_join->answer) == 'option4'){{ 'selected' }}@endif value="option4">Option4</option>
                                            <option @if(old('answer_type',$question->question_join->answer) == 'option5'){{ 'selected' }}@endif value="option5">Option5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group multichoise">
                                    <label for="option1" class="col-sm-3 control-label">Option1:</label>
                                    <div class="col-sm-9">
                                        <input id="option1" name="option1" type="text"
                                             placeholder="Option1" class="form-control required"
                                            value="{!! old('option1',$question->question_join->option->option1) !!}"/>
                                    </div>
                                </div>
                                <div class="form-group multichoise">
                                    <label for="option2" class="col-sm-3 control-label">Option2:</label>
                                    <div class="col-sm-9">
                                        <input id="option2" name="option2" type="text"
                                             placeholder="Option2" class="form-control required"
                                             value="{!! old('option2',$question->question_join->option->option2) !!}"/>
                                    </div>
                                </div>
                                <div class="form-group multichoise">
                                    <label for="option3" class="col-sm-3 control-label">Option3:</label>
                                    <div class="col-sm-9">
                                        <input id="option3" name="option3" type="text"
                                             placeholder="Option3" class="form-control required"
                                             value="{!! old('option3',$question->question_join->option->option3) !!}"/>
                                    </div>
                                </div>
                                <div class="form-group multichoise">
                                    <label for="option4" class="col-sm-3 control-label">Option4:</label>
                                    <div class="col-sm-9">
                                        <input id="option4" name="option4" type="text"
                                             placeholder="Option4" class="form-control required"
                                             value="{!! old('option4',$question->question_join->option->option4) !!}"/>
                                    </div>
                                </div>
                                <div class="form-group multichoise">
                                    <label for="option5" class="col-sm-3 control-label">Option5:</label>
                                    <div class="col-sm-9">
                                        <input id="option5" name="option5" type="text"
                                             placeholder="Option5" class="form-control required"
                                             value="{!! old('option5',$question->question_join->option->option5) !!}"/>
                                    </div>
                                </div>
                                <div class="form-group chapter_review textarea">
                                    <label for="default" class="col-sm-3 control-label">Textarea's default value: </label>
                                    <div class="col-sm-9">
                                        <textarea id="default" name="default" class="form-control" 
                                                  placeholder="Textarea's default value">{!! old('default',$question->question_join->default_val) !!}</textarea>
                                    </div>
                                </div>
                                <div class="form-group chapter_review textarea multichoise">
                                    <label for="points_correct" class="col-sm-3 control-label">Points for correct solution: *</label>
                                    <div class="col-sm-9">
                                        <input id="points_correct" name="points_correct" type="number"
                                             placeholder="Points for correct solution" class="form-control required"
                                             value="{!! old('points_correct',$question->question_join->point_correct) !!}"/>
                                    </div>
                                </div>
                                <div class="form-group chapter_review textarea multichoise">
                                    <label for="points_incorrect" class="col-sm-3 control-label">Points subtracted for incorrect solution: *</label>
                                    <div class="col-sm-9">
                                        <input id="points_incorrect" name="points_incorrect" type="number"
                                             placeholder="Points subtracted for incorrect solution" class="form-control required"
                                             value="{!! old('points_incorrect',$question->question_join->point_incorrect) !!}"/>
                                    </div>
                                </div>
                                <div class="form-group chapter_review textarea multichoise">
                                    <label for="hint_points" class="col-sm-3 control-label">Points subtracted for using a hint:</label>
                                    <div class="col-sm-9">
                                        <input id="hint_points" name="hint_points" type="number"
                                             placeholder="Points subtracted for incorrect solution" class="form-control required"
                                             value="{!! old('hint_points',$question->hint_point) !!}"/>
                                    </div>
                                </div>
                                <div class="form-group chapter_review textarea multichoise">
                                    <label for="hint1" class="col-sm-3 control-label">Hint #1:</label>
                                    <div class="col-sm-9">
                                        <textarea id="hint1" name="hint1" class="form-control" 
                                                placeholder="Hint #1">{!! old('hint1',$question->hint_1) !!}</textarea>
                                    </div>
                                </div>
                                <div class="form-group chapter_review textarea multichoise">
                                    <label for="hint2" class="col-sm-3 control-label">Hint #2:</label>
                                    <div class="col-sm-9">
                                        <textarea id="hint2" name="hint2" class="form-control" 
                                                placeholder="Hint #2">{!! old('hint2',$question->hint_2) !!}</textarea>
                                    </div>
                                </div>
                                <div class="form-group chapter_review textarea multichoise">
                                    <label for="hint3" class="col-sm-3 control-label">Hint #3 (answer):</label>
                                    <div class="col-sm-9">
                                        <textarea id="hint3" name="hint3" class="form-control" 
                                                placeholder="Hint #3">{!! old('hint3',$question->hint_3) !!}</textarea>
                                    </div>
                                </div>
                                <div class="form-group chapter_review textarea multichoise">
                                    <div class="col-sm-offset-2 col-sm-4">
                                        <a class="btn btn-danger" href="{{ url('admin/questions') }}">
                                            Cancel
                                        </a>
                                        <button type="submit" class="btn btn-success">
                                            Edit Question
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
    <script src="{{asset('assets/vendors/tinymce/tinymce.min.js')}}" type="text/javascript"></script>
    <script  src="{{ asset('assets/vendors/ckeditor/js/ckeditor.js') }}"  type="text/javascript"></script>
    <script  src="{{ asset('assets/vendors/ckeditor/js/jquery.js') }}"  type="text/javascript" ></script>
    <script  src="{{ asset('assets/vendors/ckeditor/js/config.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/addquestion.js') }}"></script>
@stop