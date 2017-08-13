<?php 
		if('page' == get_option('show_on_front')){ get_template_part('index');}

		else {get_header();
		
		//****** get index static banner  ********
		get_template_part('index', 'slider');
		
		//****** Orange Sidebar Area ********
		get_sidebar('orange');
		//****** get index service  ********				
		get_template_part('index', 'service');
		
		//****** get Home call out
		get_template_part('index','home-callout'); 	

		//****** get index News  ********
		get_template_part('index', 'news');
				
		get_footer();
		}
?>