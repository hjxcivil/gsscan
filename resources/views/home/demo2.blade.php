@extends('layouts.home')
@section('container')
	<div class="nav">
		
		<ul>
			@foreach ($cat as $k => $v)
				<li>{{ $v->cate_name }}
				@foreach($cats as $m => $n)
					@if($n->cate_pid == $v->cate_id)
					<ul>
						<li><a href="{{url( 'product/'.$n->cate_name )}}">{{ $n->cate_name }}</a></li>
					</ul>
					@endif
				@endforeach
				</li>
			@endforeach
		</ul>
	
	</div>
	
	<div class="try">
		@foreach($ct as $c)
			<li>{!! $c !!}</li>
		@endforeach
	</div>
	
	

	
@stop