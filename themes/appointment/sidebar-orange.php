<?php if( is_active_sidebar('home-orange-sidebar_left') || is_active_sidebar('home-orange-sidebar_center') || is_active_sidebar('home-orange-sidebar_right') ) : ?>
<div class="top-contact-detail-section">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<?php if( is_active_sidebar('home-orange-sidebar_left') ) :
				if ( function_exists('dynamic_sidebar')) :
				dynamic_sidebar( 'home-orange-sidebar_left' );
				endif;
				endif; ?>
			</div>
			
			<div class="col-md-4">
				<?php if( is_active_sidebar('home-orange-sidebar_center') ) :
				if ( function_exists('dynamic_sidebar')) :
				dynamic_sidebar( 'home-orange-sidebar_center' );
				endif;
				endif; ?>
			</div>
			
			<div class="col-md-4">
				<?php if( is_active_sidebar('home-orange-sidebar_right') ) :
				if ( function_exists('dynamic_sidebar')) :
				dynamic_sidebar( 'home-orange-sidebar_right' );
				endif;
				endif; ?>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>
<?php endif; ?>