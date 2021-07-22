<div id="aside_page">
  <div class="aside-title">
  <h2>Navigation</h2>
    <ul>
        @foreach($navigation as $entry)
            <li><a href="{{ $entry['entry']->url }}">{{ $entry['entry']->title }}</a></li>
            @if(count($entry['children']))
                <ul>
                    @foreach($entry['children'] as $children)
                        <li><a href="{{ $children->url }}">{{ $children->title }}</a></li>
                    @endforeach
                </ul>
            @endif
        @endforeach
    </ul>
  </div>
</div>
