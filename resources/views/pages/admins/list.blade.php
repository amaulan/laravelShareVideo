@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Admin Page</h3>
<div class="row mt">
	<div class="col-lg-12">
		<p>Place your content here.</p>
	</div>
</div>

@include('partials.notif')

<div class="row mt">
	<div class="col-lg-12">
		<div class="content-panel">
			<h4 class="">
			<a href="{{ url('admin/manage/admin/create') }}" class="btn btn-success">
			<i class="fa fa-plus"></i> ADD
			</a>
			</h4>
			<table class="table table-bordered">
				<thead class="cf">
					<tr>
						<th>No</th>
						<th>Username</th>
						<th class="hidden-phone">Email</th>
						<th class="hidden-phone">Admin Github</th>
						<th class="text-center">Total Course</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $data['admins'] as $index => $admin )
					<tr>
						<td data-title="No">{{ ++$index }}</td>
						<td data-title="Level">{{ $admin->username }}</td>
						<td data-title="Username" class="hidden-phone">{{ $admin->email }}</td>
						<td data-title="Github" class="hidden-phone">{{ $admin->user_github }}</td>
						<td class="text-center">
							<strong>{{ $admin->courses()->count() }}</strong>
						</td>
						<td class="text-center" data-title="Price">
							<a href="{{ url('admin/manage/admin/edit/'.$admin->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
							<a href="{{ url('admin/manage/admin/destroy/'.$admin->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
				{{ $data['admins']->render() }}
			</div>
			</div><!-- /content-panel -->
			</div><!-- /col-lg-12 -->
			</div><!-- /row -->
			@endsection