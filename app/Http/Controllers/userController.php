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

class userController extends Controller
{
   public function login()
   {
   		\Session::flush();
   		return view('theme.login');
   }

   public function inlogin(Request $request)
   {
   			$email 			= $request->email;//->Mengambil data dengan class Request dan memasukan ke variable
            $password 		= $request->password;//->Mengambil data dengan class Request dan memasukan ke variable
            if (Auth::attempt([
            	'email' 	=> $email,
            	'password' 	=> $password])) {//Melakukann proses authentication dari table user
                $status 	= User::where('email',$request->email)->orderBy('id','desc')->get();
                foreach ($status as $status) {
                    $status->status;
                    $status->role_id;
                }
                if ($status->status == 0) {
                    \Session::flash('notverified','Please Verified Your Email');//->Memanggil class Session agar dapat menampilan notifikasi
                
                    return redirect('/login');
                }
                    \Session::flash('login','Login Success');//->Memanggil class Session agar dapat menampilan notifikasi
                    \Session::put('inlogin',1);
                    return redirect('/admin');//->Mengalihkan ke halaman awal  
                
            }
                \Session::flash('notlogin','Login Failed');//->Memanggil class Session agar dapat menampilan notifikasi
                return redirect('/login');//->Mengalihkan ke halaman login
            
   }
}
