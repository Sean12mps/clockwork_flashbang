<?php
/**
* Template Name: order cart
*
* clockwork
*
* clockwork Theme by Twellve
*
* @package          	CalibreFx
* @author          		Twellve
* @copyright   			Copyright (c) 2013, Twellve.
* @filesource
*
*
* @package CalibreFx
*/

remove_action('calibrefx_loop', 'calibrefx_do_loop');

add_action('calibrefx_loop', 'childfx_do_loop');

function childfx_do_loop(){
?>
	<div id="clockwork_cart-order" clockwork-ui="cart-order">
		
		<div class="page-break">
			<h1>Cart Order</h1>
		</div>


	</div>
<?php
}

calibrefx();
