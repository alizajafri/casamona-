<?php
/**
 * Template: Single Listing Details
 */
global $listing; ?>

<div class="wpsight-listing-section wpsight-listing-section-details pull-left">
	
	<?php do_action( 'wpsight_listing_single_details_before', $listing->ID ); ?>
		<span class="homes pull-left text-center"><?php echo get_post_meta($listing->ID,'_details_4',true); ?> m<sup>2</sup></span><span class="bed pull-left text-center"><?php if(get_post_meta($listing->ID,'_details_1',true)!=''){echo get_post_meta($listing->ID,'_details_1',true);} else {echo '0';} ?> beds</span><span class="bath pull-left text-center"><?php if(get_post_meta($listing->ID,'_details_2',true)!=''){echo get_post_meta($listing->ID,'_details_2',true);} else {echo '0';} ?> baths</span>
		
		<div class="pull-left download text-center"><img src="/wp-content/uploads/2017/03/download.png" /> <?php if(get_post_meta($listing->ID,'_price_offer',true)== 'sale'){ echo '<a href="#" class="down-pres">Download sales presentation</a>'; } else { echo '<a href="#" class="down-pres">Download rent presentation</a>'; }?></div>
	<?php //wpsight_listing_details( $listing->ID ); ?>
	
	<?php do_action( 'wpsight_listing_single_details_after', $listing->ID ); ?>

</div><!-- .wpsight-listing-section-details -->