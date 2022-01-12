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
				<div id="literal_content">
					{!! $content->content() !!}
				</div>
			@endif
			<div id="literal_content">
				<p>Your Rhino {{ $content->parentID }} is updated throughout it's device lifecycle, no later than 90 days after Google releases
					their monthly bulletins for security releases, and more often for additional security or functionality fixes as reported by customers
					and partners.</p>
				<p>When an update is released for a Rhino device, it may take a period of time for the device to download, update, and ultimately reboot
					into the new software version. Network conditions, enterprise policies, global replication across OTA servers, and more may all impact
					the time taken for the update to become available.</p>
				<p>The releases below are in date order (newest > oldest). For release information, please click the build number of a release, or to
					directly download the update (either incremental or full) click the respective download icon.</p>

					<h2>Scheduled releases</h2>
					<p>Below are scheduled releases currently undergoing development and/or approval. The ETA provided is a guide and not a firm commitment.</p>
					<div id="releases_list">
						<div id="support_table">
							<table class="tg">
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
											ETA
										</th>
								  </tr>
								</thead>
								<tbody>
									@foreach($content->getChildren() as $result)
									@if ($result->scheduled == 'true')
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
											@isset($result->softwareeta)
											@if($result->softwareeta !== '')
												{{ $result->softwareeta }}
											@endif
											@endisset
										</td>
								  </tr>
									@endif
									@endforeach
								</tbody>
							</table>
						</div>
					</div>

				<h2>Releases</h2>
				<div id="releases_list">
					<div id="support_table">
						<table class="tg">
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
							    <th class="tg-0lax">
										Full
									</th>
							  </tr>
							</thead>
							<tbody>
								@foreach($content->getChildren() as $result)
								@if ($result->scheduled != 'true')
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
							    <td class="tg-0lax">
										@isset($result->fullotaurl)
										@if($result->fullotaurl !== '')
											<a href="{{ $result->fullotaurl }}"><i class="fas fa-cloud-download-alt"></i></a>
										@endif
										@endisset
									</td>
							  </tr>
								@endif
								@endforeach
							</tbody>
						</table>
						<p>
							<b>SKU</b> - The unique software branch. Global is 001, for reference. <br>
							<b>Type</b> - The type of release: maintenance (MR), security (SMR), launch (LR), or initial (IR). <br>
							<b>Build #</b> - The build number of the software release. <br>
							<b>SPL</b> - The Security Patch Level applied, these are published by Google monthly, and applied to Rhino devices on a 90 day basis. <br>
							<b>OTA</b> - The OTA file containing the standard, incremental update normally sent to devices. Use <a href="/support/update-via-adb">ADB sideload</a> or <a href="/support/update-via-sdcard">SD upgrade</a> to update. <br>
							<b>Full</b> - The OTA file containing the <i>full</i> update package which can be applied over any <b>previous</b> software version to bring the device up to date immediately, avoiding multiple incremental updates. Use <a href="/support/update-via-adb">ADB sideload</a> or <a href="/support/update-via-sdcard">SD upgrade</a> to update.
						</p>
					</div>
				</div>
			</div>
			<div class="article-bottom-links">
				<a target="_blank" href="{{ route('export-to-pdf', ['content' => $content->url]) }}"><i
							style="padding-right: 10px;" class="fas fa-file"></i>Download as PDF</a>
				<a target="_blank" href=""><i style="padding-right: 10px;" class="far fa-exclamation-triangle"></i>Report
					Content</a>
				<a target="_blank" onclick="window.print()"><i style="padding-right: 10px;" class="fas fa-print"></i>Print</a>
			</div>
		</article>
	</section>
@endsection
