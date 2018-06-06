@extends('layouts.admin')
@section('content')
    <div class="crumb_warp">
        <i class="fa fa-home"></i> <a href="{{ url('admin/info') }}">首页</a> &raquo; 产品管理
    </div>

	<div class="result_wrap">
        <div class="result_title">
            <h3>添加产品</h3>
			@if(count($errors)>0)
				<div class="mark">
					@if(is_object($errors))
					@foreach($errors->all() as $error)
						<p>{{$error}}</p>
					@endforeach
					@else
						<p>{{ $errors }}</p>
					@endif
				</div>
			@endif
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{ url('admin/article/create') }}"><i class="fa fa-plus"></i>添加产品</a>
                <a href="{{ url('admin/article') }}"><i class="fa fa-recycle"></i>全部产品</a>
            </div>
        </div>
    </div>
    
    <div class="result_wrap">
        <form action="{{ url('admin/article') }}" method="post">
		{{ csrf_field() }}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120">分类：</th>
                        <td>
                            <select name="cate_id">
								@foreach($data as $d)
                                <option value="{{ $d->cate_id }}">{{ $d->_cate_name }}</option>
								@endforeach
                            </select>
                        </td>
                    </tr>
					
					
					
                    <tr>
                        <th>标题：</th>
                        <td>
                            <input type="text" class="lg" name="art_title">
                        </td>
                    </tr>
					
                    <tr>
                        <th>编辑：</th>
                        <td>
                            <input type="text" class="sm" name="art_editor">
                        </td>
                    </tr>
					 <tr>
                        <th>缩略图：</th>
                        <td>
                            <input type="text" size="50" name="art_thumb">
							<input id="file_upload" name="file_upload" type="file" multiple="true">
							<script src="{{ asset('resources/org/uploadify/jquery.uploadify.min.js') }}" type="text/javascript"></script>
							<link rel="stylesheet" type="text/css" href="{{ asset('resources/org/uploadify/uploadify.css') }}">
							<script type="text/javascript">
								<?php $timestamp = time();?>
								$(function() {
									$('#file_upload').uploadify({
										'buttonText' : '图片上传',
										'formData'     : {
											'timestamp' : '<?php echo $timestamp;?>',
											'_token'     : '{{ csrf_token() }}'
										},
										'swf'      : '{{ asset('resources/org/uploadify/uploadify.swf') }}',
										'uploader' : "{{ url('admin/upload') }}",
										
										'onUploadSuccess' : function(file, data, response) {
											$('input[name=art_thumb]').val(data);
											$('#art_thumb_img').attr('src','/'+data);
										}
									});
								});
							</script>
							<style>
							.uploadify{display:inline-block;}
							.uploadify-button{border:none; border-radius:5px; margin-top:8px;}
							table.add_tab tr td span.uploadify-button-text{color: #FFF; margin:0;}
							</style>
                        </td>
                    </tr>
					<tr>
                        <th></th>
                        <td>
                            <img src="" alt="" id="art_thumb_img" style="max-width: 350px;max-height: 100px;">
                        </td>
                    </tr>
					
					
                    <tr>
                        <th>关键词：</th>
                        <td>
                            <input type="text" class="lg" name="art_tag">
                        </td>
                    </tr>
					
					<tr>
                        <th>描述：</th>
                        <td>
                            <textarea name="art_description"></textarea>
                        </td>
                    </tr>
					
					
					<tr>
                        <th>内容：</th>
                        <td>
							<script type="text/javascript" charset="utf-8" src="{{ asset('resources/org/ueditor/ueditor.config.js') }}"></script>
							<script type="text/javascript" charset="utf-8" src="{{ asset('resources/org/ueditor/ueditor.all.min.js') }}"> </script>
							<script type="text/javascript" charset="utf-8" src="{{ asset('resources/org/ueditor/lang/zh-cn/zh-cn.js') }}"></script>	
								
							<script id="editor" name="art_content" type="{{ asset('resources/views/org/ueditor/text/plain')}} " style="width:860px;height:500px;"></script>
							
							<script>
								var ue = UE.getEditor('editor');
							</script>
							<style>
								.edui-default{line-height: 28px;}
								div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
								{overflow: hidden; height:20px;}
								div.edui-box{overflow: hidden; height:22px;}
							</style>
                        </td>
                    </tr>
					
                    
                   
                    
                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

@stop