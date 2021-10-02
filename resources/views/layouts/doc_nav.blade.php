<div id="aside_docs">
	<div class="aside-title" onclick="toggleNavMenu()">
		<!--h2>{{ $content->parentID ?? 'Navigation' }}</h2-->
		<h2>Support</h2>
	</div>
	<div id="aside-menu" class="aside-content-hidden">
		@foreach($topics as $header => $entries)
			<details @if($content->topic !== '' && strtolower($header) == strtolower($content->topic)) open @endif class="docnav-topic">
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
