<div id="footer_container">
</div>
<div id="made_with_container">
  <div id="made_with">
    &#169; Rhino Mobility, 2019-<?php echo date("Y"); ?>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tocbot/4.11.1/tocbot.min.js"></script>
<script src="{{ asset('js/fitvids.js') }}"></script>
<script src="{{ asset('js/darkmodetoggle.js') }}"></script>
{{--some script stuff to go here from footer.php--}}
@if($content->type === 'doc' || $content->type === 'post' || $content->type === 'doc_parent')
  <script src="{{ asset('js/tocbot.js') }}"></script>
@endif
