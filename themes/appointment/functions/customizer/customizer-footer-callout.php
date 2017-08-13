<?php
function appointment_footer_callout_customizer( $wp_customize ) {
class appointment_Customize_callout_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
        <h3><?php echo sprintf (__("Want to add footer callout content?<a href='http://www.webriti.com/appointment' target='_blank'> Upgrade to Pro</a>.","appointment"));  
		}
	}

	//Home call out

	$wp_customize->add_panel( 'appointment_footer_callout_setting', array(
		'priority'       => 820,
		'capability'     => 'edit_theme_options',
		'title'      => __('Footer callout settings', 'appointment'),
	) );
	
	//Contact Information Setting
	$wp_customize->add_section(
        'footer_callout_settings',
        array(
            'title' => __('Footer callout settings','appointment'),
			'panel'  => 'appointment_footer_callout_setting',)
    );
	
	$wp_customize->add_setting( 'appointment_options[callout_upgrade]', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new appointment_Customize_callout_upgrade(
		$wp_customize,
		'appointment_options[callout_upgrade]',
			array(
				'label'					=> __('Appointment upgrade','appointment'),
				'section'				=> 'footer_callout_settings',
				'settings'				=> 'appointment_options[callout_upgrade]',
			)
		)
	);
	
	
	//Form title
	$wp_customize->add_setting(
    'appointment_options[front_contact_title]',
    array(
        'default' => __('Stay in touch with us','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'appointment_options[front_contact_title]',array(
    'label'   => __('Callout Header','appointment'),
    'section' => 'footer_callout_settings',
	 'type' => 'text',
	  'input_attrs' => array('disabled' => 'disabled')
	 )  );
	 
	 //Footer callout Call-us
	 $wp_customize->add_setting(
		'appointment_options[contact_one_icon]', array(
        'default'        => 'fa-phone',
        'capability'     => 'edit_theme_options',
		'type' =>'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	
	$wp_customize->add_control('appointment_options[contact_one_icon]', array(
        'label'   => __('Icon', 'appointment'),
        'section' => 'footer_callout_settings',
        'type'    => 'text',
		 'input_attrs' => array('disabled' => 'disabled')
    ));		
		
	$wp_customize->add_setting(
    'appointment_options[front_contact1_title]',
    array(
        'default' => __('Have a question? Call us now','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[front_contact1_title]',
    array(
        'label' => __('Title','appointment'),
        'section' => 'footer_callout_settings',
        'type' => 'text',
		 'input_attrs' => array('disabled' => 'disabled')
    )
	);

	$wp_customize->add_setting(
    'appointment_options[front_contact1_val]',
    array(
        'default' => '+82 334 843 52',
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'sanitize_text_field',
		 'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[front_contact1_val]',
    array(
        'label' => __('Description','appointment'),
        'section' => 'footer_callout_settings',
        'type' => 'text',
		'input_attrs' => array('disabled' => 'disabled')		
    )
);


//callout Time
	 $wp_customize->add_setting(
		'appointment_options[contact_two_icon]', array(
        'default'        => 'fa-clock-o',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	
	$wp_customize->add_control( 'appointment_options[contact_two_icon]', array(
        'label'   => __('Icon', 'appointment'),
        'section' => 'footer_callout_settings',
        'type'    => 'text',
		 'input_attrs' => array('disabled' => 'disabled')
    ));		
		
	$wp_customize->add_setting(
    'appointment_options[front_contact2_title]',
    array(
        'default' => __('We are open Mon - Fri','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		 'input_attrs' => array('disabled' => 'disabled')
    )	
	);
	$wp_customize->add_control(
    'appointment_options[front_contact2_title]',
    array(
        'label' => __('Title','appointment'),
        'section' => 'footer_callout_settings',
        'type' => 'text',
		 'input_attrs' => array('disabled' => 'disabled')
    )
	);

	$wp_customize->add_setting(
    'appointment_options[front_contact2_val]',
    array(
        'default' => __('Mon - Fri : 08.00 - 18.00','appointment'),
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'sanitize_text_field',
		 'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[front_contact2_val]',
    array(
        'label' => __('Description','appointment'),
        'section' => 'footer_callout_settings',
        'type' => 'text',	
		 'input_attrs' => array('disabled' => 'disabled')
    )
);

	//Contact Email Setting 
	
	$wp_customize->add_setting(
		'appointment_options[contact_three_icon]', array(
        'default'        => 'fa-envelope',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	
	$wp_customize->add_control( 'appointment_options[contact_three_icon]', array(
        'label'   => __('Icon', 'appointment'),
        'section' => 'footer_callout_settings',
        'type'    => 'text',
		 'input_attrs' => array('disabled' => 'disabled')
    ));		
		
	$wp_customize->add_setting(
    'appointment_options[front_contact3_title]',
    array(
        'default' => __('Drop us a mail','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[front_contact3_title]',
    array(
        'label' => __('Title','appointment'),
        'section' => 'footer_callout_settings',
        'type' => 'text',
		 'input_attrs' => array('disabled' => 'disabled')
    )
	);

	$wp_customize->add_setting(
    'appointment_options[front_contact3_val]',
    array(
        'default' =>  'info@yoursupport.com',
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'sanitize_text_field',
		 'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[front_contact3_val]',
    array(
        'label' => __('Description','appointment'),
        'section' => 'footer_callout_settings',
        'type' => 'text',	
		 'input_attrs' => array('disabled' => 'disabled')
    )
);
	
	}
	add_action( 'customize_register', 'appointment_footer_callout_customizer' );
	?>