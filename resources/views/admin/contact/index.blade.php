@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Comment From User List
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Comment From User</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Comment From User</li>
        <li class="active">Comment From User</li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h4 class="panel-title"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Comment From User List
                </h4>
            </div>
            <br />
            <div class="panel-body">
                <table class="table table-bordered " id="table">
                    <thead>
                        <tr class="filters">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Comment Type</th>
                            <th>Comment</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($contact as $con)
                    	<tr>
                            <td>{!! $con->name !!}</td>
                            <td>{!! $con->email !!}</td>
                            <td>{!! $con->phone !!}</td>
                            <td>{!! $con->comment_type !!}</td>
                            <td>{!! $con->comment !!}</td>
                            <td>{!! $con->created_at->diffForHumans() !!}</td>
                            <td>
                                <form action="{{ route('contact.destroy', $con->id) }}" method="POST" id="form-id-{{ $con->id }}" style="width: 6%;float: left;">
                                    <!-- CSRF Token -->
                                    <input type="hidden" name="_method" value="DELETE"/>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <a onclick="document.getElementById('form-id-{{ $con->id }}').submit();"><i class="livicon" data-name="Contact-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete Contact"></i></a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>    <!-- row-->
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}" ></script>

<script>
$(document).ready(function() {
	$('#table').DataTable();
});
</script>

<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
    <div class="modal-dialog">
    	<div class="modal-content"></div>
    </div>
</div>
<script>
$(function () {
	$('body').on('hidden.bs.modal', '.modal', function () {
		$(this).removeData('bs.modal');
	});
});
</script>
@stop