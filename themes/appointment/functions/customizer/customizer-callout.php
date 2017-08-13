<?php
function appointment_callout_customizer( $wp_customize ) {

	//Home call out

	$wp_customize->add_panel( 'appointment_homecallout_setting', array(
		'priority'       => 600,
		'capability'     => 'edit_theme_options',
		'title'      => __('Contact callout settings', 'appointment'),
	) );
	
	$wp_customize->add_section(
        'callout_section_settings',
        array(
            'title' => __('Contact callout settings','appointment'),
			'panel'  => 'appointment_homecallout_setting',)
    );
	
	
	//Hide Home callout Section
	
	$wp_customize->add_setting(
    'appointment_options[home_call_out_area_enabled]',
    array(
        'default' => '',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[home_call_out_area_enabled]',
    array(
        'label' => __('Hide callout section from homepage','appointment'),
        'section' => 'callout_section_settings',
        'type' => 'checkbox',
    )
	);
	
	// add section to manage callout
	$wp_customize->add_setting(
    'appointment_options[home_call_out_title]',
    array(
        'default' => __('Want to say hey or find out more?','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_callout_sanitize_html',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'appointment_options[home_call_out_title]',array(
    'label'   => __('Title','appointment'),
    'section' => 'callout_section_settings',
	 'type' => 'text',)  );	
	 
	 
	 $wp_customize->add_setting(
    'appointment_options[home_call_out_description]',
    array(
        'default' => 'Reprehen derit in voluptate velit cillum dolore eu fugiat nulla pariaturs sint occaecat proidentse.',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_callout_sanitize_html',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control('appointment_options[home_call_out_description]',array(
    'label'   => __('Description','appointment'),
    'section' => 'callout_section_settings',
	 'type' => 'text',)  );	
	 
	 
	//Callout Background image
	/* logo option */
    $wp_customize->add_setting( 'appointment_options[callout_background]', array(
      'sanitize_callback' => 'esc_url_raw',
	  'type' => 'option',
	  
    ) );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'appointment_options[callout_background]', array(
      'label'    => __('Background Image', 'appointment' ),
      'section'  => 'callout_section_settings',
      'settings' => 'appointment_options[callout_background]',
    ) ) );
	 
	 
	 
	 //Purchase Now button
	 $wp_customize->add_section(
        'callout_purchase_now_settings',
        array(
            'title' => __('Button one','appointment'),
			'panel'  => 'appointment_homecallout_setting',)
    );
	 
	 $wp_customize ->add_setting (
	'appointment_options[home_call_out_btn1_text]',
	array( 
	'default' => __('Purchase Now','appointment'),
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'appointment_callout_sanitize_html',
	'type' => 'option',
	) 
	);

	$wp_customize->add_control (
	'appointment_options[home_call_out_btn1_text]',
	array (  
	'label' => __('Button Text','appointment'),
	'section' => 'callout_purchase_now_settings',
	'type' => 'text',
	) );
	
	$wp_customize->add_section(
        'callout_get_in_touch_settings',
        array(
            'title' => __('Button two','appointment'),
            'description' => '',
			'panel'  => 'appointment_homecallout_setting',)
    );
	$wp_customize ->add_setting (
	'appointment_options[home_call_out_btn1_link]',
	array( 
	'default' => '#',
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	) );

	$wp_customize->add_control (
	'appointment_options[home_call_out_btn1_link]',
	array (  
	'label' => __('Button Link','appointment'),
	'section' => 'callout_purchase_now_settings',
	'type' => 'text',
	) );

	$wp_customize->add_setting(
		'appointment_options[home_call_out_btn1_link_target]',
		array('capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		));

	$wp_customize->add_control(
		'appointment_options[home_call_out_btn1_link_target]',
		array(
			'type' => 'checkbox',
			'label' => __('Open link in new tab','appointment'),
			'section' => 'callout_purchase_now_settings',
		)
	);
	 
	// documentation area
	$wp_customize ->add_setting (
	'appointment_options[home_call_out_btn2_text]',
	array( 
	'default' => __('Get in Touch','appointment'),
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'appointment_callout_sanitize_html',
	'type' => 'option',
	) 
	);

	$wp_customize->add_control (
	'appointment_options[home_call_out_btn2_text]',
	array (  
	'label' => __('Button Text','appointment'),
	'section' => 'callout_get_in_touch_settings',
	'type' => 'text',
	) );

	$wp_customize ->add_setting (
	'appointment_options[home_call_out_btn2_link]',
	array( 
	'default' => '#',
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'type'=> 'option',
	) );

	$wp_customize->add_control (
	'appointment_options[home_call_out_btn2_link]',
	array (  
	'label' => __('Button Link','appointment'),
	'section' => 'callout_get_in_touch_settings',
	'type' => 'text',
	) );

	$wp_customize->add_setting(
		'appointment_options[home_call_out_btn2_link_target]',
		array('capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		));

	$wp_customize->add_control(
		'appointment_options[home_call_out_btn2_link_target]',
		array(
			'type' => 'checkbox',
			'label' => __('Open link in new tab','appointment'),
			'section' => 'callout_get_in_touch_settings',
		)
	);
	function appointment_callout_sanitize_html( $input ) {
    return force_balance_tags( $input );
	}
	
	}
	add_action( 'customize_register', 'appointment_callout_customizer' );
	?>