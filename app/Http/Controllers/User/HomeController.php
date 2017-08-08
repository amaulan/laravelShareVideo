<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
    	$data['course']						=	\App\Course::paginate(8);
    	return view('pages.interface.home', compact('data'));
    }
    public function detail(Request $request,$id)
    {
    	$data['playlist']						=	\App\Playlist::where('course_id',$id)->get();
    	return view('pages.interface.list_playlist', compact('data'));
    }
    public function watch(Request $request,$id)
    {
    	$data['video']							=	\App\Playlist::where('id',$id)->get();
    	$data['comment']						=	\App\Comment::where('playlist_id',$id)->get();
    	return view('pages.interface.video_list', compact('data'));
    }
}
