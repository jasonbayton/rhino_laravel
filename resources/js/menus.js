window.toggleNavMenu = () => {
	document.getElementById('aside-menu')
		.classList
		.toggle('aside-content-hidden');
}

window.toggleTocMenu = () => {
	document.getElementById('mobile_article_contents_list')
		.classList
		.toggle('toc-content-hidden');
}

window.toggleMainMenu = (x) => {
	//update the burger to be a cross
	x.classList.toggle('change');
	
	//prevent the page from scrolling
	document.body.classList.toggle('overflow-hidden');
	
	//toggle the menu visibility
	document.getElementById('menu_overlay')
		.classList
		.toggle('menu_overlay_hidden');
}
