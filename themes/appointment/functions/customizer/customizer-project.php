<?php
function appointment_project_customizer( $wp_customize ) {

class appointment_Customize_project_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
        <h3><?php _e('Want to add projects and categorization?','appointment'); ?><a href="<?php echo 'http://www.webriti.com/appointment'; ?>" target="_blank"><?php _e('Upgrade to Pro','appointment'); ?> </a>  
		<?php
		}
	}
 
//Home project Section
	$wp_customize->add_panel( 'appointment_project_setting', array(
		'priority'       => 700,
		'capability'     => 'edit_theme_options',
		'title'      => __('Project settings', 'appointment'),
	) );
	
	$wp_customize->add_section(
        'project_section_settings',
        array(
            'title' => __('Homepage project settings','appointment'),
            'description' => '',
			'panel'  => 'appointment_project_setting',)
    );
	
	
	$wp_customize->add_setting( 'appointment_options[project_upgrade]', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new appointment_Customize_project_upgrade(
		$wp_customize,
		'appointment_options[project_upgrade]',
			array(
				'label'					=> __('Appointment upgrade','appointment'),
				'section'				=> 'project_section_settings',
				'settings'				=> 'appointment_options[project_upgrade]',
			)
		)
	);
	
	// add section to manage Project
	$wp_customize->add_setting(
    'appointment_options[portfolio_title]',
    array(
        'default' => __('Latest projects','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control('appointment_options[portfolio_title]',array(
    'label'   => __('Title','appointment'),
    'section' => 'project_section_settings',
	 'type' => 'text',
	 'input_attrs' => array('disabled' => 'disabled')
	 
	 )  );	
	 
	 
	 $wp_customize->add_setting(
    'appointment_options[portfolio_description]',
    array(
        'default' => 'Maecenas a mi nibh, eu euismod orc vivamus viverra lacus vitae tortor molestie malesuada. eu euismod orci. Vivamus viverra lacus vitae tortor molestie.',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'appointment_options[portfolio_description]',array(
    'label'   => __('Description','appointment'),
    'section' => 'project_section_settings',
	 'type' => 'text', 'input_attrs' => array('disabled' => 'disabled') )  );


	//Number of projects
	$wp_customize->add_setting(
    'appointment_options[portfolio_list]',
    array(
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	);

	$wp_customize->add_control(
    'appointment_options[portfolio_list]',
    array(
        'type' => 'text',
        'label' => __('Input number of projects','appointment'),
        'section' => 'project_section_settings','input_attrs' => array('disabled' => 'disabled'))
		);
	

		//link
		
	class WP_project_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
    <a href="#" class="button" ><?php _e('Click here to add project','appointment' ); ?></a>
    <?php
    }
}

$wp_customize->add_setting(
    'project',
    array(
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_project_Customize_Control( $wp_customize, 'project', array(	
		'section' => 'project_section_settings',
    ))
);

	// add section to manage Project
	
	
	 $wp_customize->add_setting(
    'appointment_options[taxonomy_portfolio_list]',
    array(
       'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'appointment_options[taxonomy_portfolio_list]',array(
	 'type' => 'select',
	 'label'   => __('Select project category archive column layout','appointment'),
    'section' => 'project_section_settings',
	 'choices' => array(2=>2,3=>3,4=>4),
		)
	);
}		
	add_action( 'customize_register', 'appointment_project_customizer' );
	?>