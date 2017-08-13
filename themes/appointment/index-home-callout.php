<?php 
$appointment_options=theme_setup_data();
$callout_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
if($callout_setting['home_call_out_area_enabled'] == 0 ) { 
 $imgURL = $callout_setting['callout_background'];
 if($imgURL != '') { ?>
<div class="callout-section" style="background-image:url('<?php echo $imgURL;?>'); background-repeat: no-repeat; background-position: top left; background-attachment: fixed;">
<?php } 
else
{ ?> 
<div class="callout-section" style="background-color:#ccc;">
<?php } ?>
	<div class="overlay">
		<div class="container">
			<div class="row">	
				<div class="col-md-12">	
						
						<h1><?php echo $callout_setting['home_call_out_title'];?></h1>
						 <p><?php echo $callout_setting['home_call_out_description']; ?></p>
					
						<div class="btn-area">
						<a href="<?php echo esc_url($callout_setting['home_call_out_btn1_link']); ?>" <?php if( $callout_setting['home_call_out_btn1_link_target'] == 1 ) { echo "target='_blank'"; } ?> class="callout-btn1"><?php echo $callout_setting['home_call_out_btn1_text']; 
						?></a>
						
						
						<a href="<?php echo esc_url($callout_setting['home_call_out_btn2_link']); ?>" <?php if( $callout_setting['home_call_out_btn2_link_target'] == 1 ) { echo "target='_blank'"; } ?> class="callout-btn2"><?php echo $callout_setting['home_call_out_btn2_text']; ?></a>
					</div>
				</div>	
			</div>			
		
		</div>
			
	</div>	
</div> 
<!-- /Callout Section -->
<div class="clearfix"></div>
<?php } ?>