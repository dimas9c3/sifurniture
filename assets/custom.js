var appMaster = {
	productCarousel: function(){
		$(".popular-product-carousel").owlCarousel({
			margin:30,
			autoplay:false,
			smartSpeed:1600,
			navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
			responsiveClass:true,
			dots: false,
			responsive:{
				0:
					{
						items:1,
						nav:false,
						loop:true
					},
				380:
					{
						items:1,
						nav:false,
						loop:true
					},
				560:
					{
						items:2,
						nav:false,
						loop:true
					},
				768:
					{
						items:3,
						nav:true,
						loop:true
					},
				992:
					{
						items:4,
						nav:true,
						loop:true
					},
				1200:
					{
						items:4,
						nav:true,
						loop:true,
					}
			}
		});
	}
}

$(document).ready(function() {

	appMaster.choosingTab();

});
