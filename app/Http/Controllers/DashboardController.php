<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
	public function index()
	{
		$data['new_comments']				= \App\Comment::orderBy('crated_at','desc')->limit(7)->get()
		return view( 'pages.dashboard', compact('data'));
	}
}
