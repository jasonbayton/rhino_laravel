<div id="aside_docs">
    <div class="aside-title">
        <h2>{{ $content->parent }}</h2>
    </div>
    @if($content->getRelatedContent())
        @foreach($content->getRelatedContent()[0] as $topic)
            <details @if($topic['topic'] == $content->topic) open @endif class="docnav-topic">
                <summary  class="docnav-topic-title">
                    {{ $topic['topic'] }}
                </summary>
                <ul>
                    @foreach($topic['entries'] as $entry)
                        <li><a href="{{ $entry->url }}">{{ $entry->title }}</a></li>
                    @endforeach
                </ul>
            </details>
        @endforeach
    @endif
</div>
