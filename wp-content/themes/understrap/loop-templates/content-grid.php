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
		<div class="search-filter">
			<div class="<?php echo esc_html( $container ); ?>">
				<?php echo do_shortcode('[wpsight_listings_search reset="false" advanced="false"]'); ?>
			</div>
		</div>
	</div>
	</header><!-- .entry-header -->
<?php } ?>
	<?php //echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">
	<div class="<?php echo esc_html( $container ); ?>">
		<?php $args = array( 'post_type' => 'listing',
					'posts_per_page' => 12,
				);
	$the_query = new WP_Query( $args );
	echo '<pre>';print_r($the_query);echo '</pre>';
	echo '<div class="slider2">';
	if ( $the_query->have_posts() ) :
	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	  <div class="slide">
		<div class="post-thumb"><span class="new">New</span><a href="<?php echo get_the_permalink(); ?>"><?php the_post_thumbnail(array(283,221)); ?></a></div>
		<div class="slide-content">
			<div class="post-title"><h5><?php echo wp_trim_words( get_the_title(), 8, '...' ); ?></h5></div>
			<div class="post-cat"><?php $post_id = get_the_ID(); $terms = get_the_terms( $post_id, 'location' ); foreach ( $terms as $term ) { if( 0 != $term->parent ){echo $term->name.'<span class="post-term">,</span>';}} ?></div>
			<div class="post-meta"><span class="price">&euro; <?php echo get_post_meta($post_id,'_price',true); ?></span><span class="listing_id pull-right">REF: <?php echo get_post_meta($post_id,'_listing_id',true); ?></span></div>
			<div class="post-meta-data pull-left"><span class="homes pull-left"><?php echo get_post_meta($post_id,'_details_4',true); ?> m2</span><span class="bed pull-left"><?php if(get_post_meta($post_id,'_details_1',true)!=''){echo get_post_meta($post_id,'_details_1',true);} else {echo '0';} ?> beds</span><span class="bath pull-left"><?php if(get_post_meta($post_id,'_details_2',true)!=''){echo get_post_meta($post_id,'_details_2',true);} else {echo '0';} ?> baths</span></div>
		</div>
	  </div>
	<?php endwhile;
	endif;
	echo '</div>';?>
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
