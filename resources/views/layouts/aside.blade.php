<div class="aside-container">
    @includeWhen($content->type === 'doc', 'layouts.meta')
    @includeWhen($content->type === 'doc', 'layouts.doc_nav')
    @includeWhen($content->type === 'doc_parent' || $content->type === 'grid', 'layouts.page_nav')
</div>
