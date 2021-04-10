@extends('layouts.app')
@section('content')
	<section>
		<div class="container">
			<div class="row">
				<!--标签规定文档的主要内容main-->
				<main class="col-md-8">
					@list(['cid'=>$category_id])
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