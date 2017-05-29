@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
View Question Details
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <!--section starts-->
        <h1>Question</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">Questions</a>
            </li>
            <li class="active">Question</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <h4>Question : {!! $questions->question_join->question !!}</h4>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-3">
                   Description :  
                </div>
                <div class="col-lg-9">
                   {!! $questions->description !!} 
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-3">
                    Answer : 
                </div>
                <div class="col-lg-9">
                    {!! $questions->question_join->answer !!}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-3">
                    Answer Option : 
                </div>
                <div class="col-lg-9">
                    Option 1 : {{ $questions->question_join->option->option1 }}<br/>
                    Option 2 : {{ $questions->question_join->option->option2 }}<br/>
                    Option 3 : {{ $questions->question_join->option->option3 }}<br/>
                    Option 4 : {{ $questions->question_join->option->option4 }}<br/>
                    Option 5 : {{ $questions->question_join->option->option5 }}<br/>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-3">
                    Correct Point : 
                </div>
                <div class="col-lg-9">
                    {{ $questions->question_join->point_correct }}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-3">
                    Deduct In Correct Point : 
                </div>
                <div class="col-lg-9">
                    {{ $questions->question_join->point_incorrect }}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-3">
                    Deduct Hint Point : 
                </div>
                <div class="col-lg-9">
                    {{ $questions->hint_point }}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-3">
                    Hint 1 : 
                </div>
                <div class="col-lg-9">
                    {{ $questions->hint_1 }}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-3">
                    Hint 2 : 
                </div>
                <div class="col-lg-9">
                    {{ $questions->hint_2 }}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-3">
                    Hint 3 : 
                </div>
                <div class="col-lg-9">
                    {{ $questions->hint_3 }}
                </div>
            </div>
        </div>
    </section>

@stop

{{-- page level scripts --}}
@section('footer_scripts')
<!-- Bootstrap WYSIHTML5 -->
@stop