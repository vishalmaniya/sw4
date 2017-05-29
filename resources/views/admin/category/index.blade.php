@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Categories List
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
    <h1>Categories</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Categories</li>
        <li class="active">Categories</li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h4 class="panel-title"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Categories List
                </h4>
            </div>
            <br />
            <div class="panel-body">
                <table class="table table-bordered " id="table">
                    <thead>
                        <tr class="filters">
                            <th>Name</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($category as $categorys)
                    	<tr>
                            <td>{!! $categorys->name !!}</td>
                            <td>{!! $categorys->created_at->diffForHumans() !!}</td>
                            <td>
                                <a href="{{ route('category.edit', $categorys->id) }}" style="float: left;"><i class="livicon" data-name="category"
                                    data-size="18" data-loop="true"
                                    data-c="#428BCA"
                                    data-hc="#428BCA"
                                    title="update user"></i></a>
                                <form action="{{ route('category.destroy', $categorys->id) }}" method="POST" id="form-id-{{ $categorys->id }}" style="width: 6%;float: left;">
                                    <!-- CSRF Token -->
                                    <input type="hidden" name="_method" value="DELETE"/>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <a onclick="document.getElementById('form-id-{{ $categorys->id }}').submit();"><i class="livicon" data-name="category-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete Category"></i></a>
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