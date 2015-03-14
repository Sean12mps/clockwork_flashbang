<?php 

// 	Page Title
	add_action( 'calibrefx_before_loop', 'clockwork_before_loop' );
	function clockwork_before_loop(){
		 ?>	<div class="col-xs-12">
		 		<h1 class="page-title">Brand</h1>
		<?php
	}


// 	Post Classes
	add_filter( 'post_class', 'clockwork_post_class' );
	function clockwork_post_class( $classes) {

	    $custom_post = calibrefx_get_custom_field( '_calibrefx_custom_post_class' );

	    if ( !empty( $custom_post ) ) {
	        $classes[] = $custom_post;
	    }

	    $classes[] = 'col-xs-3 col-md-3';

	    return $classes;
	}


// 	Post Info
	remove_action('calibrefx_before_post_content', 'calibrefx_do_before_post_content');
    remove_action('calibrefx_before_post_content', 'calibrefx_post_info');


// 	Post Content
	//excerpt removed by function.js >> childfx.engine( 'archive_furniture_custom' );
	remove_action('calibrefx_post_content', 'calibrefx_do_post_image');
	add_action('calibrefx_post_content', 'clockwork_do_post_image');
	function clockwork_do_post_image(){
		 ?>	
		 	<a href="<?php echo get_the_permalink(); ?>">
				<?php echo get_the_post_thumbnail( get_the_ID(), 'medium', array( 'class'=>'img-responsive' ) ); ?>
			</a>
		<?php
	}


// 	Post Title
	remove_action('calibrefx_post_title', 'calibrefx_do_post_title');
	add_action( 'calibrefx_post_content', 'clockwork_do_post_title' );
	function clockwork_do_post_title() {
		 ?>	
		 	<a class="link-post-title" href="<?php echo get_the_permalink(); ?>">
			 	<h1>
		 			<?php echo get_the_title(); ?>
			 	</h1>
	 		</a>
		<?php
	}


// 	Post Meta
    remove_action('calibrefx_after_post_content', 'calibrefx_post_meta');


//	After Loop
    add_action( 'calibrefx_after_loop', 'clockwork_after_loop' );
    function clockwork_after_loop(){
    	 ?>	</div>
    	<?php
    }


/*	Support
 * 	- wrapping cols with row by function.js >> childfx.engine( 'archive_furniture_custom' );
 *	- format archive's pagination 
 */	





calibrefx();