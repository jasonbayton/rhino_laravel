<div id="aside_page">
	<div class="aside-title" style="cursor: pointer" onclick="toggleNavMenu()">
		<h2>Navigation</h2>
	</div>
	<div id="aside-menu" class="aside-content-hidden">
		@foreach($menu as $header => $entries)
			<details @if($content->topic !== '' && strtolower($header) == strtolower($content->topic)) open @endif  class="docnav-topic">
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
