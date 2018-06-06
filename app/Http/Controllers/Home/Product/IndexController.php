<?php

namespace App\Http\Controllers\Home\Product;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Model\Category;
use App\Http\Model\Article;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
	{
		$cats = Category::all();
		$cat = Category::where('cate_pid',0)->get();
		return view('home.product.index',compact('cats','cat'));
	}
	
	public function pro()
	{
		return view('home.product.pro');
	}
	public function cat($cate_name)
	{
		// $field = Article::Join( 'category','article.cate_id','=','category.id' )->where( 'article.id',$art_id )->first();

		$item = Category::where('cate_name',$cate_name)->first();
		// dd($item->cate_id);
		$ct=Article::where('cate_id',$item->cate_id)->get();
		
		foreach($ct as $k=>$v){
			$ct[$k]->_src = substr($v->art_thumb,9);
		}
		// dd($ct[0]->_src);
		return view('home.product.item',compact('item','ct'));
	}
}
