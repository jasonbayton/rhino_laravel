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
					<form method="GET" action="#">
						<input type="text" name="imei">
						<button>Test</button>
					</form>
					@if ($warranty === false)
						<h1>No device matches the IMEI provided. Please check the IMEI and try again</h1>
					@endif

					@if ($warranty)
						<h1>We found your device</h1>
						@if($warranty->inWarranty())
							<p>Your device has an active warranty which expires
								on: {{ $warranty->warrantyExpiryDate()->toDateString() }}</p>
						@else
							<p>Your device warranty has expired, it expired
								on: {{ $warranty->warrantyExpiryDate()->toDateString() }}</p>
						@endif
					@endif
				</div>
			@endif
			@if (!$content->content())
				<ul>
					@foreach($content->getChildren() as $result)
						<li><a href="{{ $result->url }}">{{ $result->title }}</a></li>
					@endforeach
				</ul>
			@endif
			@if($content->getAppliesToImages()->count())
				<div class="article-bottom-links">
					<h4 class="applies-to-header">Applies to:</h4>
					@foreach($content->getAppliesToImages() as $image)
						<figure class="device-figure">
							<a href="/devices/{{ $image['device'] }}"><img src="{{ $image['image'] }}"
																		   alt="{{ $image['device'] }}"></a>
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
	</section>
@endsection
