<div id="aside_page">
	<div class="aside-title" onclick="toggleNavMenu()">
		<h2>Navigation</h2>
	</div>
	<div id="aside-menu" class="aside-content-hidden">
		@foreach($menu as $header => $entries)
			<details class="docnav-topic">
				<summary class="docnav-topic-title">
					{{ $header }}
				</summary>
				<ul>
					@foreach($entries as $entry)
						<li><a href="{{ $entry->url }}">{{ $entry->title }}</a></li>
					@endforeach
				</ul>
			</details>
		@endforeach
	</div>
</div>
