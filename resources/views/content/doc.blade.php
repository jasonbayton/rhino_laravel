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
				<i class="fas fa-calendar"></i> {{ $content->date->toFormattedDateString() }}
				<i class="fas fa-edit"></i> | {{ $content->updated ?? $content->date->toFormattedDateString() }} |
				<i class="fas fa-clock"></i> {{ $content->readTime() }}
			</div>
			<h2 id="article_title">
				{{ $content->title }}
			</h2>
			@if($content->subtitle)
				<div id="article_subtitle">{{ $content->subtitle }}</div>
			@endif
			@if($content->content())
				<div id="literal_content" class="js-toc-content">
					{!! $content->content() !!}
				</div>
			@endif
			<ul>
				@foreach($content->getChildren() as $result)
					<li><a href="{{ $result->url }}">{{ $result->title }}</a></li>
				@endforeach
			</ul>
			@if($content->getAppliesToImages()->count())
				<div class="article-bottom-links">
					<h4 class="applies-to-header">Applies to:</h4>
					@foreach($content->getAppliesToImages() as $image)
						<figure class="device-figure">
							<img src="{{ $image['image'] }}" alt="{{ $image['device'] }}">
							<figcaption>{{ $image['device'] }}</figcaption>
						</figure>
					@endforeach
				</div>
			@endif

			<div class="article-bottom-links">
				<a target="_blank" href="{{ route('export-to-pdf', ['content' => $content->url]) }}"><i
							style="padding-right: 10px;" class="fas fa-file"></i>Download as PDF</a>
				<a target="_blank" href=""><i style="padding-right: 10px;" class="far fa-exclamation-triangle"></i>Report
					Content</a>
				<a target="_blank" onclick="window.print()"><i style="padding-right: 10px;" class="fas fa-print"></i>Print</a>
			</div>
			@if($content->mailingSignup())
				{!! $content->mailingSignup() !!}
			@endif
		</article>
		@if($content->content())
			@include('layouts.aside_right')
		@endif
	</section>
@endsection
