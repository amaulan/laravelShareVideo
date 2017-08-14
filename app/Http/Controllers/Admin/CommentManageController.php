<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentManageController extends Controller
{
    public function index()
	{
		$data[ 'comments' ] 						= \App\Comment::paginate(20);

		return view( 'pages.comments.list', compact( 'data' ) );
	}

	public function update(Request $request)
	{

		$comment 									= \App\Comment::find($request->id);

		$comment->is_blocked						= $request->is_blocked;

		$comment->save();

		if ($request->is_blocked == 1) {

			return \Redirect::to('admin/manage/comment')
					->with('sc_msg', 'Comment successfuly enabled');
		}

			return \Redirect::to('admin/manage/comment')
					->with('sc_msg', 'Comment successfuly Blocked');
	}

	public function detail(Request $request,$id)
	{
		$data['comments'] 							= \App\Comment::where('id',$id)
														->get();
														
		return view('pages.comments.detail_comment', compact('data'));
	}
}
