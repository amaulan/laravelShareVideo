<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;//->Memanggil class Auth


class DashboardController extends Controller
{

	public function __construct()
	{
		$this->routeUri 							= 'dashboard';
	}

	public function index()
	{			
		$data['route']								= $this->routeUri;
		$data['new_comments']						= \App\Comment::orderBy('created_at','desc')->limit(5)->get();

		$data['total_subscribe']					= \App\Subscribe::all();
		$data['subscribe']							= \App\Subscribe::where('is_read','=',0)->orderBy('id','desc');
		$data['new_subscribes']						= $data['subscribe']->limit(5)->get();

		$data['total_feedback']						= \App\Feedback::all();
		$data['feedback']							= \App\Feedback::where('is_read','=',0)->orderBy('id','desc');
		$data['new_feedbacks']						= $data['feedback']->limit(5)->get();

		$data['total_course']						= \App\Course::all();
		$data['top_course']							= \DB::select("select courses.course_name,courses.id,count(playlists.id)as total from courses,playlists where courses.id=playlists.course_id group by courses.id order by total limit 3");

		$data['total_playlist']						= \App\Playlist::all();
		$data['top_playlist']						= \DB::select("select playlist_name,count(playlist_name) as total from watches group by playlist_name order by total limit 6");

		$data['total_user']							= \App\User::all();
		return view( 'pages.dashboard', compact('data'));
	}
}
