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
    	$file 								= $request->file('file');
    	$filePath							= $file->getPathName();
    	$name 								= $file->getClientOriginalName();
    	
    	$getID3								= new \getID3;
    	$analyze 							= $getID3->analyze($filePath);
    	$durationSec 						= $analyze["playtime_seconds"];
    	$duration 							= $analyze["playtime_string"];

    	$s3 								= new CloudKilat;
    	$response 							= $s3->store( $filePath, S3_VIDEO, $name);
    	$response['duration']   			= $duration;
    	$response['durationSec']   			= $durationSec;

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
			    		'playlists_video' 		=> $video['filename'],
			    		'playlist_video_url' 	=> $video['url'],
			    		'video_length' 			=> $video['duration'],
			    		'can_comment'			=> 1
			    	]) );

		\Session::forget('video');


		return \Redirect::back()->with('sc_msg','Successfuly Adding new Playlist');
    }

    public function destroy($courseId, $playlistId)
    {

		$playlist 		=	\App\Course::findOrFail($courseId)
							  ->playlists()
							  ->find($playlistId);
		$s3 			= new CloudKilat;
		$s3->delete( S3_VIDEO, $playlist->playlists_video );
		$playlist->delete();

		return \Redirect::back()->with('sc_msg','Successfuly Delete Playlist');
    }
}
