<?php
function appointment_client_customizer( $wp_customize ) {
class appointment_Customize_client_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
        <h3><?php _e('Want to add a client image and link?','appointment'); ?><a href="<?php echo esc_url( 'http://www.webriti.com/appointment' ); ?>" target="_blank"><?php _e('Upgrade to Pro','appointment'); ?> </a>  
		<?php
		}
	}

//Front Client section
	
	$wp_customize->add_panel( 'appointment_client_setting', array(
		'priority'       => 800,
		'capability'     => 'edit_theme_options',
		'title'      => __('Client settings', 'appointment'),
	) );
	
	$wp_customize->add_section(
        'client_section_settings',
        array(
            'title' => __('Section Heading','appointment'),
			'panel'  => 'appointment_client_setting',)
    );
	
	$wp_customize->add_setting( 'appointment_options[cleint_upgrade]', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new appointment_Customize_client_upgrade(
		$wp_customize,
		'appointment_options[cleint_upgrade]',
			array(
				'label'					=> __('Appointment upgrade','appointment'),
				'section'				=> 'client_section_settings',
				'settings'				=> 'appointment_options[cleint_upgrade]',
			)
		)
	);
	
	}
	add_action( 'customize_register', 'appointment_client_customizer' );
	?>