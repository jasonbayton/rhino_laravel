@extends('layouts.app')

@section('content')

</div> <!-- to remove max width -->
<section id="bold_intro">
	<div id="hero_rhino">
		<div class="hero-grid">
			<div class="pull-left">
				<div id="hero_intro">
					<h2>Rhino Support</h2>
					<p>Looking for support for your Rhino device?</p>
					<p>The support centre offers help articles, FAQs,
					product guides, user manuals, and more. Use the
					search function below or click a device/topic accordingly.</p>
					<p>Rhino publishes all public device updates as they go out. View
					Software releases for more information, below.</p>
				</div>
			</div>
			<div class="pull-right">
				<img id="rhino_c10" src="/img/c10-front.png" alt="rhino c10">
			</div>
		</div>
	</div>
</section>
<div class="front-max-width"> <!-- Reviving max-width -->
	<section id="path">
		<div class="front-search">
			<div>
				<h2>How can we help?</h2>
				<p>Search by keyword or task</p>
				<form action="/search" method="GET" class="front-quick-search">
					<input type="text" placeholder="How to perform a factory reset" name="search"
						   class="front-search-input">
					<button class="front-search-button">
						<i class="fal fa-search"></i>
					</button>
				</form>
			</div>
		</div>

		<div id="home_container">
			<div>
				<a href="/devices/t8" class="card">
					<img class="product-image" src="/assets/rhino-t8.png" alt="rhino t8">
					<div class="card-header">Rhino T8</div>
					<div class="card-text">
						Product documentation for the Rhino T8 includes guides, FAQ, downloads, spec, help docs etc
					</div>
				</a>
			</div>
			<div>
				<a href="/devices/c10" class="card">
					<img class="product-image" src="/assets/rhino-c10.png" alt="rhino c10">
					<div class="card-header">Rhino C10</div>
					<div class="card-text">
						Product documentation for the Rhino C10 includes guides, FAQ, downloads, spec, help docs etc
					</div>
				</a>
			</div>
			<div>
				<a href="/devices/t5se" class="card">
					<img class="product-image" src="/assets/rhino-t5se.png" alt="rhino t5se">
					<div class="card-header">Rhino T5se</div>
					<div class="card-text">
						Product documentation for the Rhino T5se includes guides, FAQ, downloads, spec, help docs etc
					</div>
				</a>
			</div>
			<div>
				<a href="/devices/m10p" class="card">
					<img class="product-image" src="/assets/rhino-m10p.png" alt="rhino m10p">
					<div class="card-header">Rhino M10p</div>
					<div class="card-text">
						Product documentation for the Rhino M10p includes guides, FAQ, downloads, spec, help docs etc
					</div>
				</a>
			</div>
			<div>
				<a href="/security/releases" class="card">
					<div class="card-icon text-success">
						<!--i class="fas fa-play-circle"></i--><i class="fas fa-rocket-launch"></i>
					</div>
					<div class="card-header">Software releases</div>
					<div class="card-text">
						View release changelogs for your Rhino devices, and download releases for offline application
					</div>
				</a>
			</div>
			<div>
				<a href="/support" class="card">
					<div class="card-icon rhino-purple">
						<i class="fas fa-user-headset"></i>
					</div>
					<div class="card-header">Knowledge base</div>
					<div class="card-text">
						For all of your support needs. Check here if you have a question that demands an answer
					</div>
				</a>
			</div>
			<div class="rhino-security">
				<a href="/security" class="card flexed-card">
					<div class="card-icon rhino-security-icon rhino-blue">
						<i class="fas fa-shield-check"></i>
					</div>
					<div class="rhino-security-text">
						<div class="card-header">Rhino Security</div>
						<div class="card-text">
							View release notes for system updates, support lifecycle for Rhino devices, download OTA
							updates	for offline deployment and view or participate in the Rhino vulnerability program.
						</div>
					</div>
				</a>
			</div>
			<div class="rhino-help">
				<a href="/support/escalate" class="card flexed-card">
					<div class="card-icon rhino-help-icon">
						<i class="far fa-life-ring"></i>
					</div>
					<div class="rhino-security-text">
						<div class="card-header">Get help</div>
						<div class="card-text">
							<p>Checked our docs and still need help? Suffering issues that may require an RMA under
								warranty, or repair outside of warranty?</p>
							<p>Click through for guidance on what to collect before reaching out, and means of contact
								once you're ready to talk to the Rhino team</p>
						</div>
					</div>
				</a>
			</div>
			<div>
				<a href="#" class="card">
					<div class="card-icon card-disabled">
						<!--i class="fas fa-comments-alt"></i--><i class="far fa-construction"></i>
					</div>
					<div class="card-header">Community Forum</div>
					<div class="card-text">
						Coming soon: For enterprise and consumer customers alike, find answers to your questions through the
						community
					</div>
				</a>
			</div>
		</div>
	</section>
@endsection
