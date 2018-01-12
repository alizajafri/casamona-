<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="nav-item col-md-3 text-center"><a href="#home" role="tab" data-toggle="tab" class="nav-link tog active ">For Sale</a></li>
    <li role="presentation" class="nav-item col-md-3 text-center"><a href="#messages" role="tab" data-toggle="tab" class="nav-link tog">Refrence No.</a></li>
	<li role="presentation" class="nav-item col-md-3 text-center"><a href="#profile" role="tab" data-toggle="tab" class="nav-link tog">For Rent</a></li> 
    <li role="presentation" class="nav-item col-md-3 text-center"><a href="/listings-map/">Search By Map</a></li>
  </ul>
  
  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
<form method="get"<?php echo $args['id']; ?> action="<?php echo esc_url( $args['action'] ); ?>" class="pull-left <?php echo sanitize_html_class( $args['class'] ); ?> <?php echo sanitize_html_class( $args['orientation'] ); ?>" style="width:100%;">
	
	<div class="listings-search-default">	
		<?php echo $search_default; ?>
		<input type="hidden" value="sale" name="offer" />		
	</div><!-- .listings-search-default -->
	
	<?php if( ! empty( $search_advanced ) && $args['advanced'] !== false ) : ?>
	
		<div class="listings-search-advanced">		
			<?php echo $search_advanced; ?>			
		</div><!-- .listings-search-advanced -->
			
		<?php // Display advanced search toggle button ?>
		<?php echo wp_kses_post( $args['advanced'] ); ?>
			
	<?php endif; ?>
	
	<?php if( $args['reset'] !== false ) : ?>	
		<?php // Display reset search button ?>
		<?php echo wp_kses_post( $args['reset'] ); ?>			
	<?php endif; ?>
	
	<?php if( isset( $_GET['page_id'] ) ) : ?>
		<?php // Add current page_id to GET parameters if permalinks are not pretty ?>
		<input name="page_id" type="hidden" value="<?php echo absint( $_GET['page_id'] ); ?>" />
	<?php endif; ?>
		
	</form><!-- .<?php echo sanitize_html_class( $args['class'] ); ?> -->
	</div>
	
	<div role="tabpanel" class="tab-pane" id="messages">
		<form method="get"<?php echo $args['id']; ?> action="<?php echo site_url().'/ref'; ?>" class="pull-left <?php echo sanitize_html_class( $args['class'] ); ?> <?php echo sanitize_html_class( $args['orientation'] ); ?>" style="width:100%;">
		<div class="listings-search-default">	
		<div class="listings-search-field listings-search-field-offer_select listings-search-field-offers width-1-3">
		<select name="offer" class="selectpicker" data-live-search="true" >
			<?php $details = wpsight_offers();
				foreach($details as $detail => $v){ ?>
					<option data-tokens="<?php echo $v;?>" value="<?php echo $detail; ?>" <?php selected( $detail, sanitize_key( $_GET['offer'] ) ); ?> data-default="<?php echo esc_attr( $data_default ); ?>"><?php echo $v; ?></option>
				<?php } ?>
		</select></div>
		<?php //$details = wpsight_details(); print_r($details); ?>
		<div class="listings-search-field listings-search-field-text listings-search-field-ref width-1-3 ">
		<input class="listing-search-ref text" title="Refrence" name="ref" type="text" value="<?php echo $_GET['ref'] ?>" placeholder="Refrence No." />
		</div><!-- .listings-search-field-<?php echo esc_attr( $field ); ?> -->
		<div class="listings-search-field listings-search-field-submit listings-search-field-submit width-1-5">
		<input type="submit" value="Search">
		</div>
		</div>
		</form>
	</div>
	
    <div role="tabpanel" class="tab-pane" id="profile">
	<form method="get"<?php echo $args['id']; ?> action="<?php echo esc_url( $args['action'] ); ?>" class="pull-left <?php echo sanitize_html_class( $args['class'] ); ?> <?php echo sanitize_html_class( $args['orientation'] ); ?>" style="width:100%;">
	
	<div class="listings-search-default">	
		<?php echo $search_default; ?>	
		<input type="hidden" value="rent" name="offer" />		
	</div><!-- .listings-search-default -->
	
	<?php if( ! empty( $search_advanced ) && $args['advanced'] !== false ) : ?>
	
		<div class="listings-search-advanced">		
			<?php echo $search_advanced; ?>			
		</div><!-- .listings-search-advanced -->
			
		<?php // Display advanced search toggle button ?>
		<?php echo wp_kses_post( $args['advanced'] ); ?>
			
	<?php endif; ?>
	
	<?php if( $args['reset'] !== false ) : ?>	
		<?php // Display reset search button ?>
		<?php echo wp_kses_post( $args['reset'] ); ?>			
	<?php endif; ?>
	
	<?php if( isset( $_GET['page_id'] ) ) : ?>
		<?php // Add current page_id to GET parameters if permalinks are not pretty ?>
		<input name="page_id" type="hidden" value="<?php echo absint( $_GET['page_id'] ); ?>" />
	<?php endif; ?>
		
</form><!-- .<?php echo sanitize_html_class( $args['class'] ); ?> --></div>
    <div role="tabpanel" class="tab-pane" id="settings">...</div>
  </div>
