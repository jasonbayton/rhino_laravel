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
