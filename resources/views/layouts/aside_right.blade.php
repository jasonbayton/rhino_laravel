<div class="aside-container">
    @if($content->type === 'doc' || $content->type === 'post' || $content->type === 'doc_parent')
        @include('layouts.toc')
    @endif
</div>
