<?php
/* Includes all style and script files
 */
function appointment_scripts()
 {
		wp_enqueue_style('appointment-style', get_stylesheet_uri() );
		wp_enqueue_style('appointment-bootstrap-css',WEBRITI_TEMPLATE_DIR_URI.'/css/bootstrap.css');
		wp_enqueue_style('appointment-default',WEBRITI_TEMPLATE_DIR_URI.'/css/default.css');
		wp_enqueue_style('appointment-menu-css',WEBRITI_TEMPLATE_DIR_URI.'/css/theme-menu.css');
		wp_enqueue_style('appointment-element-css',WEBRITI_TEMPLATE_DIR_URI.'/css/element.css');
		
	/* Font Awesome */
       wp_enqueue_style('appointment-font-awesome-min', WEBRITI_TEMPLATE_DIR_URI . '/css/font-awesome/css/font-awesome.min.css');		
    /* Media Responsive Css */
		wp_enqueue_style('appointment-media-responsive-css',WEBRITI_TEMPLATE_DIR_URI.'/css/media-responsive.css');	
	/* Bootstrap Js */
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script('appointment-bootstrap-js' , WEBRITI_TEMPLATE_DIR_URI.'/js/bootstrap.min.js');
		wp_enqueue_script('appointment-menu-js' , WEBRITI_TEMPLATE_DIR_URI.'/js/menu/menu.js');
		wp_enqueue_script('appointment-page-scroll-js' , WEBRITI_TEMPLATE_DIR_URI.'/js/page-scroll.js');
		wp_enqueue_script('appointment-carousel-js' , WEBRITI_TEMPLATE_DIR_URI.'/js/carousel.js');
		
		if ( is_singular() ){ wp_enqueue_script( "comment-reply" );	}
		}
add_action('wp_enqueue_scripts','appointment_scripts');

function appointment_custmizer_style()
 {
		wp_enqueue_style('appointment-customizer-css',WEBRITI_TEMPLATE_DIR_URI.'/css/cust-style.css');
}
add_action('customize_controls_print_styles','appointment_custmizer_style');

add_action('wp_head','head_enqueue_custom_css');



function head_enqueue_custom_css()
{
	$appointment_options=theme_setup_data(); 
	$custom_css = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options);
	if($custom_css['webrit_custom_css']!='') {  ?>
	<style>
	<?php echo $custom_css['webrit_custom_css']; ?>
	</style>
	<?php } 
}
// define the customize_controls_enqueue_scripts callback
function custom_customize_enqueue(  ) 
{
    wp_enqueue_script( 'custom-customize', WEBRITI_TEMPLATE_DIR_URI. '/js/custom.customize.js', array( 'jquery', 'customize-controls' ), true );
};   
// add the action
add_action( 'customize_controls_enqueue_scripts', 'custom_customize_enqueue', 10, 0 );
?>