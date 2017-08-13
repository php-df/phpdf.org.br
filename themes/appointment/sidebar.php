<?php if( is_active_sidebar('sidebar-primary') ) : ?>
<div class="sidebar-section-right">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-primary') ) : ?> 
	<?php endif;?>
</div>
<?php endif; ?>