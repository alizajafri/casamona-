<?php
function listing_sales(){
	$args = array( 'post_type' => 'listing',
					'posts_per_page' => 10,
					'meta_key' => '_price_offer',                    //(string) - Custom field key.
					'meta_value' => 'sale',                //(string) - Custom field value.
					'meta_compare' => '='
				);
	$the_query = new WP_Query( $args );
	//echo '<pre>';print_r($the_query);echo '</pre>';
	echo '<div class="flickity"><div class="gallery" data-flickity="{ "cellAlign": "left", "contain": true, "wrapAround": true }">';
	if ( $the_query->have_posts() ) :
	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	  <div class="carousel-cell">
		<div class="post-thumb"><span class="new">New</span><a href="<?php echo get_the_permalink(); ?>"><?php the_post_thumbnail(array(283,221)); ?></a></div>
		<div class="slide-content">
			<div class="post-title"><h5><?php echo wp_trim_words( get_the_title(), 8, '...' ); ?></h5></div>
			<div class="post-cat"><?php $post_id = get_the_ID(); $terms = get_the_terms( $post_id, 'location' ); foreach ( $terms as $term ) { if( 0 != $term->parent ){echo $term->name.'<span class="post-term">,</span>';}} ?></div>
			<div class="post-meta"><span class="price">&euro; <?php echo get_post_meta($post_id,'_price',true); ?></span><span class="listing_id pull-right">REF: <?php echo get_post_meta($post_id,'_listing_id',true); ?></span></div>
			<div class="post-meta-data pull-left"><span class="homes pull-left icon"><span class="icon-home4"></span><?php echo get_post_meta($post_id,'_details_4',true); ?> m2</span><span class="bed pull-left icon"><span class="icon-bed"></span><?php if(get_post_meta($post_id,'_details_1',true)!=''){echo get_post_meta($post_id,'_details_1',true);} else {echo '0';} ?> beds</span><span class="bath pull-left icon"><span class="icon-bathtub"></span><?php if(get_post_meta($post_id,'_details_2',true)!=''){echo get_post_meta($post_id,'_details_2',true);} else {echo '0';} ?> baths</span></div>
		</div>
	  </div>
	<?php endwhile;
	endif;
	echo '</div></div>';
}
add_shortcode('listing_sale_carousel','listing_sales');

/*************** rent ***********/

function listing_rent(){
	$args = array( 'post_type' => 'listing',
					'posts_per_page' => 10,
					'meta_key' => '_price_offer',                    //(string) - Custom field key.
					'meta_value' => 'rent',                //(string) - Custom field value.
					'meta_compare' => '='
				);
	$the_query = new WP_Query( $args );
	//echo '<pre>';print_r($the_query);echo '</pre>';
	echo '<div class="flickity"><div class="main-carousel1">';
	if ( $the_query->have_posts() ) :
	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	  <div class="carousel-cell">
		<div class="post-thumb"><span class="new">New</span><a href="<?php echo get_the_permalink(); ?>"><?php the_post_thumbnail(array(283,221)); ?></a></div>
		<div class="slide-content">
			<div class="post-title"><h5><?php echo wp_trim_words( get_the_title(), 8, '...' ); ?></h5></div>
			<div class="post-cat"><?php $post_id = get_the_ID(); $terms = get_the_terms( $post_id, 'location' ); foreach ( $terms as $term ) { if( 0 != $term->parent ){echo $term->name.'<span class="post-term">,</span>';}} ?></div>
			<div class="post-meta"><span class="price">&euro; <?php echo get_post_meta($post_id,'_price',true); ?></span><span class="listing_id pull-right">REF: <?php echo get_post_meta($post_id,'_listing_id',true); ?></span></div>
			<div class="post-meta-data pull-left"><span class="homes pull-left icon"><span class="icon-home4"></span><?php echo get_post_meta($post_id,'_details_4',true); ?> m2</span><span class="bed pull-left icon"><span class="icon-bed"></span><?php if(get_post_meta($post_id,'_details_1',true)!=''){echo get_post_meta($post_id,'_details_1',true);} else {echo '0';} ?> beds</span><span class="bath pull-left icon"><span class="icon-bathtub"></span><?php if(get_post_meta($post_id,'_details_2',true)!=''){echo get_post_meta($post_id,'_details_2',true);} else {echo '0';} ?> baths</span></div>
		</div>
	  </div>
	<?php endwhile;
	endif;
	echo '</div></div>';
}
add_shortcode('listing_rent_carousel','listing_rent');

