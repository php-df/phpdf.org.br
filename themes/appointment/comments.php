<?php if ( post_password_required() ) : ?>
	<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'appointment' ); ?></p>
<?php return; endif; 
		// code for comment
		if ( ! function_exists( 'appointment_comment' ) ) {
		function appointment_comment( $comment, $args, $depth ) 
		{
		$GLOBALS['comment'] = $comment;
		//get theme data
		global $comment_data;
		//translations
		$leave_reply = $comment_data['translation_reply_to_coment'] ? $comment_data['translation_reply_to_coment'] : __('Reply','appointment');
	?>	
	
		<div <?php comment_class('media comment-box'); ?> id="comment-<?php comment_ID(); ?>">
			<a class="pull-left-comment" href="<?php the_author_meta('user_url'); ?>">
			<?php echo get_avatar( $comment , 70); ?>		
			</a>
			<div class="media-body">
				<div class="comment-detail">
					<div class="reply">
						<?php comment_reply_link(array_merge( $args, array('reply_text' => $leave_reply,'depth' => $depth, 'max_depth' => $args['max_depth'], 'per_page' => $args['per_page']))) ?>
					</div>
					<h4 class="comment-detail-title"><?php comment_author(); ?><span class="comment-date"><a href="<?php echo get_comment_link( $comment->comment_ID );?>"><?php _e('Posted on', 'appointment'); ?><?php echo comment_time('g:i a'); ?><?php echo " - "; echo comment_date('M j, Y');?></a></span></h4>
					<p><?php comment_text(); ?></p>
					<?php edit_comment_link( __( 'Edit', 'appointment' ), '<p class="edit-link">', '</p>' ); ?>
					
					<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'appointment' ); ?></em>
					<br/>
					<?php endif; ?>
				
				</div>
			</div>
		</div>
	<?php } }// end of appointment_comment function 
	if ( have_comments() ) { ?>

<div class="comment-section">
	<div class="comment-title"><h3></i> <?php comments_number ( __('No Comments so far','appointment'), __( '1 Comment so far','appointment'),'% ' . __('Comments so far','appointment') ); ?> </h3>
	</div>
	<?php wp_list_comments( array( 'callback' => 'appointment_comment' ) ); ?>
</div> <!---comment_section--->

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'appointment' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'appointment' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'appointment' ) ); ?></div>
		</nav>
		<?php }  
		if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><?php _e( 'Comments are closed.' , 'appointment' ); ?></p>
		<?php endif; } ?>
	<?php if ('open' == $post->comment_status) { ?>
	<?php if ( get_option('comment_registration') && !$user_ID ) { ?>
	<p><?php echo sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.','appointment' ), site_url( 'wp-login.php' ) . '?redirect_to=' .  urlencode(get_permalink())); ?></p>
<?php } else { 
?>
<div class="comment-form-section">

	<?php  
	 $fields=array(
		'author' => ' <div class="blog-form-group"><input class="blog-form-control" name="author" id="author" value="" type="name" placeholder="'.__('Name','appointment').'" /></div>',
		'email' => '<div class="blog-form-group"><input class="blog-form-control" name="email" id="email" value=""   type="email" placeholder="'.__('Email','appointment').'" /></div>',
		);
		function appointment_fields($fields) { 
			return $fields;
		}
		add_filter('comment_form_default_fields','appointment_fields');
			$defaults = array(
			'fields'=> apply_filters( 'comment_form_default_fields', $fields ),
			'comment_field'=> '<div class="blog-form-group-textarea" >
			<textarea id="comments" rows="7" class="blog-form-control-textarea" name="comment" type="text" placeholder="'.__('Leave your message','appointment').'"></textarea></div>',		
			'logged_in_as' => '<p class="blog-post-info-detail">' . __( "Logged in as",'appointment' ).'<a href="'. admin_url( 'profile.php' ).'">'.$user_identity.'</a>'. '<a href="'. wp_logout_url( get_permalink() ).'" title="'.__('Logout from this Account','appointment').'">'.__("Logout",'appointment').'</a>' . '</p>',
			'id_submit'=> 'blogdetail-btn',
			'label_submit'=>__( 'Send Message','appointment'),
			'comment_notes_after'=> '',
			'comment_notes_before' => '',
			'title_reply'=> '<div class="comment-title"><h3>'.__('Leave a Reply', 'appointment').'</h3></div>',
			'id_form'=> 'commentform'
			);
			ob_start();
			comment_form($defaults);
			echo str_replace('class="comment-form"','class="form-inline"',ob_get_clean());
		
	?>
</div>	
<?php } } ?>