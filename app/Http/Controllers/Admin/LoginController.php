<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\User;

require_once 'resources/org/code/Code.class.php';

class LoginController extends Controller
{
    public function login()
	{
		if($input = input::all()){
			$code = new \Code;
			$_code = $code->get();
			if(strtoupper($input['code'])!=$_code){
				return back()->with('msg','验证码错误!');
			}
			
			$user = User::first();
			$username = $user->user_name;
			$userpass = $user->user_pass;
			if( $username != $input['user_name'] || Crypt::decrypt( $userpass ) != $input['user_pass'] ){
				return back()->with( 'msg','用户名或者密码错误' );
			}
			
			session(['user'=>$user]);
			
			return redirect( 'admin' );
			
		}else{
			// session(['user'=>null]);
			return view('admin.login');
		}
	} 
	
	public function quit()
	{
		session(['user'=>null]);
		return redirect('admin/login');
	}
	
	public function code()
	{
		$code = new \Code;
		$code->make();
	}
	
	
	
	public function getcode()
	{
		$code = new \Code;
		echo $code->get();
	}
}
