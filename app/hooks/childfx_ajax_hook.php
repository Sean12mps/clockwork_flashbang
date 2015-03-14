<?php

add_action('calibrefx_do_ajax', 'childfx_ajax_handler');
function childfx_ajax_handler() {
	global $calibrefx;

	if(empty($_REQUEST['do'])) return;

	$do = $_REQUEST['do'];
	
	switch($do){


		case 'init_widget_inquiry':
			$furniture_id = $_POST['data'];

			$attr = array(
				'class'	=> "furniture-thumbnail-med",
			);

			$thumb_cart = array();
			$name_cart = array();
			$slug_cart = array();

			for( $i = 0; $i < count($furniture_id); $i++ ){

				$post 		= get_postdata( $furniture_id[$i] );

				$post_id 	= $post['ID'];
				$post_name 	= $post['Title'];
				$post_slug 	= $post['post_name'];

				// $img_id 	= get_post_meta( $post_id, 'image_1', true );
				// $img_th 	= wp_get_attachment_image( $img_id, 'thumbnail', 0, $attr );
				$img_th 	= get_the_post_thumbnail( $post_id, 'thumbnail' );

				array_push( $thumb_cart, $img_th );
				array_push( $name_cart, $post_name );
				array_push( $slug_cart, $post_slug );
			}


            $response = array(
                "product_thumbnail" 	=> 	$thumb_cart,
                "product_name" 			=> 	$name_cart,
                "product_slug" 			=> 	$slug_cart
            );

			break;

		case 'send_widget_inquiry':

				$enq_cart  		= $_POST['enquiry_cart'];
				$enq_name 		= $_POST['name'];
				$enq_address 	= $_POST['address'];
				$enq_state 		= $_POST['state'];
				$enq_email 		= $_POST['email'];
				$enq_tel_numb 	= $_POST['tel_numb'];
				$enq_fax 		= $_POST['fax'];
				$enq_comment 	= $_POST['comment'];

				add_filter( 'wp_mail_content_type', 'set_html_content_type' );

				$to 			= 	get_option( 'admin_email' );
				$subject 	 	= 	''.get_site_url().' - New Enquiry';
				$message 		= 	'
										<span style="width: 100px;">Nama    :</span> '.$enq_name.'<br />
										<span style="width: 100px;">Address :</span> '.$enq_address.'<br />
										<span style="width: 100px;">State 	:</span> '.$enq_state.'<br />
										<span style="width: 100px;">Email 	:</span> '.$enq_email.'<br />
										<span style="width: 100px;">Telp	:</span> '.$enq_tel_numb.'<br />
										<span style="width: 100px;">Fax		:</span> '.$enq_fax.'<br />
										<span style="width: 100px;">Comment	:</span> '.$enq_comment.'<br />
										<br /><br />
										'.$enq_cart.'
									';
				$headers 	 	= 	'from: admin@'.get_site_url().'';

				wp_mail( $to, $subject, $message, $headers );

				remove_filter( 'wp_mail_content_type', 'set_html_content_type' );

				$response = array(
	                "success" 	=> 	true
	            );
			break;


	}

	echo json_encode($response);
	exit;
}
