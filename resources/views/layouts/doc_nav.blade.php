<div id="aside_docs">
	<div class="aside-title">
		<h2>{{ $content->parentID }}</h2>
	</div>
	@foreach($topics as $header => $entries)
		<details @if($header == $content->topic) open @endif class="docnav-topic">
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
