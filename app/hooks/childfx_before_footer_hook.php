<?php 

add_action( 'calibrefx_before_footer', 'clockwork_before_footer' );

function clockwork_before_footer(){

	$crk_contact_number	= esc_attr(calibrefx_get_option('crk_contact_number'));
	$admin_email 		= get_option( 'admin_email' );
	 ?>

		<div class="wrapper_before-footer">

			<div class="container">

				<div class="row">

					<div class="col-md-12">
						
						<div class="info_before-footer">
							<span id="info1_before-footer">© 2014 PTForum. All rights reserved.</span>
							<span id="info2_before-footer">Tel : <a href="tel:<?php echo $crk_contact_number; ?>"><?php echo $crk_contact_number; ?></a></span>	
							<span id="info3_before-footer">Email : <a href="mailto:<?php echo $admin_email; ?>"><?php echo $admin_email; ?></a></span>	
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
}