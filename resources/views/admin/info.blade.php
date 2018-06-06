@extends('layouts.admin')
@section('content')
	<div class="crumb_warp">
		<i class="fa fa-home"></i> <a href="{{ url('admin/info') }}">首页</a> &raquo; 系统基本信息
	</div>
	
	
	<!-- <div class="result_wrap">
		       
		    </div> -->
			

	
    <div class="result_wrap">
        <div class="result_title">
            <h3>系统基本信息</h3>
        </div>
        <div class="result_content">
            <ul>
                <li>
                    <label>操作系统</label><span>{{ PHP_OS }}</span>
                </li>
                <li>
                    <label>运行环境</label><span>{{ $_SERVER['SERVER_SOFTWARE'] }}</span>
                </li>
                <li>
                    <label>PHP运行方式</label><span>{{ php_sapi_name() }}</span>
                </li>
                <li>
                    <label>上传附件限制</label><span><?php echo get_cfg_var('upload_max_filesize')?get_cfg_var('upload_max_filesize'):'不允许上传附近' ?></span>
                </li>
                <li>
                    <label>北京时间</label><span><?php echo date('Y年m月d日 H时i分s秒'); ?></span>
                </li>
                <li>
                    <label>服务器域名/IP</label><span>{{ $_SERVER['SERVER_NAME'] }} [ {{ $_SERVER['SERVER_ADDR'] }} ]</span>
                </li>
                <li>
                    <label>Host</label><span>127.0.0.1</span>
                </li>
            </ul>
        </div>
    </div>


    <div class="result_wrap">
        <div class="result_title">
            <h3>友情链接</h3>
        </div>
        <div class="result_content">
            <ul>
                <li>
                    <label>官方网站：</label><span><a href="http://www.generalscan.com" target="_blank">http://www.generalscan.com</a></span>
                </li>
                <li>
                    <label>官方论坛：</label><span><a href="http://generalscan-rd.iok.la/forum.php?" target="_blank">http://generalscan-rd.iok.la/forum.php?</a></span>
                </li>
            </ul>
        </div>
    </div>
	<!--结果集列表组件 结束-->

@stop