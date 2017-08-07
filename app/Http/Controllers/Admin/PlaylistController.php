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

    	return view( 'pages.playlist.list',compact('data'));

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

    public function edit(Request $request,$id)
    {
        $data      = \App\Playlist::where('id',$request->id)->get();

        return view( 'pages.playlist.edit', compact('data') );
    }
    public function update(Request $request,$courseId, $playlistId)
    {

        $validator = \Validator::make($request->all(), [//->Memanggil class Validator dan mengambil semua data inputan
            'playlists_name'                         => 'required|string|max:50|min:2',
        ]);

        if ($validator->fails()) {
        return \Redirect::back()->with(ERR_MSG, $validator->errors()->all() )
                    ->withInput($request->all());
        }

        $playlists                                      = \App\Playlist::find($playlistId);

        $playlists->playlists_name                      = $request->playlists_name;

        $playlists->save();
            return \Redirect::to('admin/manage/course/'.$courseId.'/playlist/')
                    ->with('sc_msg', 'Playlist successfuly edited');
    }

    public function commentar(Request $request)
    {
        $playlists                                   = \App\Playlist::find($request->id);

        $playlists->can_comment                      = $request->can_comment;

        $playlists->save();
        if ($request->can_comment == 1) {
            return \Redirect::back()
                    ->with('sc_msg', 'Playlist successfuly enabled comment');
        }
            return \Redirect::back()
                    ->with('err_msg', 'Playlists successfuly disabled comment');
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
