<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Http\Model\Navs;
use App\Http\Controllers\Controller;

class NavsController extends Controller
{
    public function index()
	{
		$data = Navs::orderBy('nav_order','asc')->get();
		return view('admin.navs.index',compact('data'));
	}
	
	public function changeOrder()
    {
        $input = Input::all();
        $navs = Navs::find( $input['nav_id'] );
        $navs['nav_order'] = $input['nav_order'];
        $re = $navs->update();
        if( $re ){
            $data = array(
                'status' => '0',
                'msg' => '自定义导航排序更新成功!',
            );
        }else{
            $data = array(
                'status' => '1',
                'msg' => '自定义导航排序更新失败,请稍后重试!',
            );
        }
        return $data;
    }
	
	
	
	public function store()
	{
		$input = Input::except('_token');
		
				$rules = [
						'nav_name'=>'required',
						'nav_url'=>'required',
					];

				$message = [
					'nav_name.required'=>'自定义导航名称不能为空！',
					'nav_url.required'=>'自定义导航URL不能为空！',
				   
				];

		$validator = Validator::make($input,$rules,$message);

		if($validator->passes()){ 
			$re = Navs::create($input);
			if($re){
				return redirect('admin/navs');
			}else {
				return back()->with('erors','自定义导航添加失败,请稍后重试!');
			}
		}else{
			return back()->withErrors($validator);
		}
	}
	
	public function create()
	{
		return view('admin.navs.add');
	}
	
	public function show()
	{
		
	}
	
	public function update($nav_id)
	{
		$input = Input::except('_token','_method');
		$re = Navs::where('nav_id',$nav_id)->update($input);
		if($re){
			return redirect('admin/navs');
		}else {
			return back()->with('erors','自定义导航更新失败,请稍候重试');
		}
	}
	
	public function destroy($nav_id)
	{
		$re = Navs::where('nav_id',$nav_id)->delete();
		if($re){
			$data = [
				'status' => 0,
				'msg' => '自定义导航删除成功!',
			];
		}else {
			$data = [
				'status' => 1,
				'msg' => '自定义导航删除失败,请稍候重试!',
			];
		}
		return $data;
	}
	
	public function edit($nav_id)
	{
		$field = Navs::find($nav_id);
		return view('admin.navs.edit',compact('field'));
	}
}
