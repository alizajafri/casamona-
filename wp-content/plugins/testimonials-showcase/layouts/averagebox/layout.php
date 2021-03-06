<?php

 
class tt_average_box {

	//make it public so it can be accessed by cmshowcase constructor
	public $layout_id = 'averagebox'; //should be same name as folder
	public $layout_name = 'Average Rating Box';
	public $settings;
	public $options;
	public $enqueue_files;
	public $shortcode_check; // js function to run for preview to work properly
	public $custom_css;
	public $footer_content;

	function __construct($id = ''){

		$this->showcase_id = $id;

		//custom css
		//we define it here, so we empty it after first time it's used
		$advanced_section = $this->showcase_id.'_advanced_settings';
		$this->custom_css = cmshowcase_get_option( 'custom_css', $advanced_section,  '' );

		//Options for the Generator
		$options = array(

			'sep01' => array(
					'type' => 'seperator'
			),

			'style_info' => array(
				'label' => __('Style','ttshowcase'),
				'description' => '',
				'type' => 'html_bold'
				),


			'sep02' => array(
					'label' => '',
					'type' => 'seperator'
			),

			'theme' => array(
					'label' => __('Theme','ttshowcase'),
					'description' => __('Aspect of Box','ttshowcase'),
					'type' => 'select',
					'default' => 'box',
					'options' => array(
						'simple_box' => __('Simple Box','ttshowcase'),
						'big_star_box' => __('Big Stars Box','ttshowcase'),
						'none' => __('None','ttshowcase')
						)
			),

			'sep03' => array(
					'type' => 'seperator'
			),

			'visual_info' => array(
				'label' => __('What do display','ttshowcase'),
				'description' => '',
				'type' => 'html_bold'
				),


			'sep04' => array(
					'label' => '',
					'type' => 'seperator'
			),


			'stars' => array(
				'label' => __('Show Stars','ttshowcase'),
				'description' => __('Display Star Icons','ttshowcase'),
				'type' => 'checkbox',
				'default' => 'on',
				'value' => 'on'
				),

			'half_stars' => array(
				'label' => __('Use Half Stars','ttshowcase'),
				'description' => __('Display Half Stars','ttshowcase'),
				'type' => 'checkbox',
				'default' => 'on',
				'value' => 'on'
				),

			'stars_label' => array(
				'label' => __('Stars Label','ttshowcase'),
				'description' => __('Text to display before the Star Icons','ttshowcase'),
				'type' => 'text',
				'default' => 'Rating of ',
				'size' => 'medium'
				),

			'average' => array(
				'label' => __('Show Average','ttshowcase'),
				'description' => __('Display average value of ratings','ttshowcase'),
				'type' => 'checkbox',
				'default' => 'on',
				'value' => 'on'
				),

			'average_label' => array(
				'label' => __('Average Label','ttshowcase'),
				'description' => __('Text to display before the Average','ttshowcase'),
				'type' => 'text',
				'default' => ' Average of ',
				'size' => 'medium'
				),

			'total' => array(
				'label' => __('Show Total Ratings','ttshowcase'),
				'description' => __('Display number of total ratings','ttshowcase'),
				'type' => 'checkbox',
				'default' => 'on',
				'value' => 'on'
				),

			'total_label' => array(
				'label' => __('Total Label','ttshowcase'),
				'description' => __('Text to display before the Total Ratings value','ttshowcase'),
				'type' => 'text',
				'default' => ' on a total of ',
				'size' => 'medium'
				),

			'total_label_after' => array(
				'label' => __('Total Label After','ttshowcase'),
				'description' => __('Text to display after the Total Ratings value','ttshowcase'),
				'type' => 'text',
				'default' => ' Ratings',
				'size' => 'medium'
				),

			'total_label_after_singular' => array(
				'label' => __('Total Label After (singular)','ttshowcase'),
				'description' => __('Text to display after the Total Ratings value when there\'s only one rating','ttshowcase'),
				'type' => 'text',
				'default' => ' Rating',
				'size' => 'medium'
				),

			'empty' => array(
				'label' => __('Text for empty average','ttshowcase'),
				'description' => __('Text to display when there are no ratings to calculate average','ttshowcase'),
				'type' => 'text',
				'default' => 'There are no ratings',
				'size' => 'medium'
				),


			'seperator_2' => array(
					'label' => '',
					'type' => 'seperator'
			),

			'product_info' => array(
				'label' => __('Rich Snippets','ttshowcase'),
				'description' => '',
				'type' => 'html_bold'
				),


			'seperator_3' => array(
					'label' => '',
					'type' => 'seperator'
			),


			'richsnippets' => array(
					'label' => __('Rich Snippets','ttshowcase'),
					'description' => __('Keep the default settings or override them for this specific shortcode','ttshowcase'),
					'type' => 'select',
					'default' => '',
					'options' => array(
						'' => __('Default Settings','ttshowcase'),
						'off' => __('Do not include meta data','ttshowcase'),
						'on' => __('Include meta data','ttshowcase')
						)
			),

			'product' => array(
				'label' => __('Product being reviewed','ttshowcase'),
				'description' => __('Custom Product Name for Rich Snippets. Will only be used if Rich Snippets are active for shortcodes. Leave blank to use default Product set in the settings page.','ttshowcase'),
				'type' => 'text',
				'default' => '',
				'size' => 'medium'
				),

		);



		$this->options = $options; 

		//Files to enqueue on the generator and when building the layout

		$enqueue = array(
			'css' => array(
				'tt-font-awesome' => array(
					'file' => '/resources/font-awesome/css/font-awesome.min.css'
					),
				'tt-global-styles' => array(
					'file' => '/resources/global.css'
					),
				'tt-averagebox-layout-style' => array(
					'file' => '/layouts/averagebox/styles.css'
					),
				),

			);
		
		$this->enqueue_files = $enqueue;
		
	}

