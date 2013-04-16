var Site = {
	initGallery: function(index_gallery, gallery) {
		$(gallery).find(".thumbs img, .thumbs .fake_img").each(function(index_thumb, thumb){
			$(this).click(function() {
				$(gallery).find("p").removeClass("caption");
				
				var p = $(gallery).find("p:eq(" + index_thumb + ")").addClass("caption");
				
				var src = $(thumb).attr("src").replace("thumbs/", "");
				$(gallery).find(".viewer").empty().css("background-image", "url(" + src + ")");
			});
		});
		
		$(gallery).find(".thumbs img:eq(0)").click();		
	},
	
	toggleView: function(elem, id) {
		var gallery = $(elem).parents(".gallery");
		var view = $("#" + id).clone();
		
		view.attr("id", "").show();		
		
		gallery.find(".viewer").html(view).css("background-image", "none");
	},
	
	init: function() {
		$(".gallery").each(Site.initGallery)
	}	
};

$(document).ready(function() {
	Site.init();
})