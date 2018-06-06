<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Navs;
use App\Http\Model\Category;
use App\Http\Model\Article;


class IndexController extends CommonController
{
    public function index()
	{
		return view('home.index');
	}
	
	public function demo()
	{
		
		// $data = Navs::orderBy('nav_order')->get();
		// dd($data);
		$cats = Category::all();
		$cat = Category::where('cate_pid',0)->get();
		
		
		return view('home.demo',compact('navs','cat','cats'));
	}
	
	public function demo2()
	{
		
		// $data = Navs::orderBy('nav_order')->get();
		// dd($data);
		$ct=Article::pluck('art_content');
		$cats = Category::all();
		$cat = Category::where('cate_pid',0)->get();
		
		
		return view('home.demo2',compact('navs','cat','cats','ct'));
	}
}
