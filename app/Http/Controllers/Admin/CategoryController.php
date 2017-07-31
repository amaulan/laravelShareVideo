<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;

class CategoryController extends Controller
{
	public function index()
	{
		$data[ 'categories' ] 						= Category::paginate(2);

		return view( 'pages.categories.list', compact( 'data' ) );
	}
}
