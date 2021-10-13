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
								Type
							</th>
					    <th class="tg-0lax">
								Build #
							</th>
					    <th class="tg-0lax">
								SPL
							</th>
					    <th class="tg-0lax">
								OTA
							</th>
							</th>
					    <th class="tg-0lax">
								Full
							</th>
					  </tr>
					</thead>
					<tbody>
						@foreach($content->getChildren() as $result)
					  <tr>
					    <td class="tg-0lax">
								@isset($result->softwaresku)
									{{ $result->softwaresku }}
								@endisset
							</td>
					    <td class="tg-0lax">
								@isset($result->releasetype)
									{{ $result->releasetype }}
								@endisset
							</td>
					    <td class="tg-0lax">
								@isset($result->title)
									<a href="{{ $result->url }}">{{ $result->title }}</a>
								@endisset
							</td>
					    <td class="tg-0lax">
								@isset($result->softwarespl)
									{{ $result->softwarespl }}
								@endisset
							</td>
					    <td class="tg-0lax">
								@isset($result->otapackageurl)
								@if($result->otapackageurl !== '')
									<a href="{{ $result->otapackageurl }}"><i class="far fa-cloud-download-alt"></i></a>
								@endif
								@endisset
							</td>
							</td>
					    <td class="tg-0lax">
								@isset($result->fullotaurl)
								@if($result->fullotaurl !== '')
									<a href="{{ $result->fullotaurl }}"><i class="fas fa-cloud-download-alt"></i></a>
								@endif
								@endisset
							</td>
					  </tr>
						@endforeach
					</tbody>
				</table>
				<small>
				<p>
					<b>Legend</b>
				</p>
				<p>
					<b>SKU</b> - The unique software branch. Global is 001, for reference <br>
					<b>Type</b> - The type of release: maintenance (MR), security (SMR), launch (LR), or initial (IR) <br>
					<b>Build #</b> - The build number of the software release, used for checking software version applied to the device <br>
					<b>SPL</b> - The Security Patch Level applied, these update on a 90 day basis and ensure vulnerabilities are fixed <br>
					<b>OTA</b> - The zip file containing the update, use ADB sideload or drop the zip on SD to update <br>
					<b>Full</b> - The zip file containing the <i>full</i> update package, can be applied over any previous software version (but not a newer)
				</p>
				</small>
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
