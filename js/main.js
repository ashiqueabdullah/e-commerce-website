(function ($) {
"use strict";

$(".owl-carousel").owlCarousel({
	items:1,
	loop:true,
	autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true

});


$('#sr').keyup(function(){
	var search=$('#sr').val();


	$.ajax({
		url:'ss.php',
		data:'usearch='+search,
		success:function(data){
			$('#res').html(data);
		}
	});
});

})(jQuery);	