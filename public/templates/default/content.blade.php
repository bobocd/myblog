@extends('layouts.app')
@section('content')
	<section>
		<div class="container">
			<div class="row">
				<!--标签规定文档的主要内容main-->
				<main class="col-md-8">
					<article>
						<div class="_head">
							<h1>{{$content['title']}}</h1>
							<span>
								作者：
								<a href="">{{$content['author']}}</a>
								</span>
							•
							<!--pubdate表?示发布?日期-->
							<time pubdate="pubdate" datetime="{{$content['created_at']}}">{{$content['created_at']}}</time>
						</div>
						<div class="_digest">
							<p>
								{!! $content['content'] !!}
							</p>
						</div>
						<div class="_footer">
							<i class="glyphicon glyphicon-tags"></i>
							@tag
							<a href="">{{$field['title']}}</a>
							@endtag
						</div>
					</article>
				</main>
				@include('layouts._right')
			</div>
		</div>
	</section>
@endsection