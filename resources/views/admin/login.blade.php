@extends('layouts.home')
@section('style')
@parent
<link rel="stylesheet" href="{{ asset('resources/views/admin/style/css/login.css') }}">
@stop

@section('container')
<div class="account">
	<p style="color:red">{{ session( 'msg' ) }}</p>
	<form action="" method="post">
		{{csrf_field()}}
		<div class="login-head"><h3>please sign in:</h3></div>
		<hr />
		<div class="login-body">
			<div class="login-main">
				<div class="login-group">
					<label for="user_name" class="login-label"><span class="login-star">*</span>Name:</label>
					<div class="login-cell">
						<input class="login-input"  type="text" name="user_name" id="user_name">
						<span class="login-remark login-warn">
							<i class="icon-warn"></i>
							
						</span>
					</div>
				</div>
				<div class="login-group">
					<label for="user_pass" class="login-label"><span class="login-star">*</span>Password:</label>
					<div class="login-cell">
						<input type="password" class="login-input" name="user_pass" id="user_pass">
						<span>
							<i></i>
							
						</span>
					</div>
				</div>
				
				<div class="code-group">
					<div class="login-cell">
						<span><i class="fa fa-check-square-o"></i></span>
						<input type="text" class="code" name="code"/>
						<img src="{{ url('admin/code') }}" alt="" onclick="this.src='{{ url('admin/code') }}?'+Math.random()" />
					</div>
				</div>
				
				<div class="login-cell">
					<input type="submit" value="立即登录">
				</div>
			</div>
		</div>
		
	</form>
</div>
@stop

