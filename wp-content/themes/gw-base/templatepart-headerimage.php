<div id="headerimage" class="subsite">
	<div class="container">
		<div class="row">
			<?php $img = get_post_thumbnail_id(); ?> 
			<?php echo wp_get_attachment_image( $img, 'slider-xl' ); ?> 
		</div>
	</div>
</div>