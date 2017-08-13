jQuery(document).ready(function(){

		//	Project Scroll Js	
		jQuery('#newCarousel .item').each(function(){
				
		  var next = $(this).next();
		  if (!next.length) {
			next = $(this).siblings(':first');
		  }
		  next.children(':first-child').clone().appendTo($(this));
		  
		  for (var i=0;i<1;i++) {
			next=next.next();
			if (!next.length) {
				next = $(this).siblings(':first');
			}
			
			next.children(':first-child').clone().appendTo($(this));
		  }
		});
		

		
		
		
});
			
		