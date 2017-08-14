@extends('pages.interface.template')
@section('body')
<div class="col-md-12 course-banner" style="margin-top:0px;">
Learn New Things With SobatDev
</div>
<div class="col-md-12" style="padding:0px;background-color:#fff;">
	<div class="col-md-4" style="padding:15px;" align="center">
		<h3>
			<span class="glyphicon glyphicon-time"></span>
			<span>Stay Updated</span>
		</h3>
		<p>
			Get the updated course and playlists by subscribe us	
		</p>
	</div>
	<div class="col-md-4" style="padding:15px;" align="center">
		<h3>
			<span class="glyphicon glyphicon-book"></span>
			<span>Full Courses</span>
		</h3>
		<p>
			Fill with intersting and usefull courses
		</p>
	</div>
	<div class="col-md-4" style="padding:15px;" align="center">
		<h3>
			<span class="glyphicon glyphicon-play-circle"></span>
			<span>Video Learning</span>
		</h3>
		<p>
			Learning with video tutorial step by step
		</p>
	</div>
</div>

<div class="col-md-12" style="padding:5px;text-align:center;">
	@include('partials.notif')
</div>
<div class="container">

	<div class="col-md-12" align="center"><h4>Latest Courses</h4></div>
	@foreach($data['course'] as $index => $course)
	<a href="{{ url('detail/'.$course->id) }}">
	<div class="col-md-3" style="padding:15px;">
		<div class="col-md-12 shadow" style="padding:0px">
		<div class="col-md-12" style="padding:0px;">
			<div class="col-md-12 course-head">
				{{$course->levels()->first()->level_name}} 
			   @if($course->complete == 1)
					<span class="label label-success">Completed</span>
				@else
					<span class="label label-info">On Progressed</span>
				@endif

				
			</div>
			<div class="col-md-12 course-body">
			    <img src="http://s3.sobatdev.com.kilatstorage.com/files/course/{{$course->course_picture}}" class="course">
			</div>
		   	<div class="col-md-12 course-footer" style="padding:5px;">
		   		<div class="col-md-12" style="padding-bottom:5px;" align="center">
					<h4>
						{{$course->course_name}}<br>
						<span class="label label-warning">{{ $course->playlists()->count() }} VIDEO</span>
					</h4>
		   		</div>
		   	</div>
		</div>
		</div>
	</div>
	</a>
	@endforeach
</div>
@endsection