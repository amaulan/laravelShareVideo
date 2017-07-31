@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Category Page</h3>
<div class="row mt">
	<div class="col-lg-12">
		<p>Place your content here.</p>
	</div>
</div>
<div class="row mt">
	<div class="col-lg-12">
		<div class="content-panel">
			<h4 class="">
			<button class="btn btn-success">
			<i class="fa fa-angle-right"></i> No More Table
			</button>
			</h4>
			<table class="table table-bordered">
				<thead class="cf">
					<tr>
						<th>No</th>
						<th>Category</th>
						<th class="text-center">Color</th>
						<th class="text-center">Total Course</th>
						<th class="text-center">Status</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $data['categories'] as $index => $category )
					<tr @if($category->is_enabled != 1) style="background: #aeb2b7" @endif>
						<td data-title="No">{{ ++$index }}</td>
						<td data-title="Category">{{ $category->category_name }}</td>
						<td class="text-center"><span class="label" style="background: {{ $category->category_color }}"><strong>{{ $category->category_color }}</strong></span></td>
						<td class="text-center">
							<strong>100</strong>
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
								<button class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top"><i class="fa fa-check"></i></button>
							@else
								<button class="btn btn-danger btn-xs"><i class="fa fa-ban"></i></button>
							@endif
							<button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
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