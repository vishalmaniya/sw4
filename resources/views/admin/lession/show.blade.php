@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
View Lession Details
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <!--section starts-->
        <h1>Lession</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">Lessions</a>
            </li>
            <li class="active">Lession</li>
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
                            <td>{{ $lession->name }}</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>{{ $lession->description }}</td>
                        </tr>
                        <tr>
                            <td>Course</td>
                            <td>{{ $lession->chapter->course->name }}</td>
                        </tr>
                        <tr>
                            <td>Chapter</td>
                            <td>{{ $lession->chapter->name }}</td>
                        </tr>
                        <tr>
                            <td>Video URL</td>
                            <td>{{ $lession->video_url }}</td>
                        </tr>
                        <tr>
                            <td>Video Length</td>
                            <td>{{ $lession->video_length }}</td>
                        </tr>
                        <tr>
                            <td>Video Width</td>
                            <td>{{ $lession->video_width }}</td>
                        </tr>
                        <tr>
                            <td>Video Height</td>
                            <td>{{ $lession->video_height }}</td>
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
@stop