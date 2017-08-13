<?php
/**Theme Name	: Appointment
 * Theme Core Functions and Codes
*/
	/**Includes reqired resources here**/
	define('WEBRITI_TEMPLATE_DIR_URI', get_template_directory_uri());
    define('WEBRITI_TEMPLATE_DIR' , get_template_directory());
    define('WEBRITI_THEME_FUNCTIONS_PATH' , WEBRITI_TEMPLATE_DIR.'/functions');
	require( WEBRITI_THEME_FUNCTIONS_PATH .'/scripts/script.php');
    require( WEBRITI_THEME_FUNCTIONS_PATH .'/menu/default_menu_walker.php');
    require( WEBRITI_THEME_FUNCTIONS_PATH .'/menu/appoinment_nav_walker.php');
    require( WEBRITI_THEME_FUNCTIONS_PATH .'/widgets/sidebars.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH .'/widgets/appointment_info_widget.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/template-tag.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/breadcrumbs/breadcrumbs.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/font/font.php');
	//Customizer
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer_theme_style.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-callout.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-slider.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-copyright.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-header.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-news.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-service.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-pro.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-project.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-testimonial.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-client.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-footer-callout.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-template.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-emailcourse.php');
	
	// Appointment Info Page
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/appointment-info/welcome-screen.php');
	
	// Custom Category control 
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/custom-controls/select/category-dropdown-custom-control.php');
	/* Theme Setup Function */
	add_action( 'after_setup_theme', 'appointment_setup' );
	
	function appointment_setup()
	{	
	// Load text domain for translation-ready
    load_theme_textdomain( 'appointment', WEBRITI_THEME_FUNCTIONS_PATH . '/lang' );

	$header_args = array(
				 'flex-height' => true,
				 'height' => 200,
				 'flex-width' => true,
				 'width' => 1600,
				 'admin-head-callback' => 'mytheme_admin_header_style',
				 );
				 
				 add_theme_support( 'custom-header', $header_args );
    add_theme_support( 'post-thumbnails' ); //supports featured image
	// Register primary menu 
    register_nav_menu( 'primary', __('Primary Menu', 'appointment' ) );
	
	//Add Theme Support Title Tag
	add_theme_support( "title-tag" );
	
	// Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
	// Set the content_width with 900
    if ( ! isset( $content_width ) ) $content_width = 900;
	require_once('theme_setup_data.php');
	}
// set appointment page title       
function appointment_title( $title, $sep )
{	
    global $paged, $page;
		
	if ( is_feed() )
        return $title;
		// Add the site name.
		$title .= get_bloginfo( 'name' );
		// Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";
		// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( __( 'Page', 'appointment' ), max( $paged, $page ) );
		return $title;
}	
add_filter( 'wp_title', 'appointment_title', 10,2 );

add_filter('get_avatar','appointment_add_gravatar_class');

function appointment_add_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='img-responsive img-circle", $class);
    return $class;
}
function appointment_add_to_author_profile( $contactmethods ) {
		$contactmethods['facebook_profile'] = __('Facebook URL','appointment');
		$contactmethods['twitter_profile'] = __('Twitter URL','appointment');
		$contactmethods['linkedin_profile'] = __('LinkedIn URL','appointment');
		$contactmethods['google_profile'] = __('GooglePlus URL','appointment');
		return $contactmethods;
		}
		add_filter( 'user_contactmethods', 'appointment_add_to_author_profile', 10, 1);
	
	
	    add_filter('get_the_excerpt','appointment_post_slider_excerpt');
	    function appointment_post_slider_excerpt($output){
		$output = strip_tags(preg_replace(" (\[.*?\])",'',$output));
		$output = strip_shortcodes($output);		
		$original_len = strlen($output);
		$output = substr($output, 0, 155);		
		$len=strlen($output);	 
		if($original_len>155) {
		$output = $output;
		return  '<div class="slide-text-bg2">' .'<span>'.$output.'</span>'.'</div>'.
	                       '<div class="slide-btn-area-sm"><a href="' . get_permalink() . '" class="slide-btn-sm">'
						   .__("Read More","appointment").'</a></div>';
		}
		else
		{ return '<div class="slide-text-bg2">' .'<span>'.$output.'</span>'.'</div>'; }   
        }
						
	function get_home_blog_excerpt()
	{
		global $post;
		$excerpt = get_the_content();
		$excerpt = strip_tags(preg_replace(" (\[.*?\])",'',$excerpt));
		$excerpt = strip_shortcodes($excerpt);		
		$original_len = strlen($excerpt);
		$excerpt = substr($excerpt, 0, 145);		
		$len=strlen($excerpt);	 
		if($original_len>275) {
		$excerpt = $excerpt;
		return $excerpt . '<div class="blog-btn-area-sm"><a href="' . get_permalink() . '" class="blog-btn-sm">'.__("Read More","appointment").'</a></div>';
		}
		else
		{ return $excerpt; }
	}
	
?>