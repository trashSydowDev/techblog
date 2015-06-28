function CodeHighlight($el) {
  $el.find('pre code').each(function(i, block) {
    hljs.highlightBlock(block);
  });
}
