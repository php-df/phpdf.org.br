<?php 
function theme_setup_data()
  	{
	return $appointment_options=array(
	//Header Settings
	'upload_image_favicon' => '',
	'header_one_name' => '' ,
	'header_one_text' => '' ,
	'text_title' => 1 ,
	'height' => '50',
	'width' => '50',
	'enable_header_logo_text' => '',
	'upload_image_logo' => '',
	'social_media_facebook_link' => '#',
	'social_media_twitter_link' => '#',
	'social_media_linkedin_link' => '#',
	'header_social_media_enabled' => 0,
	'facebook_media_enabled' => 1,
	'twitter_media_enabled' => 1,
	'linkedin_media_enabled' => 1,
	'webrit_custom_css' => '',
	
	//Slider Default settings
	'home_banner_enabled' => '',
	'slider_radio' => 'demo',
	'slider_select_category' =>'Uncategorized',
	'slider_options' => 'slide',
	'slider_transition_delay' => 2000,
	'featured_slider_post' => '',
	
	//Service section settings
	'service_section_enabled' => '',
	'service_title' => __('Our services','appointment'),
	'service_description' => 'Duis aute irure dolor in reprehenderit in voluptate velit cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupid non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
	'service_one_icon' => 'fa-mobile',
	'service_one_title'=>__('Easy to use','appointment'),
	'service_one_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.',
	'service_two_icon' => 'fa-bell',
	'service_two_title'=>__('Easy to use','appointment'),
	'service_two_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.',
	'service_three_icon' => 'fa-laptop',
	'service_three_title'=>__('Easy to use','appointment'),
	'service_three_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.',
	'service_four_icon' => 'fa-support',
	'service_four_title'=>__('Easy to use','appointment'),
	'service_four_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.',
	'service_five_icon' => 'fa-code',
	'service_five_title'=>__('Easy to use','appointment'),
	'service_five_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.',
	'service_six_icon' => 'fa-cog',
	'service_six_title'=>__('Easy to use','appointment'),
	'service_six_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.',
	
	//Home callout section
	'home_call_out_area_enabled' => '',
	'home_call_out_title' => __('Want to say hey or find out more?','appointment'),
	'home_call_out_description' => 'Reprehen derit in voluptate velit cillum dolore eu fugiat nulla pariaturs sint occaecat proidentse.',
	'callout_background' => '',
	'home_call_out_btn1_text' =>__('Purchase Now','appointment'),
	'home_call_out_btn1_link' => '#',
	'home_call_out_btn1_link_target' => '',
	'home_call_out_btn2_text' => __('Get in Touch','appointment'),
	'home_call_out_btn2_link' => '#',
	'home_call_out_btn2_link_target' => '',
	
	//News Section
	'home_blog_enabled' => '',
	'home_meta_section_settings' => '',
	'blog_heading' => __('Latest news','appointment'),
	'blog_description' => 'Duis aute irure dolor in reprehenderit in voluptate velit cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupid non proident, sunt in culpa qui official deserunt mollit anim id est laborum.',
	'blog_selected_category_id'=> 1,
	'post_display_count' => '4',
	
	//Footer Copyright & footer social links
	'footer_copyright_text' => __('No copyright information has been saved yet.','appointment'),
	'footer_menu_bar_enabled' => '',
	'footer_social_media_enabled' => '',
	'footer_social_media_facebook_link' => '#',
	'footer_facebook_media_enabled' => 1,
	'footer_social_media_twitter_link' => '#',
	'footer_twitter_media_enabled'=>1,
	'footer_social_media_linkedin_link' => '#',
	'footer_linkedin_media_enabled'=>1,
	'footer_social_media_googleplus_link' => '#',
	'footer_googleplus_media_enabled' => 1,
	'footer_social_media_skype_link' => '#',
	'footer_skype_media_enabled' => 1,
	);
  	}
  ?>