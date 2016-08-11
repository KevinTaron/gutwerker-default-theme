<?php get_header(); ?>

	<div id="maincontent" class="subsite search clearfix">
		<div class="container">
			<div class="content-inner">
				<?php if ( have_posts() ) : ?>
					<div class="pagecontent">
						<h2><?php echo __('Suchergebnisse für', 'silberweiss') ?> <i><?php echo $_GET['s']; ?></i></h2>
						<?php while ( have_posts() ) : the_post(); ?>
							<div class="entry">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<div class="content"><?php the_excerpt(); ?></div>
								<a href="<?php the_permalink(); ?>" class="moreLink" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">&raquo; mehr lesen</a>
							</div>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
