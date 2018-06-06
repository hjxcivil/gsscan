<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Http\Model\Links;
use App\Http\Controllers\Controller;

class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data = Links::orderBy('link_order','asc')->get();
        return view (' admin.links.index',compact('data'));
    }
	
	public function changeOrder()
	{
		$input = Input::all();
        $links = Links::find( $input['link_id'] );
        $links['link_order'] = $input['link_order'];
		$re = $links->update();
        if( $re ){
            $data = array(
                'status' => '0',
                'msg' => '友情链接排序更新成功!',
            );
        }else{
            $data = array(
                'status' => '1',
                'msg' => '友情链接排序更新失败,请稍后重试!',
            );
        }
        return $data;
	}
	
	

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/links/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $input = Input::except('_token');
		$rules = [
                'link_name'=>'required',
                'link_url'=>'required',
            ];

		$message = [
			'link_name.required'=>'友情链接名称不能为空！',
			'link_url.required'=>'友情链接URL不能为空！',
		   
		];

		$validator = Validator::make($input,$rules,$message);

		if($validator->passes()){ 
			$re = Links::create($input);
			if($re){
				return redirect('admin/links');
			}else {
				return back()->with('erors','友情链接添加失败,请稍后重试!');
			}
		}else{
			return back()->withErrors($validator);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($link_id)
    {
        $field = Links::find($link_id);
		return view('admin.links.edit',compact('field'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($link_id)
    {
        $input = Input::except('_method','_token');
		$re = Links::where('link_id',$link_id)->update($input);
		if($re){
			return redirect('admin/links');
		}else {
			return back()->with('erors','友情链接更新失败,请稍候重试');
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($link_id)
    {
        $re = Links::where('link_id',$link_id)->delete();
		if($re){
			$data = [
				'status' => 0,
				'msg' => '友情链接删除成功!',
			];
		}else {
			$data = [
				'status' => 1,
				'msg' => '友情链接删除失败,请稍候重试!',
			];
		}
		return $data;
    }
}
