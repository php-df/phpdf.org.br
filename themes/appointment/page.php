<?php
get_header();
get_template_part('index','banner'); ?>
<!-- Blog Section with Sidebar -->
<div class="page-builder">
	<div class="container">
		<div class="row">
			<!-- Blog Area -->
			<div class="<?php appointment_post_layout_class(); ?>" >
			<?php if( $post->post_content != "" )
			{ ?>
			<div class="blog-lg-area-left">
			<?php if( have_posts()) :  the_post();
			the_content(); 
			endif; ?>
			</div>
			<?php } comments_template( '', true ); // show comments ?>
			</div>
			<!-- /Blog Area -->			
			<!--Sidebar Area-->
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>
			<!--Sidebar Area-->
		</div>
	</div>
</div>
<!-- /Blog Section with Sidebar -->
<?php get_footer(); ?>