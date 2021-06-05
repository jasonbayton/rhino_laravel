@extends('layouts.app')

@section('content')

</div> <!-- to remove max width -->
<section id="bold_intro">
	<div id="hero_rhino">
		<div id="statement">
			<h1>Devices <strong>made</strong> for enterprise</h1>
		</div>
		<div class="hero-grid">
			<div class="pull-left">
				<div id="hero_intro">
					<h2>Security & Support</h2>
					<p>All Rhino devices benefit from security
						updates within 90 days of release from Google,
						normally sooner, for up to 5 years. Additionally,
						Rhino devices receive at least one letter upgrade.</p>
					<p> Looking for manuals, product support, FAQs or
						something else? Keep scrolling.</p>
				</div>
			</div>
			<div class="pull-right">
				<img id="rhino_c10" src="/img/c10-front.png" alt="rhino c10">
			</div>
		</div>
	</div>
</section>
<div class="max-width"> <!-- Reviving max-width -->
	<section id="path">
		<div id="home_container">
			<div>
				<div class="card">
					<img class="product-image" src="/assets/rhino-t8.png" alt="rhino t8">
					<div class="card-header">Rhino T8</div>
					<div class="card-text">
						Product documentation for the Rhino T8 includes guides, FAQ, downloads, spec, help docs etc
					</div>
				</div>
			</div>
			<div>
				<div class="card">
					<img class="product-image" src="/assets/rhino-c10.png" alt="rhino c10">
					<div class="card-header">Rhino C10</div>
					<div class="card-text">
						Product documentation for the Rhino C10 includes guides, FAQ, downloads, spec, help docs etc
					</div>
				</div>
			</div>
			<div>
				<div class="card">
					<img class="product-image" src="/assets/rhino-t5se.png" alt="rhino t5se">
					<div class="card-header">Rhino T5se</div>
					<div class="card-text">
						Product documentation for the Rhino T5se includes guides, FAQ, downloads, spec, help docs etc
					</div>
				</div>
			</div>
			<div>
				<div class="card">
					<img class="product-image" src="/assets/rhino-m10p.png" alt="rhino m10p">
					<div class="card-header">Rhino M10p</div>
					<div class="card-text">
						Product documentation for the Rhino M10p includes guides, FAQ, downloads, spec, help docs etc
					</div>
				</div>
			</div>
			<div>
				<div class="card">
					<div class="card-icon">
						<i class="fas fa-play-circle"></i>
					</div>
					<div class="card-header">Product Videos</div>
					<div class="card-text">
						View product videos covering common topics including issues, setup, troubleshooting and more
					</div>
				</div>
			</div>
			<div>
				<div class="card">
					<div class="card-icon">
						<i class="fas fa-question-circle"></i>
					</div>
					<div class="card-header">FAQs</div>
					<div class="card-text">
						Product non-specific frequently asked questions. Check here if you can't find and answer
						elsewhere
					</div>
				</div>
			</div>
			<div class="rhino-security">
				<div class="card">
					<div class="rhino-security-icon">
						<i class="fas fa-shield-check"></i>
					</div>
					<div class="rhino-security-text">
						<div class="card-header">Rhino Security</div>
						<div class="card-text">
							View release notes for system updates, support lifecycle for Rhino devices, download OTA
							updates
							for offline deployment and view or participate in the Rhino vulnerability program.
						</div>
					</div>
				</div>
			</div>
			<div class="rhino-help">
				<div class="card">
					<div class="rhino-help-icon">
						<i class="far fa-life-ring"></i>
					</div>
					<div class="rhino-security-text">
						<div class="card-header" style="text-align: left;">Get help</div>
						<div class="card-text">
							<p>Checked our docs and still need help? Suffering issues that may require an RMA under
								warranty, or repair outside of warranty?</p>
							<p>Click through for guidance on what to collect before reaching out, and means of contact
								once
								you're ready to talk to the Rhino team</p>
						</div>
					</div>
				</div>
			</div>
			<div>
				<div class="card">
					<div class="card-icon">
						<i class="fas fa-comments-alt"></i>
					</div>
					<div class="card-header">Community Forum</div>
					<div class="card-text">
						For enterprise and consumer customers alike, find answers to your questions through the
						community
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
