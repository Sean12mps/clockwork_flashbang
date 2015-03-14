<?php 

calibrefx_set_layout( 'full_width' );


remove_action( 'calibrefx_after_content', 'calibrefx_get_sidebar' );
remove_action('calibrefx_loop', 'calibrefx_do_loop');


add_action('calibrefx_loop', 'childfx_do_loop');

function childfx_do_loop(){

	$crk_front_img_1    = esc_attr(calibrefx_get_option('crk_front_img_1'));
    $crk_front_img_2    = esc_attr(calibrefx_get_option('crk_front_img_2'));
    $crk_front_img_3    = esc_attr(calibrefx_get_option('crk_front_img_3'));
    $crk_front_img_4    = esc_attr(calibrefx_get_option('crk_front_img_4'));

    $crk_front_img_1_l  = esc_attr(calibrefx_get_option('crk_front_img_1_l'));
    $crk_front_img_2_l  = esc_attr(calibrefx_get_option('crk_front_img_2_l'));
    $crk_front_img_3_l  = esc_attr(calibrefx_get_option('crk_front_img_3_l'));
    $crk_front_img_4_l  = esc_attr(calibrefx_get_option('crk_front_img_4_l'));
?>	
	<div class="wrapper_inner_logo">

		<div class="row">

			<div class="col-md-12">
				
				<div class="col-xs-6 col-md-6">
					<div class="wrapper_front-page-logo" style="text-align: right;">
						<a href="<?php echo $crk_front_img_1_l; ?>">
							<img src="<?php echo $crk_front_img_1; ?>" alt="">
						</a>
					</div>
				</div>

				<div class="col-xs-6 col-md-6">
					<div class="wrapper_front-page-logo" style="text-align: left;">
						<a href="<?php echo $crk_front_img_2_l; ?>">
							<img src="<?php echo $crk_front_img_2; ?>" alt="">
						</a>
					</div>
				</div>

				<div class="clearfix"></div>

				<div class="col-xs-6 col-md-6">
					<div class="wrapper_front-page-logo" style="text-align: right;">
						<a href="<?php echo $crk_front_img_3_l; ?>">
							<img src="<?php echo $crk_front_img_3; ?>" alt="">
						</a>
					</div>
				</div>

				<div class="col-xs-6 col-md-6">
					<div class="wrapper_front-page-logo" style="text-align: left;">
						<a href="<?php echo $crk_front_img_4_l; ?>">
							<img src="<?php echo $crk_front_img_4; ?>" alt="">
						</a>
					</div>
				</div>
				
			</div>
		</div>
    </div>

<?php
}



calibrefx();