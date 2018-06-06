@extends('layouts.home')
@section('container')
<div class="banner">
	<ul class="list">
		<li><img src="http://img.mukewang.com/54111cd9000174cd04900170.jpg" alt="" /></li>
		<li><img src="http://img.mukewang.com/54111dac000118af04900170.jpg" alt="" /></li>
		<li><img src="http://img.mukewang.com/54111d9c0001998204900170.jpg" alt="" /></li>
		<li><img src="http://img.mukewang.com/54111d8a0001f41704900170.jpg" alt="" /></li>
		<li><img src="http://img.mukewang.com/54111d9c0001998204900170.jpg" alt="" /></li>
	</ul>
	<div class="dot"><i>1</i><i>2</i><i>3</i><i>4</i><i>5</i></div>
</div>

<div class='info'>
	<div class="item">
		<div class="icode"><img src="" alt=""><span>generalscan</span></div>
		<div class="detail">
			<h3>Lorem ipsum.</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi.</p>
			<p><a href="#">>>Learn More</a></p>
		</div>
	</div>
	<div class="item">
		<div class="icode"><img src="" alt=""><span>Lorem ipsum.</span></div>
		<div class="detail">
			<h3>Lorem ipsum.</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam.</p>
			<p><a href="#">>>Learn More</a></p>
		</div>
	</div>
	<div class="item">
		<div class="icode"><img src="" alt=""><span>Lorem ipsum.</span></div>
		<div class="detail">
			<h3>Lorem ipsum.</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui.</p>
			<p><a href="#">>>Learn More</a></p>
		</div>
	</div>
</div>

<div class="showcase">
	<figure class="main-fig">
		<img src="{{ asset( 'resources/views/home/style/image/figure/ring.png') }}" alt="">
		<figcaption>
			<h3><span></span></h3>
			<p></p>
		</figcaption>
	</figure>
	<div class="side-fig">
		<figure>
			<img src="{{ asset( 'resources/views/home/style/image/figure/scanbuddy.png') }}" alt="">
			<figcaption>
				<h3></h3>
				<p></p>
			</figcaption>
		</figure>
		<figure>
			<img src="{{ asset( 'resources/views/home/style/image/figure/companion.png') }}" alt="">
			<figcaption>
				<h3></h3>
				<p></p>
			</figcaption>
		</figure>
	</div>
</div>

<div class="company">
	<div class="c-container">
		<div class="c-bgi"><img src="" alt=""></div>
		<div class="c-content">
			<div class="c-text">
				<h3>Generalscan:</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, magni, ad laboriosam reiciendis alias natus corporis id dolorum totam fugit ea perferendis ipsum consectetur repellendus veritatis voluptatem cupiditate amet ipsam suscipit eius illo facilis doloribus eum culpa necessitatibus magnam quaerat nihil quo qui maxime neque molestiae itaque placeat earum rem mollitia est. Mollitia, totam, voluptas, odit, alias quam tempora voluptatum iusto quibusdam molestiae saepe praesentium architecto ipsum assumenda accusamus quis ut eum nostrum doloribus unde dicta nulla at quo! Placeat.</p>
				<p><a href="read more"></a></p>
			</div>
		</div>
	</div>
</div>


<div class="adition">
	<div class="ad-wrap">
		<div class="ad">
			<a href=""><span>find</span></a>
		</div>
		<div class="ad">
			<a href=""><span>partner</span></a>
		</div>
		<div class="ad">
			<a href=""><span>lorem</span></a>
		</div>
		<div class="ad">
			<a href=""><span>oppotunity</span></a>
		</div>
		<div class="ad">
			<a href=""><span>contact</span></a>
		</div>
	</div>
</div>


<article id= 'customer'><img src="" alt=""></article>

<div class="company">
	<img src="" alt="">
	<div class="com-text">
		<h1></h1>
		<p></p>
		<span><a href="/company">Read More</a></span>
	</div>
</div>

<div class="news">
	<div class="part">
		<h1></h1>
		<ul>
			<li></li>
			<li></li>
			<li></li>
			<li><a href="#"></a></li>
		</ul>
	</div>
	<div class="part">
		<h1></h1>
		<ul>
			<li></li>
			<li></li>
			<li></li>
			<li><a href="#"></a></li>
		</ul>
	</div>
	<div class="part">
		<h1></h1>
		<ul>
			<li></li>
			<li></li>
			<li></li>
			<li><a href="#"></a></li>
		</ul>
	</div>
</div>
@stop