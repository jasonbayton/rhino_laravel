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
				Check your Device Warranty
			</h2>
				<div id="literal_content" class="js-toc-content">
					<p>
						Please enter an IMEI number into the field below to search for your device warranty details.
					</p>
					<x-quick-search action="{{ route('warranty') }}" name="imei"/>
						@if(!$warranty)

						@elseif($warranty === 'not-found')
							<h1>No device matches the IMEI provided. Please check the IMEI and try again.</h1>
						@else
							<div id="warranty-container">
								<div>
									@if($warranty->inWarranty()) <span class="warranty-valid warranty-message">Warranty Valid</span> @else <span class="warranty-invalid warranty-message">Warranty Expired</span> @endif
								</div>
								<div>
									Device: <span class="font-bold">{{ $warranty->manufacturer }} - {{ $warranty->model }}</span>
								</div>
								<div>
									Purchase: <span class="font-bold">{{ $warranty->orderDate->format('d/m/Y') }}</span>
								</div>
								<div>
									Warranty valid until: <span class="font-bold">{{ $warranty->warrantyExpiryDate()->format('d/m/Y') }}</span>
								</div>
							</div>
						@endif
				</div>
		</article>
	</section>
@endsection
