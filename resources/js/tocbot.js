tocbot.init({
  // Where to render the table of contents.
  tocSelector: '.js-toc',
  // Where to grab the headings to build the table of contents.
  contentSelector: '.js-toc-content',
  // Which headings to grab inside of the contentSelector element.
  headingSelector: 'h1, h2, h3, h4',
  // For headings inside relative or absolute positioned containers within content.
  hasInnerContainers: false,
  orderedList: false,
  collapseDepth: 4,
});

let toc = document.getElementsByClassName('js-toc')[0].innerHTML;

console.log(toc);

document.getElementById('mobile_article_contents_list').innerHTML = toc;
