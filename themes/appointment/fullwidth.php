<?php
/**
Template Name: Fullwidth
*/
get_header();
get_template_part('index','banner');
?>
<div class="page-builder">
	<div class="container">
		<div class="row">
			<!-- Blog Area -->
			<div class="col-md-12">
			<?php if( $post->post_content != "" )
			{ ?>
			<div class="blog-lg-area-left">
			<?php if( have_posts()) :  the_post(); ?>		
			<?php the_content(); ?>
				<?php endif; ?>
			</div>
			<?php } ?>			
				<?php comments_template( '', true ); // show comments ?>
			</div>
			<!-- /Blog Area -->	
		</div>
	</div>
</div>
<!-- /Blog Section with Sidebar -->
<?php get_footer(); ?>