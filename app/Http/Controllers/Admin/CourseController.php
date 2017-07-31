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
		$data['pages']['title'] 	= 'My Course';
		$data['pages']['active']	= 'my-course';

		$data['courses']			=	\App\Course::paginate(20);

		return view( 'pages.courses.list', compact( 'data' ));
	}

	public function create()
	{
		$data['pages']['title'] 	= 'My Course';
		$data['pages']['active']	= 'my-course';

		$data['data']['levels']		= \App\Level::all();
		$data['data']['categories'] = \App\Category::all();

		return view( 'pages.courses.create', compact( 'data' ) );
	}

	public function store(Request $request)
	{
		$userId 					= \Auth::user()->id;
		$request 					= $request->all();
		$request['user_id']			= $userId;
		$data 						= collect($request)->map(function($i){
			if($i == 'on')
				return 1;
			elseif($i == 'off')
				return 0;
			else
				return $i;

		})->toArray();

		\DB::transaction( function() use($data){

			$store 						= \App\Course::create($data)
										   ->categories()
										   ->attach( $data['category_id'] );
		});

		
	}
}
