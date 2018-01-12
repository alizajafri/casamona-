jQuery(document).ready(function($){

	var cmsliders = [];

	if(tt_slider_param !== undefined) {

		for (var key in tt_slider_param) {

			var columns = parseInt(tt_slider_param[key]['columns']);
			
			var wrap = tt_slider_param[key]['wrap_id']; 

				
				var smode = tt_slider_param[key]['mode'];
				var spause = parseInt(tt_slider_param[key]['pause']);
				var sauto = tt_slider_param[key]['auto'];

				//controls
				var next_arrow = tt_slider_param[key]['arrow_next'];
				var prev_arrow = tt_slider_param[key]['arrow_prev'];

				var scontrols = false;
				var sautocontrols = false;
				var spager = false;


				if(tt_slider_param[key]['controls']=='controls') {
					scontrols = true;
				}

				if(tt_slider_param[key]['controls']=='pager') {
					spager = true;
				}


				if(tt_slider_param[key]['controls']=='autocontrols') {
					sautocontrols = true;
				}




				$(wrap +' .ttshowcase_slider').fadeIn('slow');

				cmsliders[key] = $(wrap +' .ttshowcase_wrap').bxSlider({
				 
				  mode: smode,
				  auto: sauto,
				  controls: scontrols,
				  autoControls: sautocontrols,
				  pager: spager,
				  pause: spause,
				  pagerType: 'full',
				  autoHover: true,
				  nextSelector: wrap + ' #tt-slider-next',	
  				  prevSelector: wrap + ' #tt-slider-prev',
  				  nextText: next_arrow,
  				  prevText: prev_arrow,
  				  speed: 500

				});

				if(sauto==true) {
					
					$('.bx-next, .bx-prev, .bx-pager a').click(function(){
					    // time to wait (in ms)
					    var wait = 2000;
					    setTimeout(function(){
					        cmsliders[key].startAuto();
					    }, wait);
					});

				}

				
			

		}
	}

});