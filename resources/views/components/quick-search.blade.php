<form {{ $attributes->merge(['action' => '/search', 'method' => 'GET', 'class' => 'quick-search', 'nav-quick-search']) }}>
	<input type="text" placeholder="Search..." name="{{ $name }}" id="{{ $name }}" class="search-input nav-search-input">
	<button class="search-button nav-search-button">
		<i class="fal fa-search"></i>
	</button>
</form>
