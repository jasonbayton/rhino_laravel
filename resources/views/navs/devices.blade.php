<div id="aside_page">
	<div class="aside-title" onclick="toggleNavMenu()">
		<h2>Navigation</h2>
	</div>
	<div id="aside-menu" class="aside-content-hidden docnav-topic">
    <details class="docnav-topic" open>
      <summary class="docnav-topic-heading">
        Devices
      </summary>
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

<details class="docnav-topic" open>
  <summary class="docnav-topic-heading">
    Support
  </summary>
</details>

<details class="docnav-topic" open>
  <summary class="docnav-topic-heading">
    Security
  </summary>
</details>
  </div>

</div>
