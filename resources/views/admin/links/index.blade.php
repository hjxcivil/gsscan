@extends('layouts.admin')
@section('content')
    <div class="crumb_warp">
        <i class="fa fa-home"></i> <a href="{{ url('admin/info') }}">首页</a> &raquo; 友情链接管理
    </div>

 
    <form action="#" method="post">
        <div class="result_wrap">
			<div class="result_title">
				<h3>友情链接列表</h3>
			</div>
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{ url('admin/links/create') }}"><i class="fa fa-plus"></i>添加链接</a>
                    <a href="{{ url('admin/links') }}"><i class="fa fa-recycle"></i>全部链接</a>
                </div>
            </div>
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc" width="5%">排序</th>
                        <th class="tc" width="5%">ID</th>
                        <th>链接名称</th>
                        <th>链接标题</th>
                        <th>链接地址</th>
                        <th>操作</th>
                    </tr>
					
					@foreach($data as $v)
                    <tr>
                        <td class="tc">
                            <input type="text" onchange="changeOrder(this,{{ $v->link_id }})" name="ord[]" value="{{ $v->link_order }}">
                        </td>
                        <td class="tc">{{ $v->link_id }}</td>
                        <td>
                            <a href="#">{{ $v->link_name }}</a>
                        </td>
                        <td>{{ $v->link_title }}</td>
                        <td>{{ $v->link_url }}</td>
                       
                        <td>
                            <a href="{{ url('admin/links/'. $v->link_id.'/edit') }}">修改</a>
                            <a href="javascript::" onclick="delLinks({{ $v->link_id }})">删除</a>
                        </td>
                    </tr>
					@endforeach
                    
                </table>


            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->
	
	<script>
		function changeOrder(obj,link_id){
			var link_order = $(obj).val();
			
			$.post( "{{ url('admin/links/changeorder') }}",{'_token':'{{ csrf_token() }}','link_id':link_id,'link_order':link_order},function(data){
				if(data.status==0){
				layer.msg(data.msg, {icon: 6});
				}else {
				layer.msg(data.msg, {icon: 5});
				}
			});
		}
		
		// 删除友情链接
		function delLinks(link_id){
			
			layer.confirm('您确定要删除这个链接吗？', {
			  btn: ['确定','取消'] //按钮
			}, function(){
				$.post( "{{url( 'admin/links/' )}}/"+link_id,{'_method':'delete','_token':'{{ csrf_token() }}'},function(data){
					if(data.status==0){
						location.href = location.href;
						layer.msg(data.msg, {icon: 6});
					}else{
						layer.msg(data.msg, {icon: 5});
					}
				});
			}, function(){
			  
			});
		}
		
		
	</script>

@stop