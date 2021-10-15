<div class="aside-title" onclick="toggleNavMenu()">
  <h2>Navigation</h2>
</div>
<div id="aside-menu" class="aside-content-hidden docnav-topic">
  <details @if($content->parent !== '' && strtolower($content->parent) == "devices") open @endif  class="docnav-topic">
    <summary class="docnav-topic-heading">
      Devices
    </summary>
    <!-- list all pages with parent Devices here -->
    <ul>
    @foreach($devicesmenu as $header => $entry)
      <li>
        <a href="{{ $entry->url }}">{{ $entry->title }}</a>
        @if($entry->getChildren()->isNotEmpty())
          <ul>
            @foreach($entry->getChildren() as $child)
              <li>
                <a href="{{ $child->url }}">{{ $child->title }}</a>
              </li>
            @endforeach
          </ul>
        @endif
      </li>
    @endforeach
    </ul>
  </details>

  <details>
    <summary class="docnav-topic-heading">
      Support
    </summary>

    @foreach($supportmenu as $header => $entries)
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
    <ul>
    @foreach($securitymenu as $header => $entry)
      <li>
        <a href="{{ $entry->url }}">{{ $entry->title }}</a>
        @if($entry->getChildren()->isNotEmpty())
          <ul>
            @foreach($entry->getChildren() as $child)
              <li>
                <a href="{{ $child->url }}">{{ $child->title }}</a>
              </li>
            @endforeach
          </ul>
        @endif
      </li>
    @endforeach
    </ul>

  </details>
