;( function($, _, undefined){
	"use strict";

	ips.controller.register('plugins.siteMessageDismiss', {

		initialize: function () {
			this.on( document, 'click', '[data-action="dismiss"]', this.dismiss );
		},

		dismiss: function (e) {
			e.preventDefault();
			var url = $( e.currentTarget ).attr('href');
			var message = $(this.scope);

			ips.getAjax()(url).done(function(){
				ips.utils.anim.go( 'fadeOut', message );
			}).fail(function(){
				window.location = url;
			});
		}

	});
}(jQuery, _));
