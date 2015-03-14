<?php 

// 	Replace original loop.
	remove_action('calibrefx_loop', 'calibrefx_do_loop');

	add_action('calibrefx_loop', 'childfx_do_loop');

	function childfx_do_loop(){
			global $dynamic_featured_image;
			$featured_images = $dynamic_featured_image->get_featured_images( $postId );

			// var_dump($featured_images);
			$slide_length = count( $featured_images );
			// var_dump($slide_length);
	?>
		<div class="row">

			<div class="col-xs-12">
				<h1 class="entry-title"><?php echo get_the_title(); ?></h1>
			</div>
		</div>

		<div class="entry-content-furniture">

			<div class="row">

				<div class="col-xs-12">
					<div id="carousel-furniture" class="carousel slide" data-ride="carousel">
					  	<!-- Indicators -->
						

					  	<!-- Wrapper for slides -->
					  	<div class="col-xs-10">
						  	<div class="carousel-inner" role="listbox">

								<?php 	for( $idx2 = 0; $idx2 < $slide_length; $idx2++ ){ 	
											$img = $featured_images[$idx2];
								 ?>
										    <div class="item <?php if( $idx2 == 0 ){ echo 'active'; } ?>">
										      <img src="<?php echo $img['full']; ?>" alt="...">
										      <div class="carousel-caption">
										      </div>
										    </div>
								<?php 	} 	?>
						  	</div>

						  	<div class="entry-content-description">
								<?php 	$my_postid = get_the_ID();//This is page id or post id
										$content_post = get_post($my_postid);
										$content = $content_post->post_content;
										$content = apply_filters('the_content', $content);
										$content = str_replace(']]>', ']]&gt;', $content);
										echo $content; ?>
							</div>
						</div>

					  	<div class="col-xs-2">
						  	<ol class="carousel-indicators">
								
								<?php 	for( $idx = 0; $idx < $slide_length; $idx++ ){ 	
											$img_t = $featured_images[$idx];
								 ?>
											<li 	data-target="#carousel-furniture" 
													data-slide-to="<?php echo $idx; ?>" 
													class="<?php if( $idx == 0 ){ echo 'active'; } ?>"
											 	>
											 	<div class="thumbnail">
											 		<img class="img-responsive" src="<?php echo $img_t['thumb']; ?>" alt="">
											 	</div>
											</li>
								<?php 	} 	?>
							</ol>

							<div id="cookieCart_input">
								
								<div id="project-inquiry">
						 				<h5 class="meta-dimensions">
											<strong>Add <span><?php echo get_the_title(); ?></span> to cart</strong>
										</h5>
										<div class="furniture-enquiry-ui row">
											<div class="col-xs-12"><input type="number" id="enquiry_ui_quantity"></div>
											<div class="col-xs-12"><button id="enquiry_ui_submit" productid="<?php echo get_the_ID(); ?>" productname="<?php echo get_the_title(); ?>">Add to enquiry</button></div>
										</div>
										<h5 class="meta-dimensions">
											<strong>Enquiry List</strong>
										</h5>
										<div id="project-enquiry-list">
										</div>	
										<p><a href="<?php echo get_site_url(); ?>/send-enquiry" id="enquiry-ui-send">Send enquiry list</a></p>
						 			</div>
						 		</div>
							</div>
						</div>

					  <!-- Controls 
					  <a class="left carousel-control" href="#carousel-furniture" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="right carousel-control" href="#carousel-furniture" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>-->
					</div><!-- #carousel-furniture -->
					
					
				</div>

				<div class="col-xs-12">
					<?php var_dump(get_post_meta( get_the_ID(), 'image_1', true )) ?>
				</div>
			</div>
		</div>
	<?php
	}


calibrefx();