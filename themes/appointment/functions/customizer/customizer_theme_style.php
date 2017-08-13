<?php 
// Adding customizer home page setting
function appointment_style_customizer( $wp_customize ){
//Theme color
class WP_color_Customize_Control extends WP_Customize_Control {
public $type = 'new_menu';

       function render_content()
       
	   {
	   ?>
	   <h3><?php _e('Want to use the predefined theme colors seen below?','appointment'); ?><a href="<?php echo esc_url( 'http://www.webriti.com/appointment' ); ?>" target="_blank"><?php _e('Upgrade to Pro','appointment'); ?> </a>
	   <h3><?php _e('Predefined colors','appointment'); ?></h3>
		<?php
		  $name = '_customize-color-radio-' . $this->id; 
		  foreach($this->choices as $key => $value ) {
            ?>
               <label>
				<input type="radio" disabled value="<?php echo $key; ?>" name="<?php echo esc_attr( $name ); ?>" data-customize-setting-link="<?php echo esc_attr( $this->id ); ?>" <?php if($this->value() == $key){ echo 'checked'; } ?>>
				<img <?php if($this->value() == $key){ echo 'class="selected_img"'; } ?> src="<?php echo get_template_directory_uri(); ?>/images/color/<?php echo $value; ?>" alt="<?php echo esc_attr( $value ); ?>" />
				</label>
				
            <?php
		  } ?>
		
		  <script>
			jQuery(document).ready(function($) {
				$("#customize-control-appointment_options-theme_color label img").click(function(){
					$("#customize-control-appointment_options-theme_color label img").removeClass("selected_img");
					$(this).addClass("selected_img");
				});
			});
		  </script>
		  <?php 
       }

}
	/* Theme Style settings */
	$wp_customize->add_section( 'theme_style' , array(
		'title'      => __('Theme style setting', 'appointment'),
		'priority'   => 900,
   	) );
	
	 //Theme Color Scheme
	$wp_customize->add_setting(
	'appointment_options[theme_color]', array(
	'default' => 'default.css',  
	'capability'     => 'edit_theme_options',
	'type' => 'option',
	'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control(new WP_color_Customize_Control($wp_customize,'appointment_options[theme_color]',
	array(
        'label'   => __('Predefined colors', 'appointment'),
        'section' => 'theme_style',
		'type' => 'radio',
		'settings' => 'appointment_options[theme_color]',	
		'choices' => array(
			'default.css' => 'orange.jpg',
            'blue.css' => 'blue.jpg',
            'green.css' => 'green.jpg',
			'red.css' => 'red.jpg',
			'cyan.css' => 'cyan.jpg',
			'regalblue.css' =>'regal.jpg',
			'lightsea.css' => 'lightsea.jpg',
			'wadgewood.css' => 'wadge.jpg',
			'aqua.css' => 'aqua.jpg',
			'yellow.css' => 'yellow.jpg',
			'pink.css' => 'pink.jpg',
			'cirousblue.css' => 'cirous.jpg',
			'mandy.css' => 'mandy.jpg',
    )
	
	)));
	
	
	$wp_customize->add_setting(
    'appointment_options[link_color_enable]',
    array(
        'default' => true,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[link_color_enable]',
    array(
        'label' => __('Enable custom color skin','appointment'),
        'section' => 'theme_style',
        'type' => 'checkbox',
    )
	);
	
	$wp_customize->add_setting(
	'appointment_options[link_color]', array(
	'capability'     => 'edit_theme_options',
	'default' => '#ee591f',
	'type' => 'option',
	'sanitize_callback' => 'sanitize_text_field',
    ));
	
	$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize, 
	'appointment_options[link_color]', 
	array(
		'label'      => __( 'Skin color', 'appointment' ),
		'section'    => 'theme_style',
		'settings'   => 'appointment_options[link_color]',
		'input_attrs'=>array(
		'readonly'=>'readonly','disabled'=>'disabled')
	) ) );
	
	
}
add_action( 'customize_register', 'appointment_style_customizer' );