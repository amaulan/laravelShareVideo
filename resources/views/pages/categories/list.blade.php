@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Category Page</h3>
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
			<a href="{{ url('admin/manage/category/create') }}" class="btn btn-success">
			<i class="fa fa-plus"></i> ADD
			</a>
			</h4>
			<table class="table table-bordered">
				<thead class="cf">
					<tr>
						<th>No</th>
						<th>Category</th>
						<th class="text-center hidden-phone">Color</th>
						<th class="text-center hidden-phone">Total Course</th>
						<th class="text-center">Status</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $data['categories'] as $index => $category )
					<tr @if($category->is_enabled != 1) style="background: #aeb2b7" @endif>
						<td data-title="No">{{ ++$index }}</td>
						<td data-title="Category">{{ $category->category_name }}</td>
						<td class="text-center hidden-phone"><span class="label" style="background: {{ $category->category_color }}"><strong>{{ $category->category_color }}</strong></span></td>
						<td class="text-center hidden-phone">
							<strong>{{ $category->courses()->count() }}</strong>
						</td>
						<td class="text-center">
							@if($category->is_enabled != 1)
								<span class="badge bg-theme04">{{ DISABLE_TEXT }}</span>
							@else
								<span class="badge bg-theme02">{{  ENABLE_TEXT }}</span>
								@endif
						</td>
						<td class="text-center" data-title="Price">
							@if($category->is_enabled != 1)
								<a href="{{ url('admin/manage/category/update') }}?id={{$category->id}}&is_enable=1" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top"><i class="fa fa-check"></i></a>
							@else
								<a href="{{ url('admin/manage/category/update') }}?id={{$category->id}}&is_enable=0" class="btn btn-danger btn-xs"><i class="fa fa-ban"></i></a>
							@endif
							<a href="{{ url('admin/manage/category/edit') }}?id={{$category->id}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
				{{ $data['categories']->render() }}
			</div>
			</div><!-- /content-panel -->
			</div><!-- /col-lg-12 -->
			</div><!-- /row -->
			@endsection