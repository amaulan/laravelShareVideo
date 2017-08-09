@extends('pages.interface.template')
@section('body')

<div class="col-md-12" style="padding:5px;text-align:center;">
	@include('partials.notif')
</div>
	@foreach($data['course'] as $index => $course)

	<div class="col-md-3" style="padding:15px;">
		<div class="col-md-12" style="padding:0px;">
			<div class="col-md-12 course-head">
				{{$course->levels()->first()->level_name}} 
			   @if($course->complete == 1)
					<span class="label label-success">Completed</span>
				@else
					<span class="label label-info">On Progressed</span>
				@endif

				<span class="label label-warning">{{ $course->playlists()->count() }} VIDEO</span>
			</div>
			<div class="col-md-12 course-body">
			    <img src="http://s3.sobatdev.com.kilatstorage.com/files/course/{{$course->course_picture}}" class="course">
			</div>
		   	<div class="col-md-12 course-footer" style="padding:5px;">
		   		<div class="col-md-12" style="padding:0px;">
					{{$course->course_name}}
		   			@php
						$course->categories()->get()->each(function($category){
					@endphp
						<span class="label" style="background: {{ $category->category_color }}">{{ $category->category_name }}</span>
					@php	
						});
					@endphp
					
		   		</div>
				<div class="col-md-12" align="center" style="padding:10px;">
					<a href="{{ url('detail/'.$course->id) }}" class="btn btn-success btn-sm col-md-12">Visit Course</a>
				</div>
		   	</div>
		</div>
	</div>

	@endforeach

@endsection