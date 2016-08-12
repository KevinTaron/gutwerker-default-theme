<div id="startseiten_slideshow" class="clearfix container">
	<div class="slider row">
	    <div id="slider" class="royalSlider heroSlider rsMinW">
	        <?php while(the_repeater_field('startseite_slideshow')): ?>                              
	            <div class="rsContent">
         			<?php $img = get_sub_field('bild'); ?> 
					<?php echo wp_get_attachment_image( $img, 'slider-xl' ); ?>
						
	                <div class="infoBlock">         
	                	<?php the_sub_field('text'); ?>
	                </div>
	         	</div>
	    	<?php endwhile; ?>
		</div>
	</div>
</div>
