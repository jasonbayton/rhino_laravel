<div id="aside_page">
	<div class="aside-title" style="cursor: pointer" onclick="toggleNavMenu()">
		<h2>Navigation</h2>
	</div>
	<div id="aside-menu" class="aside-content-hidden">
<ul>
@foreach($menu as $header => $entry)
  <li>
    <a href="{{ $entry->url }}">{{ $entry->title }}</a>
  </li>
</ul>
</div>
