<?php 
/*
*   Template Name: Media Template
*/


get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php //echo esc_html( $container ); ?>" id="content">

		<div class="rows">

			<div class="col-md-12 content-area" id="primary" >

				<main class="site-main" id="main" role="main">

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
				<?php //echo do_shortcode('[wpsight_listings_search reset="false" advanced="false"]'); ?>
			</div>
		</div>
	</div>
	</header><!-- .entry-header -->
<?php } ?>
	<div class="entry-content list-grid media">
	<div class="<?php echo esc_html( $container ); ?>">
		
<?php
	if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {$paged = get_query_var('page'); } else {$paged = 1; }

    $args = array( 'post_type' => 'casamona_media',
					'posts_per_page' => 12,	
					'paged' => $paged,					
				);
				
				

	$the_query = new WP_Query( $args );
?>
<!-- ******************************************************** -->
<!-- start main content -->
<!-- ******************************************************** -->
<div class="listing-griding listing-search wpsight-listings first-row">
	<?php if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		    
	  <div class="listing col-md-4">
		<div class="post-thumb"><a class="text-center" style="display:block;" href="<?php echo get_the_permalink(); ?>">
		<?php the_post_thumbnail('media-thumb'); ?>
		</a></div>
		<div class="slide-content">
			<div class="post-title"><h5><?php echo wp_trim_words( get_the_title(), 8, '...' ); ?></h5></div>
			<div class="post-cat"><?php $post_id = get_the_ID(); $terms = get_the_terms( $post_id, 'casamona_media_cat' ); foreach ( $terms as $term ) { echo $term->name.'<span class="post-term">,</span>';} ?></div>
			<div class="post-meta-data pull-left"><?php echo wp_trim_words( get_the_excerpt(), 15, '...' ); ?></div>
		</div>
	  </div>
	<?php endwhile; } else {
		echo '<div class="col-md-12"><h5> No Property Found </h5></div>';
	}
	echo '</div>'; 
	
	wpsight_pagination( $the_query->max_num_pages );
	wp_reset_postdata();?>
		
	</div>
	</div><!-- .entry-content -->
<?php if($field_key_footer[value] != ''){ ?>
	<footer class="entry-footer">
	<img src="<?php echo $field_key_footer[value]; ?>" alt="footer-img" />
	</footer><!-- .entry-footer -->
<?php } ?>
</article><!-- #post-## -->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
