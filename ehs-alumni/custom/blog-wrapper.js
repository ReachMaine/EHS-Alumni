
jQuery(document).ready(function($) {

	// wrap blog article elements on archive pages
	$('.et_pb_post').contents().filter(function() {
	    return this.nodeType == 3 && $.trim(this.nodeValue).length;
		})
		.wrap('<p class="post-content">');

	$('.blog .et_pb_post, .archive .et_pb_post, .search .et_pb_post').each(function () {
		$('>:not(a.entry-featured-image-url)', this).wrapAll('<div class="article-wrap"></div>');
			$('>a.entry-featured-image-url', this).wrapAll('<div class="image-wrap"></div>');
	});

});
