<header>
	@if(Request::is('/'))
		<div id="front_header_container" class="">
			<a href="/" id="rhino_header">
				<img src="{{ asset('assets/rhino-logo.png') }}" alt="rhino logo" width="45px"/>
				<div id="rhino_title">
					RHINO
				</div>
			</a>
		</div>
	@else
		<div id="header_container" class="">
			<a href="/" id="rhino_header">
				<img src="{{ asset('assets/rhino-logo.png') }}" alt="rhino logo" width="45px"/>
				<div id="rhino_title">
					RHINO
				</div>
			</a>
			<nav>
				<!--div id="nav_links">
					<a href="/support">Support</a> <a href="/security">Security</a>
				</div>
				<div id="darktoggle">
					<i class="fas fa-clouds-moon"></i>
				</div-->
			</nav>
			<div id="search_container_nav">
				<form action="/search" method="GET" class="quick-search nav-quick-search">
					<input type="text" placeholder="Search..." name="search" class="search-input nav-search-input">
					<button class="search-button nav-search-button">
						<i class="fal fa-search"></i>
					</button>
				</form>
			</div>
			<div class="burger" onclick="toggleMainMenu(this)">
				<div class="bar1"></div>
				<div class="bar2"></div>
				<div class="bar3"></div>
			</div>
		</div>
		<div id="menu_overlay" class="menu_overlay_hidden">
			<div class="menu_overlay_title">
				Main
			</div>
			<div class="menu_overlay_content">
				@foreach($mainMenu as $menu)
					@if(isset($menu['href']))
					<div class="docnav-topic">
						<div class="docnav-topic-title">
							<a href="{{ $menu['href'] }}">{{ $menu['name'] }}</a>
						</div>
					</div>
					@else
					<details class="docnav-topic">
						<summary class="docnav-topic-title">
							{{ $menu['name'] }}
						</summary>
						<ul>
							@if(isset($menu['items']))
								@foreach($menu['items'] as $subMenuItem)
									<li><a href="{{ $subMenuItem['href'] }}">{{ $subMenuItem['name'] }}</a></li>
								@endforeach
							@endif
						</ul>
					</details>
					@endif
				@endforeach
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
