<?php
function appointment_template_customizer( $wp_customize ) {

//About Us Template
class appointment_Customize_about_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
        <h3><?php echo sprintf (__("Want to add a company About Us, Team, Client, footer, callout with the About template? <a href='http://www.webriti.com/appointment' target='_blank'>Upgrade to Pro</a>",'appointment')); ?> </h3>
		<?php
		}
	}
	
//Service Template
class appointment_Customize_service_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
        <h3><?php echo sprintf (__("Want to add more services, testimonials, clients, footer callouts in the Service template? <a href='http://www.webriti.com/appointment' target='_blank'>Upgrade to Pro</a>",'appointment')); ?>
		</h3> 
		<?php
		}
	}

//Blog Template
class appointment_Customize_blog_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
<h3><?php echo sprintf (__("Want to use the blog meta settings? <a href='http://www.webriti.com/appointment' target='_blank'>Upgrade to Pro</a>",'appointment')); ?></h3>
		<?php
		}
	}
//Contact Form 
class appointment_Customize_form_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
<h3><?php echo sprintf (__("Want to add contact form information and a contact map in the Contact template? <a href='http://www.webriti.com/appointment' target='_blank'>Upgrade to Pro</a>",'appointment')); ?></h3> 
		<?php
		}
	}

//Contact Information 
class appointment_Customize_information_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
        <h3><?php echo sprintf (__("Want to add contact address information in the Contact template? <a href='http://www.webriti.com/appointment' target='_blank'>Upgrade to Pro</a>",'appointment')); ?> </h3>
		<?php
		}
	}

//Contact Callout 
class appointment_Customize_contact_callout_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
       <h3><?php echo sprintf (__("Want to add contact callout information in the Contact template? <a href='http://www.webriti.com/appointment' target='_blank'>Upgrade to Pro</a>",'appointment')); ?> </h3>
		
		<?php
		}
	}	
	
	

