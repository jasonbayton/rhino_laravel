@extends('layouts.app')

@section('content')
	<section id="content_container">
		<aside class="left">
			@include('layouts.aside')
		</aside>
		<article>
			@if ($content->topic && $content->parent)
				@include('layouts.breadcrumb')
			@endif
			<div id="article_meta">
				<i class="fas fa-calendar"></i> published at | <i
						class="fas fa-edit"></i> updated at | <i
						class="fas fa-clock"></i> 1 minute
			</div>
			<h2 id="article_title">
				{{ $content->title }}
			</h2>
			@if($content->subtitle)
				<div id="article_subtitle">{{ $content->subtitle }}</div>
			@endif
			<div id="literal_content" class="js-toc-content">
				{!! $content->content() !!}
			</div>
			<div>
                    <a href="{{ route('export-to-pdf', ['content' => $content->url]) }}">Download as PDF</a>
			</div>
			@if($content->mailingSignup())
				{!! $content->mailingSignup() !!}
			@endif
		</article>
		@include('layouts.aside_right')
	</section>
@endsection
