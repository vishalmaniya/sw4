@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Courses To Teacher
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
        <h1>Add Courses To Teacher</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                    Dashboard
                </a>
            </li>
            <li>Courses To Teacher</li>
            <li class="active">Add Courses To Teacher</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                            Add Courses To Teacher
                        </h3>
                        <span class="pull-right clickable">
                            <i class="glyphicon glyphicon-chevron-up"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <!-- errors -->
                        <div class="has-error">
                            {!! $errors->first('courses_id', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('users_id', '<span class="help-block">:message</span>') !!}
                        </div>
                        <!--main content-->
                        <form id="commentForm" action="{{ route('courses_to_teacher') }}"
                                method="POST" enctype="multipart/form-data" class="form-horizontal">
                              <!-- CSRF Token -->
                              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                              <div class="form-group">
                                  <label for="courses_id" class="col-sm-2 control-label">Courses: *</label>
                                  <div class="col-sm-10">
                                      <select name="courses_id" class="form-control" id="courses_id">
                                          <option value="">Select Courses</option>
                                          @foreach($courses as $course)
                                          <option value="{{ $course->id }}" @if(old('courses_id') == $course->id){{ 'selected' }}@endif >{{ $course->name }}</option>
                                          @endforeach
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="users_id" class="col-sm-2 control-label">Teacher: *</label>
                                  <div class="col-sm-10">
                                      <select name="users_id" class="form-control" id="users_id">
                                          <option value="">Select Teacher</option>
                                          @foreach($users as $user)
                                          <option value="{{ $user->pivot->user_id }}" @if(old('users_id') == $user->pivot->user_id){{ 'selected' }}@endif>{{ $user->name }}</option>
                                          @endforeach
                                      </select>
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
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                            Courses To Teacher
                        </h3>
                        <span class="pull-right clickable">
                            <i class="glyphicon glyphicon-chevron-up"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <!--main content-->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Courses</th>
                                    <th>Teacher</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($coursesToTeacher as $join)
                                <tr>
                                    <td>{{ $join->courses->name }}</td>
                                    <td>{{ $join->teacher->name }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--row end-->
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
@stop