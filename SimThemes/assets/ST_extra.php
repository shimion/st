<?php
class ST_extra extends ST_core{
	
	public function __construct(){
	add_action('wp_head', array($this, 'wp_additional_things'));
	add_action('wp_footer', array($this, 'footer_script'));
	add_action('wp_footer', array($this, 'way_to_top'));
	add_action('start_body', array($this, 'call_body_loader'), '99');
	//add_action('wp_footer', array($this, 'call_smoothwhile_footer'), '99');
	//add_action('start_body', array($this, 'spinners_loading'), 30);
	add_action( 'wp_head', array($this,'ST_way_point'));
		}



	public function wp_additional_things($area){
			$favicon = (ot_get_option('favicon_url'))? ot_get_option('favicon_url'): ST_template_img.'/favicon.ico';
			$output = '<link rel="shortcut icon" href="' .$favicon. '" type="image/x-icon" />' ."\n";
			$output .= 	ot_get_option('analytics_code') . "\n";
			$output .= '<style type="text/css">' . "\n";			
			$output .= 	ot_get_option('custom_css') . "\n";
			$output .= '</style>' . "\n";	
			$output .= $this->custom_css_from_tempeoption();
			$output .= 	ot_get_option('custom_js') . "\n";
			$output .= 	ot_get_option('footer_script') . "\n";
			echo $output;	
		}




	public function footer_script(){
			echo ot_get_option('footer_script');
		}

	public function call_body_loader(){
		echo '<div class="add_loading"></div>';
		
		}

			
/*	public function call_smoothwhile_footer(){
		echo '<script>
jQuery(function($){
	    $.scrollSpeed(100, 800);
});
</script>';
		
		}
*/

	public function way_to_top(){
		echo '<a href="#" class="scrollToTop" ><i class="fa fa-arrow-circle-up fa-5"></i></a>';
		}
		
		
		
	public	function ST_way_point(){
					global $post, $wp_query, $fixed;
				$Transparent_Header = get_post_meta(get_the_ID(), 'Transparent_Header', true);
				if($Transparent_Header=='on'){
					$fixed = 'navbar-fixed-top';
					$output = "<script>
							jQuery(document).ready(function($){
						$('.way_point_detector').waypoint(function(){
							$('.very_top_bar').toggleClass('hide');
						});
						});
			
					</script>";
				}else{
					$Transparent_Header = ot_get_option('Transparent_Header');
					if($Transparent_Header=='on'){
					$fixed = 'navbar-fixed-top';
					
					$output = "<script>
							jQuery(document).ready(function($){
				$('.way_point_detector').waypoint(function(){
					$('.very_top_bar').toggleClass('hide');
				});
				});
			
					</script>";
					
					}else{
						
					$output = "<script>
							jQuery(document).ready(function($){
						$('.main-header').waypoint(function(){
					$('.main-header').toggleClass('navbar-fixed-top sticky_header  scrollimation in');
				},{offset:'.1%'});
			
			
				$('.way_point_detector').waypoint(function(){
					$('.very_top_bar').toggleClass('hide');
				});
				});
			
					</script>";
						
						}
				}
			
		echo apply_filters('ST_waypoint_filter', $output);		
			
				
		}
		
		
		

	
}
	
global $ST_extra;	$ST_extra = new ST_extra();
