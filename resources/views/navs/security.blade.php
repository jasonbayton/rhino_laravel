<div id="aside_page">
	<div class="aside-title" onclick="toggleNavMenu()">
		<h2>Navigation</h2>
	</div>
	<div id="aside-menu" class="aside-content-hidden">
		<ul>
			@foreach($menu as $header => $entry)
				<li>
					<a href="{{ $entry->url }}">{{ $entry->title }}</a>
					@if($entry->getChildren())
						<ul>
							@foreach($entry->getChildren() as $child)
								<li>
									<a href="{{ $child->url }}">{{ $child->title }}</a>
								</li>
							@endforeach
						</ul>
				</li>
				@endif
			@endforeach
		</ul>
	</div>
</div>
