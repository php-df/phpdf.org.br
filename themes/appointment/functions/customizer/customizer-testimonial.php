<?php
function appointment_testimonial_customizer( $wp_customize ) {
class appointment_Customize_testimonial_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
        <h3><?php echo sprintf(__("Want to add testimonials? <a href='http://www.webriti.com/appointment' target='_blank'>Upgrade to Pro</a>","appointment"));
		}
	}

//Home project Section
	$wp_customize->add_panel( 'appointment_test_setting', array(
		'priority'       => 850,
		'capability'     => 'edit_theme_options',
		'title'      => __('Testimonial settings', 'appointment'),
	) );
	
	$wp_customize->add_section(
        'test_section_settings',
        array(
            'title' => __('Homepage testimonial settings','appointment'),
            'description' => '',
			'panel'  => 'appointment_test_setting',)
    );
	
	
	$wp_customize->add_setting( 'appointment_options[testimonial_upgrade]', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new appointment_Customize_testimonial_upgrade(
		$wp_customize,
		'appointment_options[testimonial_upgrade]',
			array(
				'label'					=> __('Appointment upgrade','appointment'),
				'section'				=> 'test_section_settings',
				'settings'				=> 'appointment_options[testimonial_upgrade]',
			)
		)
	);
	
	// add section to manage callout
	$wp_customize->add_setting(
    'appointment_options[testimonial_title]',
    array(
        'default' => __('What our clients say:','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'appointment_options[testimonial_title]',array(
    'label'   => __('Title','appointment'),
    'section' => 'test_section_settings',
	 'type' => 'text','input_attrs' => array('disabled' => 'disabled'))  );	
	 
	 
	 $wp_customize->add_setting(
    'appointment_options[testimonial_description]',
    array(
        'default' => __('Read what customers are saying:','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'appointment_options[testimonial_description]',array(
    'label'   => __('Description','appointment'),
    'section' => 'test_section_settings',
	 'type' => 'text', 
	 'input_attrs' => array('disabled' => 'disabled')
	 )  );	
	 
	 
	 
	//Testimonial animation
	
	$wp_customize->add_setting(
    'appointment_options[testi_slide_type]',
    array(
        'default' => __('slide','appointment'),
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    )
	);

	$wp_customize->add_control(
    'appointment_options[testi_slide_type]',
    array(
        'type' => 'select',
        'label' => __('Animation','appointment'),
        'section' => 'test_section_settings',
		 'choices' => array('slide'=>__('slide', 'appointment'), 'carousel-fade'=>__('fade', 'appointment')),
		));
	 
	 
	 
	 
	 //Testimonail Animation duration

	$wp_customize->add_setting(
    'appointment_options[testi_transition_delay]',
    array(
        'default' =>  '2000',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )
	);

	$wp_customize->add_control(
    'appointment_options[testi_transition_delay]',
    array(
        'type' => 'text',
		'description' => __('If the transition-delay value is 2000 that means 2 seconds.','appointment'),
        'label' => __('Duration','appointment'),
        'section' => 'test_section_settings','input_attrs' => array('disabled' => 'disabled')
		
		));
		
		
	//Testimonail link
	class WP_testmonial_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
    <a href="#" class="button"><?php _e( 'Click here to add testimonial','appointment' ); ?></a>
    <?php
    }
}

$wp_customize->add_setting(
    'testimonial',
    array(
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_testmonial_Customize_Control( $wp_customize, 'testimonial', array(	
		'section' => 'test_section_settings',
    ))
);
	
		}
add_action( 'customize_register', 'appointment_testimonial_customizer' );
?>