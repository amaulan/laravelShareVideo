<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminManageController extends Controller
{

	public function __construct()
	{
		$this->routeUri 							= route( 'admin' );
	}

    public function index()
	{
		$data[ 'admins' ] 							= \App\User::where('role_id',2)->paginate(20);

		return view( 'pages.admins.list', compact( 'data' ) );
	}
	public function create()
	{
		return view('pages.admins.create_admin');
	}
	public function store(Request $request)
	{

		$data										= $request->all();
		$validator = \Validator::make($data, [//->Memanggil class Validator dan mengambil semua data inputan
            'username' 								=> 'required|string|max:50|min:3|unique:users',
            'email' 								=> 'required|string|email|unique:users',
            'password' 								=> 'required|string|max:50|min:8',
            'user_github' 							=> 'required|string|max:50|min:3|unique:users'//->Memfilter data dari inputan
        ]);

		if ($validator->fails()) {
			return \Redirect::back()->with(ERR_MSG, $validator->errors()->all() )->withInput($data);
		}

		$user 										= new \App\User;
		$user->username 							= $request->username;
		$user->email 								= $request->email;
		$user->password 							= bcrypt($request->password);
		$user->user_github 							= $request->user_github;
		$user->role_id 								= 2;
		$user->status 								= 1;
		$user->save();
		return \Redirect::to('admin/manage/admin')
					->with('sc_msg', 'Admin successfuly added');;
	}
	public function edit(Request $request)
	{
		$admin 										= \App\User::where('id',$request->id)->get();
		return view('pages.admins.edit_admin', compact('admin'));
	}
	public function update(Request $request,$id)
	{

		$data										= $request->all();
		$validator = \Validator::make($data, [//->Memanggil class Validator dan mengambil semua data inputan
            'username' 								=> 'required|string|max:50|min:3|unique:users',
            'email' 								=> 'required|string|email',
            'user_github' 							=> 'required|string|max:50|min:3'//->Memfilter data dari inputan
        ]);

        if ($validator->fails()) {
			return \Redirect::back()->with(ERR_MSG, $validator->errors()->all() )->withInput($data);
		}

		$admin 										= \App\User::find($request->id);

		$admin->username							= $request->username;
		$admin->email								= $request->email;
		$admin->user_github							= $request->user_github;

		$admin->save();
		return \Redirect::to('admin/manage/admin')
					->with('sc_msg', 'Admin successfuly edited');;
		
	}	
	public function edited(Request $request)
	{

		$edit 										= Category::find($request->id);

		$edit->category_name						= $request->category_name;
		$edit->category_color						= $request->category_color;

		$edit->save();

			return \Redirect::to('admin/manage/category')
					->with('sc_msg', 'Category successfuly edited');
	}
	public function destroy($id)
	{
		$model 										= \App\User::find($id);
		$model->delete();

		return \Redirect::to( $this->routeUri )
						  ->with( SC_MSG, 'Admin successfuly Deleted');

	}
	public function dummy()
   	{
            $data['email']    						= 'yakub@gmail.com';
            $data['user_github']    				= 'yakub1305';
            $data['username'] 						= 'yakub al fariz';
            $data['password'] 						= bcrypt('yakub123');
            $data['role_id']  						= 3;
    
     \App\User::create($data);
   }
}
