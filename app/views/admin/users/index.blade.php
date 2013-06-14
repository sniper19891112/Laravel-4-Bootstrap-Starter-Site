@extends('admin/layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('admin/user/title.user_management') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h3>
		User Management

		<div class="pull-right">
			<a href="{{{ URL::to('admin/users/create') }}}" class="btn btn-small btn-info iframe"><i class="icon-plus-sign icon-white"></i> Create</a>
		</div>
	</h3>
</div>

<table id="users" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th class="span2">{{{ Lang::get('admin/users/table.username') }}}</th>
			<th class="span3">{{{ Lang::get('admin/users/table.email') }}}</th>
			<th class="span3">{{{ Lang::get('admin/users/table.roles') }}}</th>
			<th class="span2">{{{ Lang::get('admin/users/table.activated') }}}</th>
			<th class="span2">{{{ Lang::get('admin/users/table.created_at') }}}</th>
			<th class="span2">{{{ Lang::get('table.actions') }}}</th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>

@stop

{{-- Scripts --}}
@section('scripts')
<script type="text/javascript">
	$(document).ready(function() {
		$('#users').dataTable( {
			"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
			"sPaginationType": "bootstrap",
			"oLanguage": {
				"sLengthMenu": "_MENU_ records per page"
			},
			"bProcessing": true,
	        "bServerSide": true,
	        "sAjaxSource": "/admin/users/data",
	        "fnDrawCallback": function ( oSettings ) {
           		$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
     		}
		});
	});
</script>
@stop
