<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //->Memanggil class Request
use Illuminate\Support\Facades\Auth;//->Memanggil class Auth
use App\Todo;//->Memanggil Model Todo
use App\Todouser;//->Memanggil Model Todouser
use DB;//->Memanggil class DB
use Validator;//->Memanggil class Validator
use App\User;//->Memanggil class User
use Session;//->Memanggil class Session
use Mail;
use App\Mail\SendMail;

class AdminController extends Controller
{
    public function index()
    {
    	if (\Session::has('inlogin')) {
    		return view('theme.index');
    	}
    	return redirect('login');

    }
}