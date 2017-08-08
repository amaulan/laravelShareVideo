@extends('pages.interface.template')
@section('body')

	<div class="col-md-12" style="padding:0px;">
		<div class="col-md-9">
			<div class="col-md-12">
				@foreach($data['video'] as $index => $video)
				<video width="100%" controls>
				  <source src="http://s3.sobatdev.com.kilatstorage.com/files/videos/{{$video->playlists_video}}">
				  <source src="http://s3.sobatdev.com.kilatstorage.com/files/videos/{{$video->playlists_video}}">
				  Your browser does not support HTML5 video.
				</video>
				<h3>{{ $video->courses()->first()->course_name }} - {{$video->playlists_name}}</h3>
				@endforeach
			</div>
			<div class="col-md-12">hhhhhhhhh</div>
		</div>
		<div class="col-md-3"></div>
	</div>

@endsection