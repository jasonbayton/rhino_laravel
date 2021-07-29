<div id="aside_page">
	<div class="aside-title">
		<h2>Navigation</h2>
		@foreach($navigation->getChildren() as $header => $entries)
			<details @if($header == $content->topic) open @endif class="docnav-topic">
				<summary class="docnav-topic-title">
					{{ $entries->title }}
				</summary>
				<ul>
					<li><a href="{{ $entries->url }}">{{ $entries->title }}</a></li>
					@foreach($entries->getChildren() as $entry)
						<li><a href="{{ $entry->url }}">{{ $entry->title }}</a></li>
					@endforeach
				</ul>
			</details>
		@endforeach
	</div>
</div>
