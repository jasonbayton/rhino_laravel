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
			<!--div id="article_meta">
				<i class="fas fa-calendar"></i> {{ $content->date->toFormattedDateString() }}
				<i class="fas fa-edit"></i> | {{ $content->updated ?? $content->date->toFormattedDateString() }} |
				<i class="fas fa-clock"></i> {{ $content->readTime() }}
			</div-->
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

			<h2>
				Product support
			</h2>
			<!-- foreach topic, output docs in a UL -->
			<div class="content-grid">
				@foreach($allTopics as $header => $topic)
				<div class="grid-topic">
						<div class="grid-topic-title">
						<h4 id="{{ $header }}">{{ $header }}</h4>
						</div>
						<ul>
								@foreach($topic as $article)
								{{ $article->appliesTo}}
								@if(in_array($content->parentID, $article->appliesTo))
										<li><a href="{{ $article->url }}">{{ $article->title }}</a></li>
								@endif
								@endforeach
						</ul>
					</div>
				@endforeach
			</div>

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
	</section>
@endsection
