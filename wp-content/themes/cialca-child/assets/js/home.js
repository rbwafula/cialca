jQuery(document).ready(function($){
	'use strict';

	$(".products__inner > div.row.flex-items-xs-middle.row-no-gutter").click(function() {
		window.location.href = $(this).find("h3.product__item__title > a").attr("href");
		return false;
	});
});