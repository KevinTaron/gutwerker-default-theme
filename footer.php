	<footer class="clearfix">
		<div class="container">
			<div class="row">
				<div class="adresse col-xs-12">
			        <?php
						$optAdresse = get_field('opt_adresse', 'option');
						$optAdresse = str_replace('<p>', '', $optAdresse);
						$optAdresse = str_replace('</p>', '', $optAdresse);
					?>
					<?php echo $optAdresse; ?> <a href="tel:<?php the_field('opt_telefonnummer', 'option'); ?>" class="whitelink"><?php the_field('opt_telefonnummer', 'option'); ?></a>
			    </div>
			    <div class="footermenu col-xs-12">
					<?php wp_nav_menu(array( 'theme_location' => 'footer', 'menu_id' => 'footermenu' )); ?> 
				</div>				
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>