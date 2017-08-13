<?php	
add_action( 'widgets_init', 'appointment_widgets_init');
function appointment_widgets_init() {

/*sidebar*/
register_sidebar( array(
		'name' => __('Sidebar widget area', 'appointment' ),
		'id' => 'sidebar-primary',
		'description' => __( 'Sidebar widget area', 'appointment' ),
		'before_widget' => '<div class="sidebar-widget">',
		'after_widget' => '</div>',
		'before_title' => '<div class="sidebar-widget-title"><h3>',
		'after_title' => '</h3></div>',
	) );
register_sidebar( array(
		'name' => __( 'Footer widget area', 'appointment' ),
		'id' => 'footer-widget-area',
		'description' => __('Footer widget area', 'appointment' ),
		'before_widget' => '<div class="col-md-3 col-sm-6 footer-widget-column">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="footer-widget-title">',
		'after_title' => '</h3>',
	) );
//orange sidebar
register_sidebar( array(
		'name' => __( 'Left widget area below slider', 'appointment' ),
		'id' => 'home-orange-sidebar_left',
		'description' => __( 'Left widget area below slider', 'appointment' ),
		'before_widget' => '',
		'after_widget' => '<div class="clearfix"></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Right widget area below slider', 'appointment' ),
		'id' => 'home-orange-sidebar_right',
		'description' => __( 'Right widget area below slider', 'appointment' ),
		'before_widget' => '',
		'after_widget' => '<div class="clearfix"></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Center widget area below slider', 'appointment' ),
		'id' => 'home-orange-sidebar_center',
		'description' => __('Center widget area below slider', 'appointment' ),
		'before_widget' => '',
		'after_widget' => '<div class="clearfix"></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
}	                     
?>