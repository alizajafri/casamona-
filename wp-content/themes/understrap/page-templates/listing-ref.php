<?php
/**
 * Template Name: Listing Refrence
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
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
				<?php echo do_shortcode('[wpsight_listings_search reset="false" advanced="false"]'); ?>
			</div>
		</div>
	</div>
	</header><!-- .entry-header -->
<?php } ?>
	<div class="entry-content list-list">
	<div class="<?php echo esc_html( $container ); ?>">
		<div class="search-filter" style="margin-top: 30px;">
			<div class="<?php echo esc_html( $container ); ?>">
				<?php echo do_shortcode('[wpsight_listings_search reset="false" advanced="false"]'); ?>
			</div>
		</div>
		<?php 
		if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {$paged = get_query_var('page'); } else {$paged = 1; }

		//echo $paged;
		$args = array( 'post_type' => 'listing',
					'posts_per_page' => 1 ,
					'key' => '_price_offer',
					'value' => $_GET['offer'],
					'meta_compare' => '=',
					'orderby' => $_GET['orderby'],
					'order' => $_GET['order'],															
					'meta_query' => array(
					'relation' => 'AND',
							array(
								'key' => '_listing_id',
								'value' => $_GET['ref'],
								'meta_compare' => '=',
							),
							array(
								'key' => '_price_offer',
								'value' => $_GET['offer'],
								'meta_compare' => '=',
							)
					)
				);
	$the_query = new WP_Query( $args );
	//echo '<pre>';print_r($the_query);echo '</pre>';
	echo '<div class="listing-griding listing-search wpsight-listings first-row">';
	?>
	<div class="listings-panel clearfix ">
			
		</div><!-- .listings-panel -->
		
	<?php if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	<?php $field_key_gallary = get_field_object('field_58d366980a2bd', get_the_ID()); ?>
	    
	  <div class="listing col-md-12">
	  <?php $field_key_gallary = get_field_object('field_58d366980a2bd', get_the_ID()); ?>
		<div class="post-thumb col-md-4 pull-left"><a href="<?php echo get_the_permalink(); ?>?offer=<?php echo $_GET['offer']; ?>&location=<?php echo $_GET['location']; ?>&min=<?php echo $_GET['min']; ?>&max=<?php echo $_GET['max']; ?>&bedrooms=<?php echo $_GET['bedrooms']; ?>&listing-type=<?php echo $_GET['listing-type']; ?>">
		<?php 
			if($field_key_gallary[value] != ''){
				echo '<div class="slider3">';
				foreach($field_key_gallary[value] as $field_key_gallary_value){
					echo '<div class="slide"><img width="100%" height="235" src="'.$field_key_gallary_value[url].'" /></div>';
					
				} echo '</div>';
				?>
				<script>
				jQuery(document).ready(function(){
				jQuery('.slider3').bxSlider({
					slideWidth: 382,
					minSlides: 1,
					maxSlides: 1,
					slideMargin: 0,
					moveSlides:1,
					pager:false,
				});	
				});
				</script>
				<?php }
				else
				{
					the_post_thumbnail(array(283,221)); 
				}
		?>
		</a></div>
		<div class="slide-content col-md-8 pull-right">
			<div class="col-md-8 pull-left"><div class="post-title"><h5><?php echo wp_trim_words( get_the_title(), 8, '...' ); ?></h5></div>
			<div class="post-cat"><?php $post_id = get_the_ID(); $terms = get_the_terms( $post_id, 'location' ); foreach ( $terms as $term ) { if( 0 != $term->parent ){echo $term->name.'<span class="post-term">,</span>';}} ?></div></div>
			<div class="col-md-4 pull-left"><div class="post-meta text-right"><span class="price">&euro; <?php echo get_post_meta($post_id,'_price',true); ?></span><span class="listing_id">REF: <?php echo get_post_meta($post_id,'_listing_id',true); ?></span></div></div>
			<div class="col-md-12 exce pull-left"><?php echo wp_trim_words( get_the_content(), 20, '...' ); ?></div>
			<div class="col-md-12 post-meta-data pull-left"><span class="icon homes pull-left"><span class="icon-home4"></span><?php echo get_post_meta($post_id,'_details_4',true); ?> m2</span><span class="icon bed pull-left"><span class="icon-bed"></span><?php if(get_post_meta($post_id,'_details_1',true)!=''){echo get_post_meta($post_id,'_details_1',true);} else {echo '0';} ?> beds</span><span class="icon bath pull-left"><span class="icon-bathtub"></span><?php if(get_post_meta($post_id,'_details_2',true)!=''){echo get_post_meta($post_id,'_details_2',true);} else {echo '0';} ?> baths</span><span class="icon read-more pull-left"><a class="text-center" href="<?php echo get_the_permalink(); ?>?offer=<?php echo $_GET['offer']; ?>&location=<?php echo $_GET['location']; ?>&min=<?php echo $_GET['min']; ?>&max=<?php echo $_GET['max']; ?>&bedrooms=<?php echo $_GET['bedrooms']; ?>&listing-type=<?php echo $_GET['listing-type']; ?>">More Info</a></span></div>
		</div>
	  </div>
	<?php endwhile; } else {
		echo '<div class="col-md-12"><h5> No Property Found </h5></div>';
	}
	echo '</div>'; wp_reset_postdata();?>
		<?php //the_content(); ?>

		<?php
		wpsight_pagination( $the_query->max_num_pages );
		?>
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
