<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
	private $userId;

	public function __construct()
	{
		// $this->userId 				= \Auth::user()->id;
	}

	public function index()
	{
		return view( 'pages.courses.list' );
	}

	public function myCourse()
	{
		$userId 					=  \Auth::user()->id;
		$data['pages']['title'] 	= 'My Course';
		$data['pages']['active']	= 'my-course';

		$data['courses']			=	\App\Course::where('user_id', $userId)->paginate(20);

		return view( 'pages.courses.list', compact( 'data' ));
	}

	public function allCourse()
	{

	}
}
