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
			@if($content->getAppliesToImages()->count())
				<div class="article-bottom-links">
					@foreach($content->getAppliesToImages() as $image)
						<img src="{{ $image['image'] }}" alt="{{ $image['device'] }}">
					@endforeach
				</div>
			@endif

			<div class="article-bottom-links">
				<a target="_blank" href="{{ route('export-to-pdf', ['content' => $content->url]) }}"><i style="padding-right: 10px;" class="fas fa-file"></i>Download as PDF</a>
				<a target="_blank" href="{{ route('export-to-pdf', ['content' => $content->url]) }}"><i style="padding-right: 10px;" class="far fa-exclamation-triangle"></i>Report Content</a>
				<a target="_blank" href="{{ route('export-to-pdf', ['content' => $content->url]) }}"><i style="padding-right: 10px;" class="fas fa-print"></i>Print</a>
			</div>
			@if($content->mailingSignup())
				{!! $content->mailingSignup() !!}
			@endif
		</article>
		@include('layouts.aside_right')
	</section>
@endsection
