<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Http\Model\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
	{
		// $categorys = Category::tree();
		$categorys = (new Category)->tree();
		return view('admin.category.index')->with('data',$categorys);
	}
	
    public function changeOrder()
    {
        $input = Input::all();
        $cate = Category::find( $input['cate_id'] );
        $cate['cate_order'] = $input['cate_order'];
        $re = $cate->update();
        if( $re ){
            $data = array(
                'status' => '0',
                'msg' => '分类排序更新成功',
            );
        }else{
            $data = array(
                'status' => '1',
                'msg' => '分类排序更新失败',
            );
        }
        return $data;
    }

	// admin/category/create
	 public function create()
	{
		$data = Category::where('cate_pid',0)->get();
		return view('admin/category/add',compact('data'));
	}
	
	//get.admin/category/{category}/edit
	 public function edit($cate_id)
	{
		$field = Category::find($cate_id);
		$data = Category::where('cate_pid',0)->get();
		return view('admin.category.edit',compact('field','data'));
	}
	
	//put.admin/category/{category}
	 public function update($cate_id)
	{
		$input = Input::except('_token','_method');
		$re = Category::where('cate_id',$cate_id)->update($input);
		if($re){
			return redirect('admin/category');
		}else {
			return back()->with('erors','分类信息更新失败,请稍候重试');
		}
	}
	
	
	
	// admin/category/{category}
	 public function destroy($cate_id)
	{
		$re = Category::where('cate_id',$cate_id)->delete();
		if($re){
			$data = [
				'status' => 0,
				'msg' => '分类删除成功!',
			];
		}else {
			$data = [
				'status' => 1,
				'msg' => '分类删除失败,请稍候重试!',
			];
		}
		return $data;
	}
	
	// admin/category
	 public function store()
	{
		$input = Input::except('_token');
		$rules = [
                'cate_name'=>'required',
            ];

		$message = [
			'cate_name.required'=>'分类名称不能为空！',
		   
		];

		$validator = Validator::make($input,$rules,$message);

		if($validator->passes()){ 
			$re = Category::create($input);
			if($re){
				return redirect('admin/category');
			}else {
				return back()->with('erors','数据填写失败,请稍后重试!');
			}
		}else{
			return back()->withErrors($validator);
		}

	}
	
	// admin/category{category}
	 public function show()
	{
		
	}
	
}
