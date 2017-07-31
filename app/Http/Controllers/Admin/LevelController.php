<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LevelController extends Controller
{
	
	private $routeUri;

	public function __construct()
	{
		$this->routeUri 							= route( 'level' );
	}

	public function index()
	{
		$data['levels'] 							= \App\Level::paginate(20);

		return view( 'pages.levels.list', compact( 'data' ) );
	}

	public function create()
	{
		#return view( '' )
	}

	public function store(Request $request)
	{
		$data 										= $request->only( 'level_name' );
		$validation 								= \Validator::make( $data , [
				'level_name' 						=> "required|min:3|max:30"
		]);

		if ($validation->fails())
			return \Redirect::back()->with( ERR_MSG, $validation->errors()->all() )->withInput( $data );

		\App\Level::create( $data );

		return \Redirect::to( $this->routeUri )
						->with( SC_MSG, 'Successfuly Created');;
	}

	public function edit($id)
	{
		$data['level'] 								= \App\Level::findOrFail($id);

		// return view( 'pages.levels.list', compact( 'data' ) );
	}

	public function update(Request $request, $id)
	{
		$model 										= \App\Level::findOrFail($id);

		$data 										= $request->only( 'level_name' );
		$validation 								= \Validator::make( $data , [
				'level_name' 						=> "required|min:3|max:30"
		]);

		if ($validation->fails())
			return \Redirect::back()->with( ERR_MSG, $validation->errors()->all() )->withInput( $data );

		$model->update( $data );

		return \Redirect::to( $this->routeUri )
						  ->with( SC_MSG, 'Successfuly Updated');

	}

	public function destroy($id)
	{
		$model 										= \App\Level::findOrFail($id);
		$model->destroy();

		return \Redirect::to( $this->routeUri )
						  ->with( SC_MSG, 'Successfuly Deleted');

	}
}
