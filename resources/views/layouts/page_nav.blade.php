<div id="aside_page">
	<div class="aside-title" onclick="toggleNavMenu()">
		<h2>Navigation</h2>
	</div>
	<div id="aside-menu" class="aside-content-hidden">
		@foreach($navigation->getChildren() as $header => $entries)
			<details @if($entries->topic !== '' && strtolower($entries->topic) == strtolower($content->topic)) open @endif class="docnav-topic">
				<summary class="docnav-topic-title">
					{{ $entries->title }}
				</summary>
				<ul>
					@foreach($entries->getChildren() as $entry)
						<li><a href="{{ $entry->url }}">{{ $entry->title }}</a></li>
					@endforeach
				</ul>
			</details>
		@endforeach
	</div>
</div>
