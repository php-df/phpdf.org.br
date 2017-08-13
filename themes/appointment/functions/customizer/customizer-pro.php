<?php
//Pro Button

function appointment_pro_customizer( $wp_customize ) {
class WP_Pro_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
     <div class="pro-box">
       <a href="<?php echo 'http://webriti.com/appointment/';?>" target="_blank" class="upgrade" id="review_pro"><?php _e( 'UPGRADE TO PRO','appointment' ); ?></a>
		
	</div>
    <?php
    }
}
$wp_customize->add_section( 'appointment_pro_section' , array(
		'title'      => __('Upgrade to Pro','appointment'),
		'priority'   => 1000,
   	) );

$wp_customize->add_setting(
    'upgrade_pro',
    array(
       'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Pro_Customize_Control( $wp_customize, 'upgrade_pro', array(
		'section' => 'appointment_pro_section',
		'setting' => 'upgrade_pro',
    ))
);


class WP_Review_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	  <div class="pro-box">
     <a href="<?php echo 'https://wordpress.org/support/view/theme-reviews/appointment#postform/';?>" target="_blank" class="review" id="review_pro"><?php _e( 'ADD YOUR REVIEW','appointment' ); ?></a>
	 </div>
    <?php
    }
}

$wp_customize->add_setting(
    'pro_Review',
    array(
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Review_Customize_Control( $wp_customize, 'pro_Review', array(	
		'section' => 'appointment_pro_section',
		'setting' => 'pro_Review',
    ))
);

class WP_document_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
      <div class="pro-box">
	 <a href="<?php echo 'http://webriti.com/help/';?>" target="_blank" class="document" id="review_pro"><?php _e('DOCUMENTATION','appointment' ); ?></a>
	 
	 <div>
	 <div class="pro-vesrion">
	 <?php _e('The Pro version gives you more opportunities to enhance your site and business. In order to create an effective online presence, one must showcase their wide range of products, use a Contact Us enquiry form, create an effective About Us page, introduce the Team Members, etc. The Pro version offers all this. Buy the Pro version today and give us the chance to serve you better.','appointment');?>
	 </div>
    <?php
    }
}

$wp_customize->add_setting(
    'doc_Review',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_document_Customize_Control( $wp_customize, 'doc_Review', array(	
		'section' => 'appointment_pro_section',
		'setting' => 'doc_Review',
    ))
);

}
add_action( 'customize_register', 'appointment_pro_customizer' );
?>