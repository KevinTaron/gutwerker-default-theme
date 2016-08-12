<?php get_header(); ?>

	<?php if(get_field('startseite_slideshow')): ?>
		<?php get_template_part('templatepart', 'slider'); ?>
	<?php endif; ?>

	<div id="maincontent" class="home clearfix">
		<div class="container">
			<div class="content-inner">
				<?php if ( have_posts() ) : ?>
					<div class="pagecontent">
						<?php while ( have_posts() ) : the_post(); ?>
							<h1><?php the_title(); ?></h1>
							<?php the_content(); ?>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>
