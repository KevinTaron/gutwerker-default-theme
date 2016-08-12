<?php get_header(); ?>

	<?php get_template_part('templatepart', 'headerimage'); ?>

	<div id="maincontent" class="subsite clearfix">
		<div class="container">
			<div class="content-inner">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="pagecontent">
							<h1><?php the_title(); ?></h1>
							<?php the_content(); ?>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>