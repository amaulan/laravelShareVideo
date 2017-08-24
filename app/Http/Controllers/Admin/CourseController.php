<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Helpers\CloudKilat;


class CourseController extends Controller
{
	private $userId;

	public function index()
	{
		return view( 'pages.courses.list' );
	}

	public function myCourse()
	{
		$userId 									=  	\Auth::user()->id;
		$data['pages']['title'] 					= 	'My Course';
		$data['pages']['active']					= 	'my-course';
		$data['course_picture']						= 	new CloudKilat;

		$data['courses']							=	\App\Course::where('user_id', $userId)
															->paginate(20);

		return view( 'pages.courses.list', compact( 'data' ));
	}

	public function allCourse()
	{
		$data['pages']['title'] 					= 	'All Course';
		$data['pages']['active']					= 	'my-course';

		$data['courses']							=	\App\Course::paginate(20);

		return view( 'pages.courses.list', compact( 'data' ));
	}

	public function create()
	{
		$data['pages']['title'] 					= 'My Course';
		$data['pages']['active']					= 'my-course';

		$data['data']['levels']						= \App\Level::all();
		$data['data']['categories'] 				= \App\Category::all();

		return view( 'pages.courses.create', compact( 'data' ) );
	}

	public function store(Request $request)
	{
		$request									=	$request->all();

		$validator = \Validator::make($request, [//->Memanggil class Validator dan mengambil semua data inputan
            
            'course_name' 							=> 'required|string|max:50|min:2',
            'course_desc' 							=> 'required|string|max:255|min:2',
            'course_picture' 						=> 'required|file|image',
            'level_id' 								=> 'required|max:50',//->Memfilter data dari inputan
            'category_id' 							=> 'required|max:50',//->Memfilter data dari inputan
            'playlist_add' 							=> 'required|integer'//->Memfilter data dari inputan
        
        ]);

        if ($validator->fails()) {

			return \Redirect::back()
					->with(ERR_MSG, $validator->errors()->all() )
					->withInput($request);
		}

		$file 										= $request['course_picture'];
    	$filePath									= $file->getPathName();
    	$picture 									= $file->getClientOriginalName();
    	$picture2 									= str_replace([':', '\'', '/', '*','!','@','#',' ','%','^','&','(',')','_','+','|'],'', $picture);
    	$name 										= strtolower($picture2);

    	$s3 										= new CloudKilat;
    	$response 									= $s3->store( $filePath, S3_COURSE, $name);

		$userId 									= \Auth::user()->id;
		$request['user_id']							= $userId;
		$request['course_picture']					= $name;
		$data 										= collect($request)
														->map(function($i){

			if($i == 'on')
				return 1;
			elseif($i == 'off')
				return 0;
			else
				return $i;

		})->toArray();

		\DB::transaction( function() use($data){

			$store 									= \App\Course::create($data)
										   				->categories()
										  				->attach( $data['category_id'] );
		});

		return \Redirect::to( 'admin/manage/course/me' )
				->with( SC_MSG, 'Course successfuly added');

		
	}
}
