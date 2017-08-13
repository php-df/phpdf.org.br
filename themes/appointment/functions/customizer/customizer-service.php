<?php
function appointment_service_customizer( $wp_customize ) {
 
//Service section panel
$wp_customize->add_panel( 'appointment_service_options', array(
		'priority'       => 500,
		'capability'     => 'edit_theme_options',
		'title'      => __('Service settings', 'appointment'),
	) );

	
	$wp_customize->add_section( 'service_section_head' , array(
		'title'      => __('Section Heading','appointment'),
		'panel'  => 'appointment_service_options',
		'priority'   => 50,
   	) );
	
	
	//Hide Index Service Section
	
	$wp_customize->add_setting(
    'appointment_options[service_section_enabled]',
    array(
        'default' => '',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'appointment_options[service_section_enabled]',
    array(
        'label' => __('Hide service section from homepage','appointment'),
        'section' => 'service_section_head',
        'type' => 'checkbox',
    )
	);
	
	$wp_customize->add_setting(
    'appointment_options[service_title]',
    array(
        'default' => __('Our services','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_service_sanitize_html',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'appointment_options[service_title]',
    array(
        'label' => __('Title','appointment'),
        'section' => 'service_section_head',
        'type' => 'text',
    )
	);
	
	$wp_customize->add_setting(
    'appointment_options[service_description]',
    array(
        'default' => 'Duis aute irure dolor in reprehenderit in voluptate velit cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupid non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
		'sanitize_callback' => 'appointment_service_sanitize_html',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'appointment_options[service_description]',
    array(
        'label' => __('Description','appointment'),
        'section' => 'service_section_head',
        'type' => 'text',
		'sanitize_callback' => 'appointment_service_sanitize_html',
    )
	);	
	
//service section one
	$wp_customize->add_section( 'service_section_one' , array(
		'title'      => __('Service section one', 'appointment'),
		'panel'  => 'appointment_service_options',
		'priority'   => 100,
		'sanitize_callback' => 'sanitize_text_field',
   	) );
	$wp_customize->add_setting(
		'appointment_options[service_one_icon]', array(
		 'sanitize_callback' => 'sanitize_text_field',
        'default'        => 'fa-mobile',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	
	$wp_customize->add_control( 'appointment_options[service_one_icon]', array(
        'label'   => __('Icon', 'appointment'),
		'style' => 'background-color: red',
        'section' => 'service_section_one',
        'type'    => 'text',
    ));		
		
	$wp_customize->add_setting(
    'appointment_options[service_one_title]',
    array(
        'default' => __('Easy to use','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_service_sanitize_html',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'appointment_options[service_one_title]',
    array(
        'label' => __('Title','appointment'),
        'section' => 'service_section_one',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
    'appointment_options[service_one_description]',
    array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst',
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'appointment_service_sanitize_html',
		 'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'appointment_options[service_one_description]',
    array(
        'label' => __('Description','appointment'),
        'section' => 'service_section_one',
        'type' => 'text',	
    )
);
//Second service

$wp_customize->add_section( 'service_section_two' , array(
		'title'      => __('Service section two', 'appointment'),
		'panel'  => 'appointment_service_options',
		'priority'   => 200,
   	) );


$wp_customize->add_setting(
    'appointment_options[service_two_icon]',
    array(
        'type' =>'option',
		'default' => 'fa-bell',
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'sanitize_text_field',
		 
    )	
);
$wp_customize->add_control(
    'appointment_options[service_two_icon]',
    array(
        'label' => __('Icon','appointment'),
        'section' => 'service_section_two',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'appointment_options[service_two_title]',
    array(
        'default' => __('Easy to use','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_service_sanitize_html',
		'type' => 'option',
    )	
);
$wp_customize->add_control(
    'appointment_options[service_two_title]',
    array(
        'label' => __('Title' ,'appointment'),
        'section' => 'service_section_two',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'appointment_options[service_two_description]',
    array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.',
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'appointment_service_sanitize_html',
		 'type' => 'option',
    )	
);
$wp_customize->add_control(
		'appointment_options[service_two_description]',
		array(
        'label' => __('Description','appointment'),
        'section' => 'service_section_two',
        'type' => 'text',
    )
);
//Third Service section
$wp_customize->add_section( 'service_section_three' , array(
		'title'      => __('Service section three', 'appointment'),
		'panel'  => 'appointment_service_options',
		'priority'   => 300,
   	) );


$wp_customize->add_setting(
    'appointment_options[service_three_icon]',
    array(
        'default' => 'fa-laptop',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		
    )	
);
$wp_customize->add_control(
'appointment_options[service_three_icon]',
    array(
        'label' => __('Icon','appointment'),
        'section' => 'service_section_three',
        'type' => 'text',
		
    )
);

$wp_customize->add_setting(
    'appointment_options[service_three_title]',
    array(
        'default' => __('Easy to use','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_service_sanitize_html',
		'type' =>'option',
    )	
);
$wp_customize->add_control(
    'appointment_options[service_three_title]',
    array(
        'label' => __('Title','appointment'),
        'section' => 'service_section_three',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'appointment_options[service_three_description]',
    array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_service_sanitize_html',
		'type' =>'option',
    )	
);
$wp_customize->add_control(
    'appointment_options[service_three_description]',
    array(
        'label' => __('Description','appointment'),
        'section' => 'service_section_three',
        'type' => 'text',
    )
);
//Four Service section

$wp_customize->add_section( 'service_section_four' , array(
		'title'      => __('Service section four', 'appointment'),
		'panel'  => 'appointment_service_options',
		'priority'   => 400,
   	) );

$wp_customize->add_setting(
    'appointment_options[service_four_icon]',
    array(
        'default' => 'fa-support',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' =>'option',
    )	
);
$wp_customize->add_control(
    'appointment_options[service_four_icon]',
    array(
        'label' => __('Icon','appointment'),
        'section' => 'service_section_four',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'appointment_options[service_four_title]',
    array(
        'default' => __('Easy to use','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_service_sanitize_html',
		'type' => 'option'
    )	
);
$wp_customize->add_control(
    'appointment_options[service_four_title]',
    array(
        'label' => __('Title','appointment'),
        'section' => 'service_section_four',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
   'appointment_options[service_four_description]',
    array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_service_sanitize_html',
		'type' => 'option'
    )	
);
$wp_customize->add_control(
    'appointment_options[service_four_description]',
    array(
        'label' => __('Description','appointment'),
        'section' => 'service_section_four',
        'type' => 'text',
		'sanitize_callback' => 'sanitize_text_field',
    )
);
//Five service section
$wp_customize->add_section( 'service_section_five' , array(
		'title'      => __('Service section five', 'appointment'),
		'panel'  => 'appointment_service_options',
		'priority'   => 500,
   	) );


$wp_customize->add_setting(
    'appointment_options[service_five_icon]',
    array(
        'default' => 'fa-code',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
);
$wp_customize->add_control(
    'appointment_options[service_five_icon]',
    array(
        'label' => __('Icon','appointment'),
        'section' => 'service_section_five',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'appointment_options[service_five_title]',
    array(
        'default' => __('Easy to use','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_service_sanitize_html',
		'type' => 'option',
    )	
);
$wp_customize->add_control(
    'appointment_options[service_five_title]',
    array(
        'label' => __('Title','appointment'),
        'section' => 'service_section_five',
        'type' => 'text',
		
    )
);

$wp_customize->add_setting(
    'appointment_options[service_five_description]',
    array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_service_sanitize_html',
		'type' => 'option'
    )	
);
$wp_customize->add_control(
    'appointment_options[service_five_description]',
    array(
        'label' => __('Description','appointment'),
        'section' => 'service_section_five',
        'type' => 'text',
    )
);
//Six service section
$wp_customize->add_section( 'service_section_six' , array(
		'title'      => __('Service section six', 'appointment'),
		'panel'  => 'appointment_service_options',
		'priority'   => 600,
		
   	) );

	
$wp_customize->add_setting(
    'appointment_options[service_six_icon]',
    array(
        'default' => 'fa-cog',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
);
$wp_customize->add_control(
    'appointment_options[service_six_icon]',
    array(
        'label' => __('Icon','appointment'),
        'section' => 'service_section_six',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'appointment_options[service_six_title]',
    array(
        'default' => __('Easy to use','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_service_sanitize_html',
		'type' => 'option',
    )	
);
$wp_customize->add_control(
    'appointment_options[service_six_title]',
    array(
        'label' => __('Title','appointment'),
        'section' => 'service_section_six',
        'type' => 'text',
		
    )
);

$wp_customize->add_setting(
    'appointment_options[service_six_description]',
    array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_service_sanitize_html',
		'type' => 'option',
    )	
);
$wp_customize->add_control(
    'appointment_options[service_six_description]',
    array(
        'label' => __('Description','appointment'),
        'section' => 'service_section_six',
        'type' => 'text',
    )
);
class WP_service_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
      <div class="pro-box">
		<a href="<?php echo 'http://webriti.com/appointment/';?>" target="_blank" class="button button-primary" id="review_pro"><?php _e('Add more services. Get Pro.','appointment' ); ?></a>
	 
	<div>
    <?php
    }
}
//Pro service section
$wp_customize->add_section( 'service_section_pro' , array(
		'title'      => __('Add more services', 'appointment'),
		'panel'  => 'appointment_service_options',
		'priority'   => 700,
   	) );


$wp_customize->add_setting(
     'appointment_options[service_pro]',
    array(
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
);
$wp_customize->add_control( new WP_service_Customize_Control( $wp_customize, 'appointment_options[service_pro]', array(	
		'section' => 'service_section_pro',
		'setting' => 'appointment_options[service_pro]',
    ))
);

function appointment_service_sanitize_html( $input ) {
    return force_balance_tags( $input );
	}


}
add_action( 'customize_register', 'appointment_service_customizer' );
?>