	public function build_layout( $query = array() , $options = array(), $preview = false ) {

		/*if(!$query->have_posts()) {
			wp_reset_postdata();
			$html = isset($options['empty']) && $options['empty'] != '' ? $options['empty'] : 'Ratings empty';
			return "<!-- Empty TShowcase Container -->".$html;

		}*/

		//enqueue necessary files
		cmshowcase_enqueue_layout_scripts($this->enqueue_files);

		//using counter to set the wrapper div
		global $tt_showcase_counter;
		$wrap = '#'.$this->showcase_id.'_'.$tt_showcase_counter;

		$custom_css = $this->custom_css;

		//If we use options
		/*

		$section = $this->showcase_id.'_'.$this->layout_id;
		$read_more_label = cmshowcase_get_option( 'read_more_label', $section, 'Continue Reading' );

		*/

		$rating_highest = 5;
		$rating_total = 0;
		$review_count = 0;

		

		if ( $query->have_posts() ) {

			while ( $query->have_posts() ) {
				
				$query->the_post();
				$post_id = get_the_ID();

				$rating = get_post_meta( $post_id, '_aditional_info_rating', true );

				//Consider rating only if it's bigger than 0. Meaning, not ignore.
				if($rating!=0) {

					$rating_total = $rating_total + $rating;
					$review_count++;
				
				}

				

			} //end while

		} //end if query have posts




		//building the layout itself with the info gathered

		$html = '';


		//rich snippet reviews needed variables
		$snippet_on = cmshowcase_get_option('shortcode_active','ttshowcase_rich_snippets','off');
		//shortcode override
				//rich snippet reviews needed variables
		$snippet_on = cmshowcase_get_option('shortcode_active','ttshowcase_rich_snippets','off');

		//shortcode override
		$snippet_on = isset($options['richsnippets']) && $options['richsnippets'] != '' ? $options['richsnippets'] : $snippet_on;

		//get box style
		$theme_class = isset($options['theme']) && $options['theme'] != 'none' ? 'tt_'.$options['theme'] : '';


		//In case the rich snippets are on, we wrap the identifier itemscop div
		
		$rsmeta = '';
		$rsmetavalues = '';
		if($review_count!=0) {
			$average = round($rating_total/$review_count,2);
		} else {
			$average = 0;
		}
		
		

		//use half stars or not
		$use_half = isset($options['half_stars']) && $options['half_stars'] == 'on' ? true : false;

		if(!$use_half) {
			$rounded = round($average);
			$half = 0;
		}

		if($use_half) {

			$rounded = intval($average);
			$half = round($average-$rounded);

		}

		//use empty stars or not
		$empty_stars = cmshowcase_get_boolean(cmshowcase_get_option( 'empty_stars', 'ttshowcase_basic_settings', 'off' ));
		$emptys = 0;
		if($empty_stars) {
				
				$emptys = 5 - round($average);

			}




		if($snippet_on == 'on') {

			//we grab the product name
			$itemreviewed = cmshowcase_get_option( 'default_product', 'ttshowcase_rich_snippets', get_bloginfo() );
			$use_cat_as_prod = cmshowcase_get_option( 'categories_as_products', 'ttshowcase_rich_snippets', 'off' );
			$custom_product = isset($options['product']) ? $options['product'] : '';

			if($custom_product!='') {
				$itemreviewed = $custom_product;
			} 

			else {

				if($use_cat_as_prod =='on') {

					if( isset($query->query_vars['ttshowcase_groups']) ) {

						$cat_array = explode(',',$query->query_vars['ttshowcase_groups']);

						$term = get_term_by('slug',  $cat_array[0], 'ttshowcase_groups');

						$itemreviewed = $term->name;

					}
				
				}

			}

			$html .= '<div itemscope itemtype="http://schema.org/Product">
   					  <meta itemprop="name" content="'.$itemreviewed.'">';

			$rsmeta = 'itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating"';
			$rsmetavalues = '
			<meta itemprop="ratingValue" content="'.$average.'">
    		<meta itemprop="ratingCount" content="'.$review_count.'">';
		}

		$html .= '<div class="tt_average_rating_box '.$theme_class.'" '.$rsmeta.' >';
		//end snippet wrap first block

		$html .= $rsmetavalues;
		
		if($review_count==0) {

			$html .= isset($options['empty']) && $options['empty'] != '' ? $options['empty'] : 'Ratings empty';

		} 

		else {
		
			$stars_on = isset($options['stars']) && $options['stars'] == 'on' ? true : false;
			if($stars_on) {
				$stars = '<i class="fa fa-star"></i>';
				$halfstar = '<i class="fa fa-star-half-o"></i>';
				$emptystar = '<i class="fa fa-star-o"></i>';

				$rstars = '<span class="tt_rating_box_stars">'.str_repeat($stars,$rounded).str_repeat($halfstar,$half).str_repeat($emptystar,$emptys).'</span>';
				$stars_label = isset($options['stars_label']) && $options['stars_label'] != '' ? '<span class="tt_rating_box_star_label">'.$options['stars_label'].'</span>' : '';
				$html .= '<span class="tt_star_wrap">'.$stars_label.$rstars.'</span>';
			}

			$average_on = isset($options['average']) && $options['average'] == 'on' ? true : false;
			if($average_on) {
				$average_label = isset($options['average_label']) && $options['average_label'] != '' ? $options['average_label'] : '';
				$html .= '<span class="tt_rating_box_average">'.$average_label.$average.'</span>';

			}

			$total_on = isset($options['total']) && $options['total'] == 'on' ? true : false;

			if($total_on) {
				$total_label = isset($options['total_label']) && $options['total_label'] != '' ? $options['total_label'] : '';
				
				if(intval($review_count)==1) {
					$total_label_after = isset($options['total_label_after_singular']) && $options['total_label_after_singular'] != '' ? $options['total_label_after_singular'] : '';
				}
				else {
					$total_label_after = isset($options['total_label_after']) && $options['total_label_after'] != '' ? $options['total_label_after'] : '';

				}

				$html .= '<span class="tt_rating_box_total">'.$total_label.$review_count.$total_label_after.'</span>';

			}

		}


		$html .= '</div>';

		//closing rich snippet div
		if($snippet_on == 'on') {
			$html .= '</div>';
		}

		$css = '';

		if($custom_css!='') {

			$css .= '<!-- Custom Styles for Testimonials Showcase -->';
			    $css .= '<style type="text/css">';
			    $css .= $custom_css;
			    $css .= '</style>';

			$this->custom_css = '';

		}

		if($preview) {

			$html = $html.$css;

		}

		else {
			$this->footer_content .= $css;
			add_action('wp_footer', array($this,'ttshowcase_footer_content'),100);
		}


		wp_reset_postdata();
		return $html;

		

	}

	function ttshowcase_footer_content() {

		echo $this->footer_content;

	}

}




?>