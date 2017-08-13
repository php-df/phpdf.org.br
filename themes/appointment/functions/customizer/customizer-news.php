<?php
function appointment_news_customizer( $wp_customize ) {

//Index-news Section
	$wp_customize->add_panel( 'appointment_news_setting', array(
		'priority'       => 600,
		'capability'     => 'edit_theme_options',
		'title'      => __('Latest News settings', 'appointment'),
	) );
	
	$wp_customize->add_section(
        'news_section_settings',
        array(
            'title' => __('Latest News settings','appointment'),
            'description' => '',
			'panel'  => 'appointment_news_setting',)
    );
	
	
	//Hide Index Service Section
	
	$wp_customize->add_setting(
    'appointment_options[home_blog_enabled]',
    array(
        'default' => '',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'appointment_options[home_blog_enabled]',
    array(
        'label' => __('Hide News section from Homepage','appointment'),
        'section' => 'news_section_settings',
        'type' => 'checkbox',
    )
	);
	
	// hide meta content
	$wp_customize->add_setting(
    'appointment_options[home_meta_section_settings]',
    array(
        'default' => '',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[home_meta_section_settings]',
    array(
        'label' => __('Hide post meta from News section','appointment'),
        'section' => 'news_section_settings',
        'type' => 'checkbox',
    )
	);
	
	// add section to manage News
	$wp_customize->add_setting(
    'appointment_options[blog_heading]',
    array(
        'default' => __('Latest news','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_news_sanitize_html',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'appointment_options[blog_heading]',array(
    'label'   => __('Title','appointment'),
    'section' => 'news_section_settings',
	 'type' => 'text',)  );	
	 
	 
	 $wp_customize->add_setting(
    'appointment_options[blog_description]',
    array(
        'default' => 'Duis aute irure dolor in reprehenderit in voluptate velit cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupid non proident, sunt in culpa qui official deserunt mollit anim id est laborum.',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_news_sanitize_html',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'appointment_options[blog_description]',array(
    'label'   => __('Description','appointment'),
    'section' => 'news_section_settings',
	 'type' => 'text',)  );	
	 
	 
	 // add section to manage featured Latest news on category basis	
	$wp_customize->add_setting(
    'appointment_options[blog_selected_category_id]',
    array(
		'capability' => 'edit_theme_options',
		'default' => 1,
		 'sanitize_callback' => 'appointment_prefix_sanitize_layout',
		 'type' => 'option',
		
		)
	);	
	$wp_customize->add_control( new Category_Dropdown_Custom_Control( $wp_customize, 'appointment_options[blog_selected_category_id]', array(
    'label'   => __('Select category for Latest News','appointment'),
    'section' => 'news_section_settings',
    'settings'   => 'appointment_options[blog_selected_category_id]',
	) ) );
	
	//Select number of latest news on front page
	
	$wp_customize->add_setting(
    'appointment_options[post_display_count]',
    array(
		'type' => 'option',
        'default' => 4,
		'sanitize_callback' => 'sanitize_text_field',
    )
	);

	$wp_customize->add_control(
    'appointment_options[post_display_count]',
    array(
        'type' => 'select',
        'label' => __('Select number of Posts','appointment'),
        'section' => 'news_section_settings',
		 'choices' => array(2=>2, 4=>4, 6=>6, 8=>8, 10=>10, 12=>12, 14=>14, 16=>16),
		));
		
	function appointment_news_sanitize_html( $input ) {
    return force_balance_tags( $input );
	}	
		
		}
	add_action( 'customize_register', 'appointment_news_customizer' );
	
	function appointment_prefix_sanitize_layout( $news ) {
    if ( ! in_array( $news, array( 1,'category_news' ) ) )    
    return $news;
}
	?>