<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Http\Model\Article;
use App\Http\Model\Category;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
	{
		$data = Article::orderBy('art_id','desc')->paginate(5);
		return view('admin.article.index',compact('data'));
	}
	
	public function create ()
	{
		$data = (new Category)->tree();
		return view('admin.article.add',compact('data'));
	}
	
	public function store()
	{
		$input = Input::except('_token');
		$input['art_time']=time();
		
		$rules = [
                'art_title'=>'required',
                'art_content'=>'required',
            ];

		$message = [
			'art_title.required'=>'名称不能为空！',
			'art_content.required'=>'内容不能为空！',
		   
		];

		$validator = Validator::make($input,$rules,$message);

		if($validator->passes()){ 
			$re = Article::create($input);
			if($re){
				return redirect('admin/article');
			}else {
				return back()->with('erors','数据填写失败');
			}
		}else{
			return back()->withErrors($validator);
		}
	}
	
	//get.admin/article/{article}/edit
	 public function edit($art_id)
	{
		$data = (new Category)->tree();
		$field = Article::find($art_id);
		return view('admin.article.edit',compact('data','field'));
	}
	
	//put.admin/article/{article}
	 public function update($art_id)
	{
		$input = Input::except('_token','_method');
		$re = Article::where('art_id',$art_id)->update($input);
		if($re){
			return redirect('admin/article');
		}else {
			return back()->with('erors','更新失败,请稍候重试');
		}
	}
	
	// admin/article/{article}
	 public function destroy($art_id)
	{
		$re = Article::where('art_id',$art_id)->delete();
		if($re){
			$data = [
				'status' => 0,
				'msg' => '删除成功!',
			];
		}else {
			$data = [
				'status' => 1,
				'msg' => '删除失败,请稍候重试!',
			];
		}
		return $data;
	}
}

