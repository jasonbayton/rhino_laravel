@extends('layouts.app')

@section('content')

</div> <!-- to remove max width -->
<section id="bold_intro">
	<div id="hero_rhino">
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
				<a href="/support/t8" class="card">
					<img class="product-image" src="/assets/rhino-t8.png" alt="rhino t8">
					<div class="card-header">Rhino T8</div>
					<div class="card-text">
						Product documentation for the Rhino T8 includes guides, FAQ, downloads, spec, help docs etc
					</div>
                    <div class="click-choice">
                        <centre><a href="/support/t8">Support</a> | <a href="/security/releases/t8">Releases</a></center>
                    </div>
				</a>
			</div>
			<div>
				<a href="/support/c10" class="card">
					<img class="product-image" src="/assets/rhino-c10.png" alt="rhino c10">
					<div class="card-header">Rhino C10</div>
					<div class="card-text">
						Product documentation for the Rhino C10 includes guides, FAQ, downloads, spec, help docs etc
					</div>
                    <div class="click-choice">
                        <centre><a href="/support/c10">Support</a> | <a href="/security/releases/c10">Releases</a></center>
                    </div>
				</a>
			</div>
			<div>
				<a href="/support/t5se" class="card">
					<img class="product-image" src="/assets/rhino-t5se.png" alt="rhino t5se">
					<div class="card-header">Rhino T5se</div>
					<div class="card-text">
						Product documentation for the Rhino T5se includes guides, FAQ, downloads, spec, help docs etc
					</div>
                    <div class="click-choice">
                        <centre><a href="/support/t5se">Support</a> | <a href="/security/releases/t5se">Releases</a></center>
                    </div>
				</a>
			</div>
			<div>
				<a href="/support/m10p" class="card">
					<img class="product-image" src="/assets/rhino-m10p.png" alt="rhino m10p">
					<div class="card-header">Rhino M10p</div>
					<div class="card-text">
						Product documentation for the Rhino M10p includes guides, FAQ, downloads, spec, help docs etc
					</div>
                    <div class="click-choice">
                        <centre><a href="/support/m10p">Support</a> | <a href="/security/releases/m10p">Releases</a></center>
                    </div>
				</a>
			</div>
			<div>
				<a href="#" class="card">
					<div class="card-icon">
						<!--i class="fas fa-play-circle"></i--><i class="far fa-construction"></i>
					</div>
					<div class="card-header">Product Videos</div>
					<div class="card-text">
						Coming soon: View product videos covering common topics including issues, setup, troubleshooting and more
					</div>
				</a>
			</div>
			<div>
				<a href="/support" class="card">
					<div class="card-icon">
						<i class="fas fa-question-circle"></i>
					</div>
					<div class="card-header">FAQs</div>
					<div class="card-text">
						Product non-specific frequently asked questions. Check here if you can't find and answer
						elsewhere
					</div>
				</a>
			</div>
			<div class="rhino-security">
				<a href="/security" class="card flexed-card">
					<div class="card-icon rhino-security-icon">
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
				</a>
			</div>
			<div class="rhino-help">
				<a href="/support/escalation" class="card flexed-card">
					<div class="card-icon rhino-help-icon">
						<i class="far fa-life-ring"></i>
					</div>
					<div class="rhino-security-text">
						<div class="card-header">Get help</div>
						<div class="card-text">
							<p>Checked our docs and still need help? Suffering issues that may require an RMA under
								warranty, or repair outside of warranty?</p>
							<p>Click through for guidance on what to collect before reaching out, and means of contact
								once
								you're ready to talk to the Rhino team</p>
						</div>
					</div>
				</a>
			</div>
			<div>
				<a href="#" class="card">
					<div class="card-icon">
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
