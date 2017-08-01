<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
	public function index(){
		$data['data']['allEmail'] 	= $this->getAllEmail();
		return view('pages.mails.compose', compact( 'data' ));
	}

	public function store(Request $request)
	{
		$subject		= $request->subject;
		$content 		= $request->content;

		$allEmail 		= $request->receipt;
		if( $request->everyone == 'on')
		{
			$allEmail 	= $this->getAllEmail();
		} 


		$this->dispatch( new \App\Jobs\SendEmail( $allEmail, $subject, $content ) );
	}

	public function getAllEmail()
	{
		$subcsriberEmail 		=	\App\Subscribe::pluck('email');

		$userEmail				=  \App\User::pluck('email');

		return $subcsriberEmail
				->merge($userEmail)
				->unique();
	}

	public function create()
	{
		$data['data']['allEmail'] 	= $this->getAllEmail();
		return view('pages.mails.compose', compact( 'data' ));
	}

	public function subscriberList()
	{
		return 3;
	}
}
