<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;

class CategoryController extends Controller
{
	public function index()
	{
		$data[ 'categories' ] 						= Category::paginate(20);

		return view( 'pages.categories.list', compact( 'data' ) );
	}

	public function create()
	{
		return view('pages.categories.create_category');
	}

	public function created(Request $request)
	{

		$validator = \Validator::make($request->all(), [//->Memanggil class Validator dan mengambil semua data inputan
            
            'category_name' 						=> 'required|string|max:50|min:2|unique:categories',
            'category_color' 						=> 'required|string|max:50|min:2|unique:categories',//->Memfilter data dari inputan
        
        ]);

		if ($validator->fails()) {

			return \Redirect::to('admin/manage/category/create')
					->withErrors($validator)
					->withInput();
		}

		$category 									= new Category;

		$category->category_name 					= $request->category_name;
		$category->category_color 					= $request->category_color;

		$category->save();

		return \Redirect::to('admin/manage/category')
					->with('sc_msg', 'Category successfuly added');;
	}

	public function update(Request $request)
	{

		$category 									= Category::find($request->id);

		$category->is_enabled						= $request->is_enable;

		$category->save();

		if ($request->is_enable == 1) {

			return \Redirect::to('admin/manage/category')
					->with('sc_msg', 'Category successfuly enabled');
		}

			return \Redirect::to('admin/manage/category')
					->with('sc_msg', 'Category successfuly disabled');
	}

	public function edit(Request $request)
	{
		$category 									= Category::where('id',$request->id)
														->get();

		return view('pages.categories.edit_category', compact('category'));
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
}
