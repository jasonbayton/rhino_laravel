<div class="aside-container">
    @include($nav)
{{--	@includeWhen($content->type === 'doc', 'layouts.meta')--}}
{{--	@includeWhen($content->type === 'doc', 'layouts.doc_nav')--}}
{{--	@includeWhen($content->type === 'doc_parent' || $content->type === 'grid', 'layouts.page_nav')--}}
</div>
<!--div id="mobile_aside_contents">
    <div class="aside-title" onclick="toggleTocMenu()">
        <h2>Contents</h2>
    </div>
    <div id="mobile_article_contents_list" class="js-toc-mobile toc-content-hidden">
        <!-- Taken care of by Tocbot -->
    <!--/div-->
<!--/div-->
