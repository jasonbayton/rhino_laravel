<div class="aside-title" onclick="toggleNavMenu()">
  <h2>Navigation</h2>
</div>
<div id="aside-menu" class="aside-content-hidden docnav-topic">
  <details>
    <summary class="docnav-topic-heading">
      Devices
    </summary>

    <!-- list all pages with parent Devices here -->

  </details>

  <details>
    <summary class="docnav-topic-heading">
      Support
    </summary>

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

  </details>

  <details>
    <summary class="docnav-topic-heading">
      Security
    </summary>

    <!-- list all pages with parent Security here -->

  </details>
