<div id="aside_meta">
    <div class="aside-title">
        <h2>Meta</h2>
    </div>
    <div class="aside-meta">
        Published: {{ $content->date->format('M d, Y') }}
    </div>
    @if($content->updated)
        <div class="aside-meta">
            Updated: {{ $content->updated->format('M d, Y') }}
        </div>
    @endif
    <div class="aside-meta">
        Read time: {{ $content->readTime() }}
    </div>
</div>
