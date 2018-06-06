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
	
	
	<div class="nav" style="display: none;">
			<ul>
				<li class="outer exp"><a href="javascript:void(0)">Products</a><i></i><!--
					--><ul class="inner inner-1">
						<li><a href=#>Companion</a></li>
						<li><a href=#>Scanbuddy</a></li>
						<li><a href=#>Armband</a></li>
						<li><a href=#>Ring</a></li>
						<li><a href=#>Sled</a></li>
						<li><a href=#>Printer</a></li>
						<li><a href=#>Accessory</a></li>
					</ul>
				</li>
				<li class="outer exp"><a href="javascript:void(0)">Partner</a><i></i><!--
					--><ul class="inner">
						<li><a href=#>Partner Program</a></li>
						<li><a href=#>Find Local Partner</a></li>
						<li><a href=#>Become Partner</a></li>
					</ul>
				</li>
				<li class="outer exp"><a href="javascript:void(0)">Resources</a><i></i><!--
					--><ul class="inner">
						<li><a href=#>Lorem ipsum dolor.</a></li>
						<li><a href=#>Lorem ipsum.</a></li>
						<li><a href=#>Lorem ipsum dolor sit amet.</a></li>
						<li><a href=#>Lorem ipsum.</a></li>
						<li><a href=#>Lorem ipsum dolor sit.</a></li>
					</ul>
				</li>
				<li class="outer"><a href="javascript:void(0)">Blog</a></li>
				<li class="outer exp"><a href="javascript:void(0)">Company</a><i></i><ul class="inner">
						<li><a href=#>About Us</a></li>
						<li><a href=#>Contact Us</a></li>
						<li><a href=#>Lorem ipsum dolor.</a></li>
						<li><a href=#>Lorem ipsum.</a></li>
					</ul>
				</li>
			</ul>
		</div>
	

	
@stop