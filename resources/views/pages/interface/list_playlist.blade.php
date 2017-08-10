@extends('pages.interface.template')
@section('body')

	@foreach($data['playlist'] as $index => $playlist)

	<div class="container">
		<div class="col-md-12 list">
		  	<div class="col-md-9" align="center" style="padding:5px;">
		  		<span>{{$playlist->playlists_name}}</span>
		  	</div>
		  	<div class="col-md-1" align="center" style="padding:5px;">
		  		{{$playlist->video_length}}
		  	</div>
		  	<div class="col-md-2" align="center">
		  		<a class="btn btn-success btn-sm" href="{{url('watch/'.$playlist->id)}}?course_id={{$playlist->course_id}}&playlist_name={{$playlist->playlists_name}}">Watch</a>
		  	</div>
		</div>
	</div>

	@endforeach

@endsection