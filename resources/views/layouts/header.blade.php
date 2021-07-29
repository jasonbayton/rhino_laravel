<header>
	@if(Request::is('/'))
		<div id="front_header_container" class="">
			<a href="/" id="rhino_header">
				<img src="{{ asset('assets/rhino-logo.png') }}" alt="rhino logo" width="64px"/>
				<div id="rhino_title">
					Rhino Mobility
				</div>
			</a>
			<div class="burger" onclick="">
				<div class="bar1"></div>
				<div class="bar2"></div>
				<div class="bar3"></div>
			</div>
		</div>

	@else
		<div id="header_container" class="">
			<a href="/" id="rhino_header">
				<img src="{{ asset('assets/rhino-logo.png') }}" alt="rhino logo" width="64px"/>
				<div id="rhino_title">
					Rhino Mobility
				</div>
			</a>
			<nav>
				<div id="nav_links">
					<a href="/support">Support</a> <a href="/security">Security</a>
				</div>
				<div id="darktoggle">
					<i class="fas fa-clouds-moon"></i>
				</div>
			</nav>
			<div class="burger" onclick="">
				<div class="bar1"></div>
				<div class="bar2"></div>
				<div class="bar3"></div>
			</div>
		</div>
		<div id="search_container">
			<form action="/search" method="GET" class="quick-search">
				<input type="text" placeholder="Search..." name="search" class="search-input">
				<button class="search-button">
					<i class="fal fa-search"></i>
				</button>
			</form>
		</div>
	@endif
</header>
