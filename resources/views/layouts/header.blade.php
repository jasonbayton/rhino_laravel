<header>
	@if(Request::is('/'))
		<div id="front_header_container" class="">
			<a href="/" id="rhino_header">
				<img src="{{ asset('assets/rhino-logo.png') }}" alt="rhino logo" width="45px"/>
				<div id="rhino_title">
					RHINO
				</div>
			</a>
			<div class="burger" onclick="toggleMainMenu(this)">
				<div class="bar1"></div>
				<div class="bar2"></div>
				<div class="bar3"></div>
			</div>
		</div>
		<div id="menu_overlay" class="menu_overlay_hidden">
			<div id="menu_header">
				<h2 class="menu_overlay_title">
					Menu
				</h2>
				<div id="darktoggle">
					<i class="fas fa-clouds-moon"></i>
				</div>
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
	@else
		<div id="header_container" class="">
			<a href="/" id="rhino_header">
				<img src="{{ asset('assets/rhino-logo.png') }}" alt="rhino logo" width="45px"/>
				<div id="rhino_title">
					RHINO
				</div>
			</a>
			<div id="search_container_nav">
				<x-quick-search></x-quick-search>
				<div class="burger" onclick="toggleMainMenu(this)">
					<div class="bar1"></div>
					<div class="bar2"></div>
					<div class="bar3"></div>
				</div>
			</div>
		</div>
		<div id="menu_overlay" class="menu_overlay_hidden">
			<div id="menu_header">
				<h2 class="menu_overlay_title">
					Menu
				</h2>
				<div id="darktoggle">
					<i class="fas fa-clouds-moon"></i>
				</div>
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
