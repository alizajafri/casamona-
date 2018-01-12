<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_sidebar( 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">
<footer class="site-footer" id="colophon">
	<div class="<?php echo esc_html( $container ); ?>">
		<div class="row">
			<div class="col-md-2">
				<?php dynamic_sidebar('footer1');?>
			</div><!--col end -->
			<div class="col-md-2">
				<?php dynamic_sidebar('footer2');?>
			</div><!--col end -->
			<div class="col-md-2">
				<?php dynamic_sidebar('footer3');?>
			</div><!--col end -->
			<div class="col-md-2">
				<?php dynamic_sidebar('footer4');?>
			</div><!--col end -->
			<div class="col-md-4 contact-info">
				<?php dynamic_sidebar('footer5');?>
			</div><!--col end -->
		</div><!-- row end -->
	</div><!-- container end -->
</footer><!-- #colophon -->
<div class="bottom-footer">
	<div class="<?php echo esc_html( $container ); ?>">
		<div class="row">
			<div class="col-md-12">
				<?php dynamic_sidebar('footerbottom');?>
			</div><!--col end -->
		</div><!-- row end -->
	</div><!-- container end -->
</div><!-- bottom-footer end -->
</div><!-- wrapper end -->

</div><!-- #page -->
<?php wp_footer(); ?>
<script>
jQuery('#myTabs .tog').click(function (e) {
  e.preventDefault()
  jQuery(this).tab('show')
});
jQuery(document).ready(function(){
//jQuery(".price-search").hide();
jQuery("#home .common_min_wr").wrapAll("<div class='price-search selectpicker'></div>");
jQuery("#profile .common_min_wr").wrapAll("<div class='price-search selectpicker'></div>");
jQuery(".listing-search-price").click(function(){
    //jQuery(".price-search").show();
	if(jQuery(".price-search").hasClass('active'))
	{
	jQuery(".price-search").removeClass('active');
	}else{
	jQuery(".price-search").addClass('active');
	}
	var min_price = jQuery('.listing-search-min').val();
	var max_price = jQuery('.listing-search-max').val();
	if(min_price != '' && max_price != ''){
		jQuery('.listing-search-price').val(min_price+' - '+ max_price);
	} else if(max_price != '' && min_price == ''){
		jQuery('.listing-search-price').val(max_price);
	} else if(max_price == '' && min_price != ''){
		jQuery('.listing-search-price').val(min_price);
	}
});
});
</script>
<script>
jQuery(document).ready(function(){
  jQuery('.gallery').flickity({
  // options
  cellAlign: 'left',
  freeScroll: true,
  pageDots: false,
  initialIndex: 2,
  contain: true
});

  jQuery('.main-carousel1').flickity({
  // options
  cellAlign: 'left',
  freeScroll: true,
  pageDots: false,
  initialIndex: 2,
  contain: true
});
 jQuery('.wpsight-listings').jscroll({
    loadingHtml: '<img src="loading.gif" alt="Loading" /> Loading...',
    padding: 20,
    nextSelector: '.wpsight-pagination .next',
    contentSelector: 'div'
});
});
</script>
</body>

</html>