//Template panel 
	$wp_customize->add_panel( 'appointment_template', array(
		'priority'       => 920,
		'capability'     => 'edit_theme_options',
		'title'      => __('Template settings', 'appointment'),
	) );
	
	// add section to manage About
	$wp_customize->add_section(
        'about_section_settings',
        array(
            'title' => __('About Us page settings','appointment'),
			'panel'  => 'appointment_template',
			'priority'   => 100,
			
			)
    );
	$wp_customize->add_setting( 'appointment_options[about_upgrade]', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new appointment_Customize_about_upgrade(
		$wp_customize,
		'appointment_options[about_upgrade]',
			array(
				'label'					=> __('Appointment upgrade','appointment'),
				'section'				=> 'about_section_settings',
				'settings'				=> 'appointment_options[about_upgrade]',
			)
		)
	);	
	
	
	  //enable/disable blog post meta content
	$wp_customize->add_section( 'blog_template' , array(
		'title'      => __('Blog page settings', 'appointment'),
		'panel'  => 'appointment_template',
		'priority'   => 150,
   	) );
	
	$wp_customize->add_setting( 'appointment_options[blog_upgrade]', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new appointment_Customize_blog_upgrade(
		$wp_customize,
		'appointment_options[blog_upgrade]',
			array(
				'label'					=> __('Appointment upgrade','appointment'),
				'section'				=> 'blog_template',
				'settings'				=> 'appointment_options[blog_upgrade]',
			)
		)
	);
	
	$wp_customize->add_setting(
    'appointment_options[blog_meta_section_settings]',
    array(
        'default' => 0,
		'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		
    )	
	);
	$wp_customize->add_control(
    'appointment_options[blog_meta_section_settings]',
    array(
        'label' => __('Hide post meta from blog pages, archive pages, categories, authors, etc.','appointment'),
        'section' => 'blog_template',
        'type' => 'checkbox',
    )
	);
	
	
	
	// add section to manage Setting
	$wp_customize->add_section(
        'setting_section_settings',
        array(
            'title' => __('Service page settings','appointment'),
			'panel'  => 'appointment_template',
			'priority'   => 100,
			
			)
    );
	
	$wp_customize->add_setting( 'appointment_options[service_upgrade]', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new appointment_Customize_service_upgrade(
		$wp_customize,
		'appointment_options[service_upgrade]',
			array(
				'label'					=> __('Appointment upgrade','appointment'),
				'section'				=> 'setting_section_settings',
				'settings'				=> 'appointment_options[service_upgrade]',
			)
		)
	);
	
	
	
	// add section to manage contact page
	$wp_customize->add_section(
        'contact_section_settings',
        array(
            'title' => __('Contact page setting','appointment'),
			'panel'  => 'appointment_template',)
    );
		
	//Form title
	
	$wp_customize->add_setting( 'appointment_options[contact_form_upgrade]', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new appointment_Customize_form_upgrade(
		$wp_customize,
		'appointment_options[contact_form_upgrade]',
			array(
				'label'					=> __('Appointment upgrade','appointment'),
				'section'				=> 'contact_section_settings',
				'settings'				=> 'appointment_options[contact_form_upgrade]',
			)
		)
	);
	
	$wp_customize->add_setting(
    'appointment_options[send_usmessage]',
    array(
        'default' => __('Send us a message','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'appointment_options[send_usmessage]',array(
    'label'   => __('Contact form title','appointment'),
    'section' => 'contact_section_settings',
	 'type' => 'text',
	 'input_attrs'=> array('disabled'=>'disabled')
	 )  );	
	
	// enable/disable google map
	$wp_customize->add_setting(
		'appointment_options[contact_google_map_enabled]',
		array('capability'  => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control(
		'appointment_options[contact_google_map_enabled]',
		array(
			'type' => 'checkbox',
			'label' => __('Hide Google Map','appointment'),
			'section' => 'contact_section_settings',
		)
	);

	
	 //Google map
	 $wp_customize->add_setting(
    'appointment_options[contact_google_title]',
    array(
        'default' => __('Find the address','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
		)
	);	
	$wp_customize->add_control( 'appointment_options[contact_google_title]',array(
    'label'   => __('Contact Google Map title','appointment'),
    'section' => 'contact_section_settings',
	 'type' => 'text','input_attrs'=> array('disabled'=>'disabled'))  );	
	 
	 
	 //Google Map URL
	 $wp_customize->add_setting(
    'appointment_options[contact_google_map_url]',
    array(
        'default' => 'https://maps.google.co.in/maps?f=q&source=s_q&hl=en&geocode=&q=Kota+Industrial+Area,+Kota,+Rajasthan&aq=2&oq=kota+&sll=25.003049,76.117499&sspn=0.020225,0.042014&t=h&ie=UTF8&hq=&hnear=Kota+Industrial+Area,+Kota,+Rajasthan&z=13&ll=25.142832,75.879538',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'appointment_options[contact_google_map_url]',array(
    'label'   => __('Google Map URL','appointment'),
    'section' => 'contact_section_settings',
	 'type' => 'textarea','textarea_attrs'=> array('disabled'=>'disabled'))  );
	 
	 
	 // Add Team link
	 
	 class WP_map_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
    <a href="#" class="button"><?php _e( 'Click here to add Google Map', 'appointment' ); ?></a>
    <?php
    }
}

		$wp_customize->add_setting(
    'map',
    array(
        'default' => '',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
);
$wp_customize->add_control( new WP_map_Customize_Control( $wp_customize, 'map', array(	
		'section' => 'contact_section_settings',
    ))
);
	 
	//Contact Information Setting
	$wp_customize->add_section(
        'contact_info_settings',
        array(
            'title' => __('Contact information settings','appointment'),
            'description' => '',
			'panel'  => 'appointment_template',)
    );
	
	$wp_customize->add_setting( 'appointment_options[contact_info_upgrade]', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new appointment_Customize_information_upgrade(
		$wp_customize,
		'appointment_options[contact_info_upgrade]',
			array(
				'label'					=> __('Appointment upgrade','appointment'),
				'section'				=> 'contact_info_settings',
				'settings'				=> 'appointment_options[contact_info_upgrade]',
			)
		)
	);
	
	// enable/disable Contact info setting
	$wp_customize->add_setting(
		'appointment_options[contact-callout-enable]',
		array('capability'  => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		
		));

	$wp_customize->add_control(
		'appointment_options[contact-callout-enable]',
		array(
			'type' => 'checkbox',
			'label' => __('Hide contact info section from Contact page','appointment'),
			'section' => 'contact_info_settings',
			'input_attrs'=> array('disabled'=>'disabled')
		)
	);
	//Form title
	$wp_customize->add_setting(
    'appointment_options[contact_title]',
    array(
        'default' => __('Contact info','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'appointment_options[contact_title]',array(
    'label'   => __('Section title','appointment'),
    'section' => 'contact_info_settings',
	 'type' => 'text','input_attrs'=> array('disabled'=>'disabled'))  );
	 
	 //Form Decription
	 
	 $wp_customize->add_setting(
    'appointment_options[contact_description]',
    array(
        'default' => __('Read what customers are saying:','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
		)
	);	
	$wp_customize->add_control( 'appointment_options[contact_description]',array(
    'label'   => __('Section description','appointment'),
    'section' => 'contact_info_settings',
	 'type' => 'text','input_attrs'=> array('disabled'=>'disabled'))  );
	 
	 //Contact Call-us
	 $wp_customize->add_setting(
		'appointment_options[contact_call_icon]', array(
        'default'        => 'fa-phone',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	
	$wp_customize->add_control( 'appointment_options[contact_call_icon]', array(
        'label'   => __('Icon', 'appointment'),
        'section' => 'contact_info_settings',
        'type'    => 'text',
		'input_attrs'=> array('disabled'=>'disabled')
    ));		
		
	$wp_customize->add_setting(
    'appointment_options[contact_call_title]',
    array(
        'default' => __('Have a question? Call us now','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[contact_call_title]',
    array(
        'label' => __('Title','appointment'),
        'section' => 'contact_info_settings',
        'type' => 'text','input_attrs'=> array('disabled'=>'disabled')
    )
	);

	$wp_customize->add_setting(
    'appointment_options[contact_call_description]',
    array(
        'default' => '+82 334 843 52',
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'sanitize_text_field',
		 'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'appointment_options[contact_call_description]',
    array(
        'label' => __('Description','appointment'),
        'section' => 'contact_info_settings',
        'type' => 'text',
		'input_attrs'=> array('disabled'=>'disabled')		
    )
);


//Contact Address
	 $wp_customize->add_setting(
		'appointment_options[contact_add_icon]', array(
        'default'        => 'fa-map-marker',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	
	$wp_customize->add_control( 'appointment_options[contact_add_icon]', array(
        'label'   => __('Icon', 'appointment'),
        'section' => 'contact_info_settings',
        'type'    => 'text',
		'input_attrs'=> array('disabled'=>'disabled')
    ));		
		
	$wp_customize->add_setting(
    'appointment_options[contact_add_title]',
    array(
        'default' => __('Our office location','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[contact_add_title]',
    array(
        'label' => __('Title','appointment'),
        'section' => 'contact_info_settings',
        'type' => 'text',
		'input_attrs'=> array('disabled'=>'disabled')
    )
	);

	$wp_customize->add_setting(
    'appointment_options[contact_add_description]',
    array(
        'default' => '3108 Evergreen Lane Washington, (USA) 90032',
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'sanitize_text_field',
		 'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[contact_add_description]',
    array(
        'label' => __('Description','appointment'),
        'section' => 'contact_info_settings',
        'type' => 'text',
		'input_attrs'=> array('disabled'=>'disabled')
    )
);

	//Contact Email Setting 
	
	$wp_customize->add_setting(
		'appointment_options[contact_mail_icon]', array(
        'default'        => 'fa-envelope',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	
	$wp_customize->add_control( 'appointment_options[contact_mail_icon]', array(
        'label'   => __('Icon', 'appointment'),
        'section' => 'contact_info_settings',
        'type'    => 'text',
		'input_attrs'=> array('disabled'=>'disabled')
    ));		
		
	$wp_customize->add_setting(
    'appointment_options[contact_mail_title]',
    array(
        'default' => __('Drop us a mail','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[contact_mail_title]',
    array(
        'label' => __('Title','appointment'),
        'section' => 'contact_info_settings',
        'type' => 'text',
		'input_attrs'=> array('disabled'=>'disabled')
    )
	);

	$wp_customize->add_setting(
    'appointment_options[contact_mail_description]',
    array(
        'default' => 'info@yoursupport.com',
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'sanitize_text_field',
		 'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[contact_mail_description]',
    array(
        'label' => __('Description','appointment'),
        'section' => 'contact_info_settings',
        'type' => 'text',
		'input_attrs'=> array('disabled'=>'disabled')		
    )
);
	
	
	
	
	
	//Contact Callout
	$wp_customize->add_section(
        'contact_callout_settings',
        array(
            'title' => __('Contact callout settings','appointment'),
            'description' => '',
			'panel'  => 'appointment_template',)
    );
	
	$wp_customize->add_setting( 'appointment_options[contact_callout_upgrade]', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new appointment_Customize_contact_callout_upgrade(
		$wp_customize,
		'appointment_options[contact_callout_upgrade]',
			array(
				'label'					=> __('Appointment upgrade','appointment'),
				'section'				=> 'contact_callout_settings',
				'settings'				=> 'appointment_options[contact_callout_upgrade]',
			)
		)
	);
	
	
	
	// enable/disable Contact Form Setting
	$wp_customize->add_setting(
		'appointment_options[check_contact_callout]',
		array('capability'  => 'edit_theme_options',
		'type'=> 'option',
		'sanitize_callback' => 'sanitize_text_field',
			
		));

	$wp_customize->add_control(
		'appointment_options[check_contact_callout]',
		array(
			'type' => 'checkbox',
			'label' => __('Hide contact callout from Contact page','appointment'),
			'section' => 'contact_callout_settings',
			'input_attrs'=> array('disabled'=>'disabled')
		)
	);
	
	//Form title
	$wp_customize->add_setting(
    'appointment_options[contact_callout_title]',
    array(
        'default' => __('Contact info','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'appointment_options[contact_callout_title]',array(
    'label'   => __('Title','appointment'),
    'section' => 'contact_callout_settings',
	 'type' => 'text',
	 'input_attrs'=> array('disabled'=>'disabled')
	 )  );
	 
	 //Form Decription
	 
	 $wp_customize->add_setting(
    'appointment_options[contact_callout_description]',
    array(
        'default' => 'Be creative with our template, with hundred of options and possibilities Do not miss this great opportunity and profit from this great template.',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'appointment_options[contact_callout_description]',array(
    'label'   => __('Description','appointment'),
    'section' => 'contact_callout_settings',
	 'type' => 'text',
	 'input_attrs'=> array('disabled'=>'disabled')
	 )  );
	 
	 
	 $wp_customize ->add_setting (
	'appointment_options[contact_callout_button]',
	array( 
	'default' => __('Purchase Now','appointment'),
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field' ,
	'type' => 'option',
	) 
	);

	$wp_customize->add_control (
	'appointment_options[contact_callout_button]',
	array (  
	'label' => __('Button Text','appointment'),
	'section' => 'contact_callout_settings',
	'type' => 'text',
	'input_attrs'=> array('disabled'=>'disabled')
	) );
	
	
	$wp_customize ->add_setting (
	'appoointment_options[contact_callout_button_link]',
	array( 
	'default' => '#',
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	) );

	$wp_customize->add_control (
	'appoointment_options[contact_callout_button_link]',
	array (  
	'label' => __('Button Link','appointment'),
	'section' => 'contact_callout_settings',
	'type' => 'text',
	'input_attrs'=> array('disabled'=>'disabled')
	) );

	$wp_customize->add_setting(
		'appointment_options[contact_callout_link_target]',
		array('capability'     => 'edit_theme_options',
		'default' => 1,
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control(
		'appointment_options[contact_callout_link_target]',
		array(
			'type' => 'checkbox',
			'label' => __('Open link in new tab','appointment'),
			'section' => 'contact_callout_settings',
			'input_attrs'=> array('disabled'=>'disabled')
		)
	);
	}
	add_action( 'customize_register', 'appointment_template_customizer' );
	?>