<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Helpers\CloudKilat;

class PlaylistController extends Controller
{
    public function index($courseId)
    {
    	$data['playlists'] 		= \App\Course::findOrFail($courseId)->playlists()->get();

    	return view( 'pages.playlist.list', compact( 'data' ) );

    }

    public function storeVideo(Request $request)
    {
    	// return $request->all();
    	$file 					= $request->file('file');
    	$filePath				= $file->getPathName();
    	$name 					= $file->getClientOriginalName();
    	
    	$s3 =					new CloudKilat;
    	$response 				= $s3->store( $filePath, S3_VIDEO, $name);

    	\Session::put('video',	$response);

    	return $response;

    }

    public function store(Request $request)
    {
    	$video 					= \Session::get('video');
    	$courseId 				= $request->segment(4);

    	\App\Course::findOrFail( $courseId )
			    	 ->playlists()
			    	 ->save( new \App\Playlist([
			    		'playlists_name' 		=> $request->playlist_name,
			    		'playlists_video' 		=> "test video.mp4",
			    		'playlist_video_url' 	=> $video['url'],
			    		'video_length' 			=> '90:11',
			    		'can_comment'			=> 1
			    	]) );
    }
}
