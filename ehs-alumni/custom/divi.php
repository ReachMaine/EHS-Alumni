<?php /* divi */
// add do_shortcode to footer credits
if ( ! function_exists( 'et_get_footer_credits' ) ) {
  function et_get_footer_credits() {
  	$original_footer_credits = et_get_original_footer_credits();

  	$disable_custom_credits = et_get_option( 'disable_custom_footer_credits', false );

  	if ( $disable_custom_credits ) {
  		return '';
  	}

  	$credits_format = '<%2$s id="footer-info">%1$s</%2$s>';

  	$footer_credits = et_get_option( 'custom_footer_credits', '' );

  	if ( '' === trim( $footer_credits ) ) {
  		return et_get_safe_localization( sprintf( $credits_format, $original_footer_credits, 'p' ) );
  	}
    $footer_credits = do_shortcode($footer_credits);
  	return et_get_safe_localization( sprintf( $credits_format, $footer_credits, 'div' ) );
  }
}


// put header "topbar" across all pages (except home page)
function ehsaa_top_bar() {
  if ( !is_front_page() ) {
    echo do_shortcode('[et_pb_section global_module="1574"][/et_pb_section]');
  }
}

add_action( 'et_before_main_content', 'ehsaa_top_bar' );

add_action('et_after_main_content', 'ehsaa_after_content');
function ehsaa_after_content () {
   if (is_page()) {
    echo do_shortcode('[et_pb_section global_module="2212"][/et_pb_section]');
  }
}
