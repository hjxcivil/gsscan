<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    //图片上传
	public function upload()
	{
		$file = Input::file('Filedata');
		if($file->isValid()){
			$realPath = $file->getRealPath();
			
			$entension = $file->getClientOriginalExtension();
			
			$newName = date('YmdHis').mt_rand(100,999).'.'.$entension;
			
			$path = $file->move(base_path().'/uploads',$newName);
			$filepath = 'laravel-r/uploads/'.$newName;
			return $filepath;
		}
	}
}
