<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
	public function index(){
		$data['data']['allEmail'] 					= 	$this->getAllEmail();

		return view('pages.mails.compose', compact( 'data' ));
	}

	public function store(Request $request)
	{
		$subject									= 	$request->subject;
		$content 									= 	$request->content;

		$allEmail 									= 	$request->receipt;
		if( $request->everyone == 'on')
		{

			$allEmail 								= 	$this->getAllEmail();
		} 

		$this->sendMail( $allEmail, $subject, $content );

		return \Redirect::back()
				->with('sc_msg', 'Successfuly Send Email');
	}

	public function sendMail( $allMail, $subject, $content )
	{
		collect($allMail)->each(function($receiver) use($allMail, $subject, $content) {
			$this->dispatch( new \App\Jobs\SendEmail( $receiver, $subject, $content ) );
		});
	}

	public function getAllEmail()
	{
		$subcsriberEmail 							=	\App\Subscribe::pluck('email');

		$userEmail									=  \App\User::pluck('email');

		return $subcsriberEmail
				->merge($userEmail)
				->unique();
	}

	public function create()
	{
		$data['data']['allEmail'] 					= 	$this->getAllEmail();

		return view('pages.mails.compose', compact( 'data' ));
	}

	public function subscriberList()
	{
		$subscribe 									= \App\Subscribe::where('is_read','=',0)
														->update(['is_read'=>1]);

		$data['subscribes']							=	\App\Subscribe::paginate(20);

		return view('pages.subcriber.list', compact( 'data' ));
	}
	
	public function feedbackList()
	{
		$feedback 									= \App\Feedback::where('is_read','=',0)
														->update(['is_read'=>1]);

		$data['feedbacks']							=	\App\Feedback::paginate(20);

		return view('pages.feedbacks.list', compact( 'data' ));
	}
}
