<?php
$appointment_options=theme_setup_data();
$news_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
if($news_setting['home_blog_enabled'] == 0 ) { ?>
<div class="blog-section">
	<div class="container">
	
		<!-- Section Title -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-heading-title">
					<h1><?php echo $news_setting['blog_heading']; ?></h1>
					<p><?php echo $news_setting['blog_description']; ?></p>
				</div>
			</div>
		</div>
		<!-- /Section Title -->
		
		<div class="row">
		<?php
		
		$cat_id = array();
		$cat_id = $news_setting['blog_selected_category_id'];
		$no_of_post = $news_setting['post_display_count'];	

		 $args = array( 'post_type' => 'post','ignore_sticky_posts' => 1 , 'category__in' => $cat_id, 'posts_per_page' => $no_of_post);
		 $news_query = new WP_Query($args);	
		 

		 $i=1;
			while($news_query->have_posts() ) : $news_query->the_post();				
			?>
			<div class="col-md-6">
				<div class="blog-sm-area">
					<div class="media">
						<div class="blog-sm-box">
							<?php $defalt_arg =array('class' => "img-responsive"); ?>
							<?php if(has_post_thumbnail()): ?>
							<?php the_post_thumbnail('', $defalt_arg); ?>
							<?php endif; ?>
						</div>
						<div class="media-body">
							<?php $appointment_options=theme_setup_data();
							  $news_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
							if($news_setting['home_meta_section_settings'] == '' ) { ?>	
							<div class="blog-post-sm">
								<?php _e('By','appointment');?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php echo get_the_author();?></a>
								<a href="<?php echo get_month_link(get_post_time('Y'),get_post_time('m')); ?>">
								<?php echo get_the_date('M j, Y'); ?></a>
								<?php 	$tag_list = get_the_tag_list();
								if(!empty($tag_list)) ?>
								<div class="blog-tags-sm"><?php the_tags('', ', ', ''); ?></div>
							</div>
							<?php } ?>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p><?php echo get_home_blog_excerpt(); ?></p>
						</div>
					</div>
				</div>
			</div>
			<?php 
			  if($i==2)
			  { 
			     echo '<div class="clearfix"></div>';
				 $i=0;
			  }$i++;
			  wp_reset_postdata();
			endwhile;  ?>
		</div>
	</div>
<?php } ?>
</div>