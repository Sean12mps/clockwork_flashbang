<?php 

// 	Page Title
	add_action( 'calibrefx_before_loop', 'clockwork_before_loop' );
	function clockwork_before_loop(){
		 ?>	<div class="col-xs-12">
		 		<h1 class="page-title">Projects</h1>
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




calibrefx();