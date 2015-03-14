<?php
/**
* Template Name: Enquiry Page
*
* clockwork
*
* clockwork
*
* @package            	clockwork
* @author            	Twellve
* @link            		http://www.twellvemiracle.technology
* @since            	Version 1.0.0
* @filesource
*
*/

remove_action('calibrefx_before_loop', 'calibrefx_do_breadcrumbs');

remove_action('calibrefx_loop', 'calibrefx_do_loop');

add_action('calibrefx_loop', 'childfx_do_loop');

function childfx_do_loop(){

		if ( isset($_GET['resp_message']) ) {
			$enquiry_sent = $_GET['resp_message'];

			if( $enquiry_sent == 'enquiry_sent' ){
				 ?>
				 	<h1>Thanks for ordering our products</h1>
				 	<p><a href="<?php echo get_site_url( ); ?>">Home</a></p>
				<?php
			} else {
				 ?>
				 	<h1>Something happened, your order is not saved. Please try again later</h1>
				 	<p><a href="<?php echo get_site_url( ); ?>">Home</a></p>
				<?php
			}

		} else {
			 ?>		
					<h5><strong>Enquiry List</strong></h5>
					<p>Products currently on your enquiry:</p>

					<div class="enquiry-cart col-md-12">
						
					</div>

					<p><a href="<?php echo get_site_url(); ?>/furniture/">Add more products</a></p>

					<div class="enquiry-form">
						<p>When you have selected all the products you would like to order, fill in the following details and click the "Send Enquiry" button:</p>
						<form role="form">
							<input type="hidden" name="do_enquiry" >

							<textarea name="enquiry_cart" id="enquiry_cart" style="display: none;"></textarea>
						
							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<label for="name">Name</label>
										<input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
									</div>

									<div class="form-group">
										<label for="address">Address</label>
										<input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
									</div>

									<div class="form-group">
										<label for="state">State</label>
										<input type="text" class="form-control" id="state" name="state" placeholder="Enter state">
									</div>
									
									<div class="form-group">
										<label for="email">Email address</label>
										<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="tel_numb">Telephone Number</label>
										<input type="text" class="form-control" id="tel_numb" name="tel_numb" placeholder="Enter telephone number">
									</div>

									<div class="form-group">
										<label for="fax">Fax</label>
										<input type="text" class="form-control" id="fax" name="fax" placeholder="Enter fax">
									</div>

									<div class="form-group">
										<label for="comment">Comments</label>
										<textarea type="text" class="form-control" id="comment" name="comment" placeholder="Enter Comment" rows="5" ></textarea>
									</div>

									<button type="submit" class="btn btn-default" id="submit_enq" name="submit_enq">Send Enquiry</button>
								</div>
							</div>
						</form>
					</div>

			<?php
		}
}


calibrefx();