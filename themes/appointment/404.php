<?php get_header();
get_template_part('index','banner'); ?>
<div class="error-section">		
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="error-404">
					<div class="text-center"><i class="fa fa-bug"></i></div>
					<h1><?php _e('Error 404','appointment'); ?></h1>
					<h4><?php _e('Oops! Page not found','appointment'); ?></h4>
					<p><?php _e('We are sorry, but the page you are looking for does not exist.','appointment'); ?></p>
					<div class="error-btn-area"><a href="<?php echo esc_html(site_url());?>" class="error-btn"><?php _e('Go Back','appointment'); ?></a></div>
				</div>
			</div>
		</div>			
	</div>
</div>
<?php get_footer(); ?>