function listing_newsroom(){
	$args = array( 'post_type' => 'newsroom',
					'posts_per_page' => 2
				);
	$the_query = new WP_Query( $args );
	//echo '<pre>';print_r($the_query);echo '</pre>';
	echo '<div class="newsrooms">';
	if ( $the_query->have_posts() ) :
	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	  <div class="slide">
		<div class="post-thumb"><a href="<?php echo get_the_permalink(); ?>"><?php the_post_thumbnail(array(283,221)); ?></a></div>
		<div class="slide-contents pull-left">
			<div class="post-cat pull-left"><div class="news_date pull-left"><?php echo get_the_date('F d Y'); ?> / </div><div class="news-cat pull-left"><?php $terms = get_the_terms( $post_id, 'newsroom-category' ); foreach ( $terms as $term ) { if( 0 == $term->parent ){echo $term->name.'<span class="post-term">,</span>';}} ?></div></div>
			<div class="post-title pull-left"><h4><?php echo wp_trim_words( get_the_title(), 8, '...' ); ?></h4></div>
			<div class="post-meta-data pull-left"><?php the_content(); ?></div>
		</div>
	  </div>
	<?php endwhile;
	endif;
	echo '</div>';
}
add_shortcode('newsrooms','listing_newsroom');

function listing_property(){ ?>
<div class="list-list">
<div class="listings-panel clearfix">
			<div class="listings-panel-title"><h2>Properties <span class="loc"><?php the_title(); ?></span></h2></div><!-- .listings-panel-title -->
			<div class="listings-panel-actions"><div class="listings-panel-action"><?php wpsight_orderby(); ?></div>
				<?php do_action( 'wpsight_listings_panel_actions' ); ?>
			</div><!-- .listings-panel-actions -->
		</div><!-- .listings-panel -->
	</div>
		<?php if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {$paged = get_query_var('page'); } else {$paged = 1; }
		$title = explode(" ", get_the_title());
		$args = array( 'post_type' => 'listing',
					'posts_per_page' => 6,
					'meta_key' => '_price_offer',                    //(string) - Custom field key.
					'meta_value' => $title[1],               //(string) - Custom field value.
					'meta_compare' => '=',
					'orderby' => $_GET['orderby'],
					'order' => $_GET['order'],
					'paged' => $paged
				);
		
	$the_query = new WP_Query( $args );
	//echo '<pre>';print_r($the_query);echo '</pre>';
	echo '<div class="list-list"><div class="listing-list listing-search wpsight-listings">';
	if ( $the_query->have_posts() ) :
	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	  <div class="listing col-md-12">
	  <?php $field_key_gallary = get_field_object('field_58d366980a2bd', get_the_ID()); ?>
		<div class="post-thumb col-md-4 pull-left"><a href="<?php echo get_the_permalink(); ?>">
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
			<div class="col-md-12 post-meta-data pull-left"><span class="icon homes pull-left"><span class="icon-home4"></span><?php echo get_post_meta($post_id,'_details_4',true); ?> m2</span><span class="icon bed pull-left"><span class="icon-bed"></span><?php if(get_post_meta($post_id,'_details_1',true)!=''){echo get_post_meta($post_id,'_details_1',true);} else {echo '0';} ?> beds</span><span class="icon bath pull-left"><span class="icon-bathtub"></span><?php if(get_post_meta($post_id,'_details_2',true)!=''){echo get_post_meta($post_id,'_details_2',true);} else {echo '0';} ?> baths</span><span class="icon read-more pull-left"><a class="text-center" href="<?php echo get_the_permalink(); ?>">More Info</a></span></div>
		</div>
	  </div>
	<?php endwhile;
	endif; echo '</div></div>';
	wpsight_pagination( $the_query->max_num_pages );
	wp_reset_postdata();
}
add_shortcode('listing_property','listing_property');
?>