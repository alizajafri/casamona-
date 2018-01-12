<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */


$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' ); ?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<?php $field_key_banner = get_field_object('field_58cf8f5fe42d2'); ?>
<?php $field_key_footer = get_field_object('field_58d1ff2fb2773'); ?>
<?php if($field_key_banner[value] != ''){ ?>
	<header class="banner-head" style="background:url('<?php echo $field_key_banner[value]; ?>') ;">
	<div class="overlay text-center">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<h4><?php echo get_post_meta($post -> ID, $key = 'banner_texts', true); ?></h4>
		<?php if(is_front_page()){?><div class="search-filter">
			<div class="<?php echo esc_html( $container ); ?>">
				<?php echo do_shortcode('[wpsight_listings_search reset="false" advanced="false"]'); ?>
			</div>
		</div><?php } ?>
	</div>
	</header><!-- .entry-header -->
<?php } ?>
	<?php //echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">
	<div class="<?php echo esc_html( $container ); ?>">
		<?php the_content(); ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );
		?>
	</div>
	</div><!-- .entry-content -->
<?php if($field_key_footer[value] != ''){ ?>
	<footer class="entry-footer">
	<img src="<?php echo $field_key_footer[value]; ?>" alt="footer-img" />
	</footer><!-- .entry-footer -->
<?php } ?>
</article><!-- #post-## -->
