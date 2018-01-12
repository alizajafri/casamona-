<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>

<div class="wrapper" id="single-wrapper">

	<div class="<?php //echo esc_html( $container ); ?>" id="content" tabindex="-1">
		
		<div class="row" style="margin:0px;">
		

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check', 'none' ); ?>

			<main class="site-main" id="main">
				<div class="search-filter single-list-filter">
					<div class="<?php echo esc_html( $container ); ?>">
						<?php echo do_shortcode('[wpsight_listings_search reset="false" advanced="false"]'); ?>
					</div>
				</div>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'single' ); ?>

						<?php understrap_post_nav(); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

		</div><!-- #primary -->

		<!-- Do the right sidebar check -->
		<?php if ( 'right' === $sidebar_pos || 'both' === $sidebar_pos ) : ?>

			<?php get_sidebar( 'right' ); ?>

		<?php endif; ?>

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

	<footer class="entry-footer">
	<img src="/wp-content/uploads/2017/03/footer-ban.png" alt="footer-img" />
	</footer><!-- .entry-footer -->

<?php get_footer(); ?>
