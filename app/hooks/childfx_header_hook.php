<?php 

// add_action( 'calibrefx_before_header', 'clockwork_before_header' );
// add_action( 'calibrefx_header', 'clockwork_header' );
// add_action( 'calibrefx_before_content', 'clockwork_before_content' );
// add_action( 'calibrefx_header_right_widget', 'clockwork_header_right_widget' );

// add_action( 'calibrefx_after_header', 'clockwork_after_header' );

// remove_action( 'calibrefx_header' );



function clockwork_before_header(){

		// 	MODAL SUPPORT
	 ?>	<div id="clockwork-modal">
			
			<!-- HEADER TEASER MODAL -->
			<div clockwork-modal="header_teaser">
				<?php 	
					$args = array(
						//Type & Status Parameters
						'post_type'   => 'furniture',

						//Order & Orderby Parameters
						'order'               => 'rand',

						//Pagination Parameters
						'posts_per_page'         => 4,

						//Taxonomy Parameters
						'tax_query' => array(
							'relation'  => 'AND',
								array(
									'taxonomy'         	=> 'furniture_tag',
									'field'            	=> 'slug',
									'terms'				=> 'featured',
								)
						)
					);
					
					$the_query = new WP_Query( $args );

					if ( $the_query->have_posts() ){

						$ctr = 1;

						while ( $the_query->have_posts() ){

							$the_query->the_post();

							 ?>	<a href="<?php echo get_the_permalink( get_the_ID() ); ?>">
								 	<div class="col-md-3">
								 		<div class="header-teaser-items">
								 			<?php echo get_the_post_thumbnail( get_the_ID(), 'thumbnail', array( 'class'=>'img-responsive' ) ); ?>
								 		</div>
								 	</div>
							 	</a>
							<?php
						}

						wp_reset_postdata();
					} else {

						echo "no post to show";
					}
				 ?>
			</div>


	 	</div>
	<?php


	 ?>
	 	<div class="container-fluid">
	<?php	
}

function clockwork_header(){
	 ?>
	 	</div>
	<?php
	// do_action('calibrefx_site_title');
}

function clockwork_before_content(){
	
}

function clockwork_header_right_widget(){
}

function clockwork_after_header(){
	 ?>
		<div id="clockwork_after_header">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-4">s</div>
				</div>
			</div>
		</div>
	<?php
}