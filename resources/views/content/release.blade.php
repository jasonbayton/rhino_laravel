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
			<h2>Releases</h2>
			<div id="releases_list">
				<table class="tg" id="support_table">
					<thead>
					  <tr>
					    <th class="tg-0lax">
								SKU
							</th>
					    <th class="tg-0lax">
								TYPE
							</th>
					    <th class="tg-0lax">
								Build #
							</th>
					    <th class="tg-0lax">
								SPL
							</th>
					  </tr>
					</thead>
					<tbody>
					  <tr>
					    <td class="tg-0lax">
								@if($content->softwaresku)
								{{ $result->softwaresku }}
								@endif
							</td>
					    <td class="tg-0lax">
								@if($content->releasetype)
								{{ $result->releasetype }}
								@endif
							</td>
					    <td class="tg-0lax">
								{{ $result->title }}
							</td>
					    <td class="tg-0lax">
								@if($content->softwarespl)
								{{ $result->softwarespl }}
								@endif
							</td>
					  </tr>
					</tbody>
				</table>

				<ul>
					@foreach($content->getChildren() as $result)
						<li><a href="{{ $result->url }}">{{ $result->title }}</a></li>
					@endforeach
				</ul>
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
