<div class="aside-title" onclick="toggleNavMenu()">
  <h2>Navigation</h2>
</div>
<div id="aside-menu" class="aside-content-hidden docnav-topic">
  <div class="globnav-wrapper">
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
</div>
<div class="globnav-wrapper">
  <details @if($content->parent !== '' && strtolower($content->parent) == "support") open @endif  class="docnav-topic">
    <summary class="docnav-topic-heading">
      Support
    </summary>
    <div class="nested-details">
    @foreach($supportmenu as $header => $entries)
			<details @if($content->topic !== '' && strtolower($header) == strtolower($content->topic)) open @endif  class="docnav-topic">
				<summary class="docnav-topic-title">
					{{ $header }}
				</summary>
				<ul>
					@foreach($entries as $entry)
            @if($loop->iteration > 5)
              @break
            @endif
						<li><a href="{{ $entry->url }}">{{ $entry->title }}</a></li>
					@endforeach
            <li><a href="/support/#{{ $header }}">> View more...</a>
				</ul>
			</details>
		@endforeach
</div>
  </details>
</div>


<div class="globnav-wrapper">
  <details @if($content->parent !== '' && (strtolower($content->parent) == "security" || strtolower($content->parent) == "releases") open @endif  class="docnav-topic">
    <summary class="docnav-topic-heading">
      Security
    </summary>
    <!-- list all pages with parent Security here -->

    @foreach($securitymenu as $header => $entry)
      @if($entry->getChildren()->isNotEmpty())
      <ul>
        <li><details class="docnav-topic no-padding">
          <summary class="docnav-topic-subtitle">
            {{ $entry->title }} <sup><a href="{{ $entry->url }}"><i class="fal fa-external-link-alt"></i></a></sup>
          </summary>
          <ul>
            @foreach($entry->getChildren() as $child)
              <li>
                <a href="{{ $child->url }}">{{ $child->title }}</a>
              </li>
            @endforeach
          </ul>
        </details>
      </li>
      @else
        @foreach($securitymenu as $header => $entry)
          @if($entry->getChildren()->isEmpty())
            <li>
              <a href="{{ $entry->url }}">{{ $entry->title }}</a>
            </li>
          @endif
        @endforeach
      </ul>
      @endif
    @endforeach
  </details>
</div>
