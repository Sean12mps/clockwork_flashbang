<?php 

function clockwork_loading( $classes ){
	$classes[] = 'clockwork-loading';
	return $classes;
}
add_filter( 'body_class', 'clockwork_loading' );

function clockwork_content_wrapper( $classes ){
	return 'row';
}
// add_filter( 'content_wrapper_class', 'clockwork_content_wrapper' );