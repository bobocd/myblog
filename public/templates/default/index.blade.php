@extends('layouts.app')
@section('heads')
	<link href="https://cdn.bootcss.com/Swiper/4.5.0/css/swiper.css" rel="stylesheet">
	<script src="https://cdn.bootcss.com/Swiper/4.5.0/js/swiper.js"></script>
@endsection
@section('content')
	<section>
		<div class="container">
			<div class="row">
				<!--标签规定文档的主要内容main-->
				<main class="col-md-8">
					<article class="_carousel">
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
							<!-- 幻灯片-->
							<div class="carousel-inner" role="listbox">
								@slide
							</div>
						</div>
					</article>
					@list(['iscommend'=>1,'limit'=>3])
					<article>
						<div class="_head">
							<h1>{{$field['title']}}</h1>
							<span>作者：{{$field['author']}}</span>
							•
							<!--pubdate表⽰示发布⽇日期-->
							<time pubdate="pubdate" datetime="{{$field['created_at']}}">{{$field['created_at']}}</time>
							•
							分类：
							<span>{{$field['category']}}</span>
						</div>
						{{--<div class="_digest">--}}
							{{--<img src="./images/1.jpg"  class="img-responsive"/>--}}
							{{--<p>--}}
								{{--摘要--}}
							{{--</p>--}}
						{{--</div>--}}
						<div class="_more">
							<a href="{{$field['url']}}" class="btn btn-default">阅读全文</a>
						</div>
						<div class="_footer">
							<i class="glyphicon glyphicon-tags"></i>
							@foreach($field['tag'] as $label)
							@tag
								@if($label==$field['id'])
								<a href="{{$field['url']}}">{{$field['title']}}</a>
								@endif
 							@endtag
							@endforeach
						</div>
					</article>
					@endlist
				</main>
				@include('layouts._right')
			</div>
		</div>
	</section>
@endsection