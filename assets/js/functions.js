jQuery(document).ready(function($){

	var childfx  = new ChildFx;

	/* 	GEARS
	 */ childfx.addGear({
			name  		: 'global_structure',
			locations 	: ['all'],
			func_names 	: ['headerArea','remove_slider','sidebarAndContentGrid','cookieCart']
		});
		childfx.addGear({
			name  		: 'front_page_custom',
			locations 	: ['home'],
			func_names 	: ['add_height_inner']
		});
		childfx.addGear({
			name  		: 'archive_furniture_custom',
			locations 	: ['post-type-archive-furniture'],
			func_names 	: ['remove_excerpt','wrap_cols','boxed-content','nav-format']
		});
		childfx.addGear({
			name  		: 'single_furniture_custom',
			locations 	: ['single-furniture'],
			func_names 	: ['carousel_control','cookieCart_input']
		});
		childfx.addGear({
			name  		: 'page_template_enquiry',
			locations 	: ['page-template-page-enquiry-php'],
			func_names 	: ['enquiry_cart_details']
		});




	/* 	FUNCTIONS
	 */ childfx.addFunctions({
			name 		: 'headerArea',
			selector 	: '#header',
			func 		: function(){

			}
		});

		childfx.addFunctions({
			name 		: 'sidebarAndContentGrid',
			selector 	: '#sidebar',
			func 		: function(){

				if( ! $( 'body' ).hasClass( 'home' ) ) {

					$( '#sidebar' ).attr( 'class', 'col-lg-3 col-md-3 col-sm-12 col-xs-12 sidebar widget-area' );
					$( '#content' ).attr( 'class', 'col-lg-9 col-md-9 col-sm-12 col-xs-12' );

					$( '#sidebar .clockwork_menu li' ).on( 'click', function() {

						var link = $( this ).find( 'a' ).attr( 'href' );

						window.location.href = link;
					} );
				}
			}
		});

		childfx.addFunctions({
			name 		: 'remove_slider',
			selector 	: '#footer',
			func 		: function(){
				$( '#footer' ).remove();
			}
		});

		childfx.addFunctions({
			name 		: 'add_height_inner',
			selector 	: '#inner',
			func 		: function(){

				$( '#inner' ).height( window.innerHeight / 1.5 );
			}
		});
		
		childfx.addFunctions({
			name 		: 'remove_excerpt',
			selector 	: '.entry-content p',
			func 		: function(){

				$( ''+selector+'' ).remove();
			}
		});

		childfx.addFunctions({
			name 		: 'boxed-content',
			selector 	: '.entry-content',
			func 		: function(){

				$( ''+selector+'' ).height( $( selector ).width() );
			}
		});

		childfx.addFunctions({
			name 		: 'nav-format',
			selector 	: '.pagination-container',
			func 		: function(){

				var pag = $( ''+selector+'' ).clone();

				$( ''+selector+'' ).addClass( 'col-xs-12' );

				$( ''+selector+'' ).addClass( 'pagination-bottom' );

				$( 'h1.page-title' ).append( '<span class="pagination-top"></span>' );

				$( 'h1.page-title .pagination-top' ).append( pag );

				$( 'h1.page-title .pagination-top' ).css({
					float: 'right',
					marginRight: '10px'
				});
			}
		});

		childfx.addFunctions({
			name 		: 'wrap_cols',
			selector 	: '#content',
			func 		: function(){

				var cols 	= $( selector ).find( '.furniture' ),
					i 		= 0,
					j 		= 0;
					k 		= 0;

				if( cols.length ){

					for( ; i < cols.length; i++ ){

						$( cols[i] ).addClass( 'part-'+j+'' );

						if( ( i + 1 ) % 4 == 0 ){

							j++;
						}
					}

					j++;

					for( ; j > 0; j-- ){
						
						$( selector ).find( '.part-'+k+'' ).wrapAll( '<div class="row" />' );

						k++;
					}
				}
			}
		});

		childfx.addFunctions({
			name 		: 'carousel_control',
			selector 	: '#carousel-furniture',
			func 		: function(){
				$( selector ).carousel({
					interval : false
				});
			}
		});


		childfx.addFunctions({
			name 		: 'cookieCart',
			selector 	: '#inner',
			func 		: function(){

				// 	DEPENDENCY jquery.cookie

				// 	Cookie Initialization
				$.cookie.path = '/';
				$.cookie.json = true;
				$.cookie.domain = clockwork_support.site_url;
				$.cookie.expires = 1;

				var cookie = $.cookie( 'furniture_enquiry' );
				if( cookie == undefined ){
					$.cookie( 'furniture_enquiry', { furniture_name: [], quantity: [], furniture_id: [] }, { path: '/', expires:1 } );
				}
			}
		});


		childfx.addFunctions({
			name 		: 'cookieCart_input',
			selector 	: '#cookieCart_input',
			func 		: function(){

				// 	DEPENDENCY jquery.cookie
				var enquiry_ui_input = function( inputName ){
					$( ''+inputName+'' ).keyup( function(){
						var that = this;
						var val = $( that ).val();
						this.value = this.value.replace(/[^0-9\.]/g,'');
					} );
				};
				var call_enquiry = function( target, button ){
					var enq = $.cookie( 'furniture_enquiry' );
					var check_enq = enq.furniture_name.length;
					if( check_enq == 0 ){
						$( target ).append('<p class="empty">enquiry is empty</p>');
						$( ''+button+'' ).hide();
					} else {
						var enq_q = enq.furniture_name.length;
						var enq_n = enq.furniture_name;
						var enq_i = enq.quantity;
		    			for( var i = 0; i < enq_q; i++ ){
							$( target ).append('<p><span class="nam">'+enq_n[i]+' </span><span class="qty">['+enq_i[i]+']</span></p>');
		    			}
					}
				};
				var enquiry_ui_submit = function( inputName, submitName, target, button ){
					$( ''+submitName+'' ).on( 'click', function(){
						var val = $( ''+inputName+'' ).val();
						if( val == '' ){
							val = 0;
						}
						if( val < 0 ){
							val = 0;
						}
						var nam = $( ''+submitName+'' ).attr( 'productname' );
						var pid = $( ''+submitName+'' ).attr( 'productid' );

						var objCookie = $.cookie( 'furniture_enquiry' );
						var objName = objCookie.furniture_name;
						var objQnty = objCookie.quantity;
						var objPid  = objCookie.furniture_id;
						var c_arr 	= jQuery.inArray( nam, objName );

						$( button ).show();
						$( target ).find( '.empty' ).remove();

						if( c_arr < 0 ){
							objName.push( nam );
							objQnty.push( val );
							objPid.push( pid );
							$.cookie( 'furniture_enquiry', { furniture_name: objName, quantity: objQnty, furniture_id: objPid }, { path: '/', expires:1 }  );
							$( target ).append('<p><span class="nam">'+nam+' </span><span class="qty">['+val+']</span></p>')
						} else {
							var was = objQnty[c_arr];
							var now = parseInt(was) + parseInt(val);
							objQnty[c_arr] = now;
							var list = $( target ).find( 'p' );
							for( var j = 0; j < list.length; j++ ){
								var check_name = $( list[j] ).find( '.nam' ).text();
								if( check_name.replace( /\s/g, "") === objName[c_arr].replace( /\s/g, "") ){
									$( list[j] ).find( '.qty' ).text( '['+now+']' );
								}
							}
							$.cookie( 'furniture_enquiry', { furniture_name: objName, quantity: objQnty, furniture_id: objPid }, { path: '/', expires:1 }  );
						}
						$( ''+inputName+'' ).val( '' );
					} );
				};	
				enquiry_ui_input( '#enquiry_ui_quantity' );
				call_enquiry( '#project-enquiry-list', '#enquiry-ui-send' );
				enquiry_ui_submit( '#enquiry_ui_quantity', '#enquiry_ui_submit', '#project-enquiry-list', '#enquiry-ui-send' );
			}
		});

		childfx.addFunctions({
			name 		: 'enquiry_cart_details',
			selector 	: '.enquiry-cart',
			func 		: function(){

				var enq_cart  		= $.cookie( 'furniture_enquiry' );
		 		var cart_i_name  	= enq_cart.furniture_name;
		 		var cart_i_qty  	= enq_cart.quantity;
		 		var cart_i_id  		= enq_cart.furniture_id;

		 		$.ajax({
	    			type: "POST",
	    			url: cfx_ajax.ajaxurl,
	    			data: {
	    				action: cfx_ajax.ajax_action, 
		                "do" : "init_widget_inquiry",
		                "data" : cart_i_id,
		                "_ajax_nonce" : cfx_ajax._ajax_nonce
	    			},
	    			success: function( resp ){
	    				var chkOut = $( '.enquiry-cart' );
	    				var chkOut_thmb = resp.product_thumbnail
	    				var chkOut_name = resp.product_name;
	    				var chkOut_slug = resp.product_slug;

	    				for( var k = 0; k < chkOut_name.length; k++ ){
	    					$( chkOut ).append( '<div class="col-md-2 cart-product-list"><div class="thumbnail">'+chkOut_thmb[k]+'</div><a target="_blank" href="'+clockwork_support.site_url+'/furniture/'+chkOut_slug[k]+'"><p>'+chkOut_name[k]+'</p></a><span class="qty">Quantity : ['+cart_i_qty[k]+'] </span><button class="btn btn-sm btn-danger delete-cart-item" cartitemid="'+cart_i_id[k]+'">Remove from enquiry</button></div>' );
	    					$( '#enquiry_cart' ).append( 'Item '+( k+1 )+' : ['+cart_i_qty[k]+'] '+chkOut_name[k]+'' );
	    				}

	    				$( '.delete-cart-item' ).on( 'click', function(){

				 			var that = this;
				 			var item_id = $( that ).attr( 'cartitemid' );

				 			var objCookie = $.cookie( 'furniture_enquiry' );
							var objName = objCookie.furniture_name;
							var objQnty = objCookie.quantity;
							var objPid  = objCookie.furniture_id;
							var c_arr 	= jQuery.inArray( item_id, objPid );

							console.log( objPid );
							// Find and remove item from an array
							// var i = array.indexOf("b");

							// if(i != -1) {
							objName.splice( c_arr, 1 );
							objQnty.splice( c_arr, 1 );
							objPid.splice( c_arr, 1 );
							// }
							$.cookie( 'furniture_enquiry', { furniture_name: objName, quantity: objQnty, furniture_id: objPid }, { path: '/', expires:1 } );
				 			
				 			window.location.replace( ''+clockwork_support.site_url+'/send-enquiry/' );
				 		} );

	    			}
	    		});


				$( '#submit_enq' ).on( 'click', function( e ){

					e.preventDefault();

					$.ajax({
		    			type: "POST",
		    			url: cfx_ajax.ajaxurl,
		    			data: {
		    				action 			: cfx_ajax.ajax_action, 
			                "do" 			: "send_widget_inquiry",
			                "enquiry_cart" 	: $( '#enquiry_cart' ).text(),
			                "name" 			: $( '.enquiry-form #name' ).val(),
			                "address" 		: $( '.enquiry-form #address' ).val(),
			                "state" 		: $( '.enquiry-form #state' ).val(),
			                "email" 		: $( '.enquiry-form #email' ).val(),
			                "tel_numb" 		: $( '.enquiry-form #tel_numb' ).val(),
			                "fax" 			: $( '.enquiry-form #fax' ).val(),
			                "comment" 		: $( '.enquiry-form #comment' ).val(),
			                "_ajax_nonce" 	: cfx_ajax._ajax_nonce
		    			},
		    			success: function(response){
		    				if( response.success ){

								$.cookie( 'furniture_enquiry', { furniture_name: [], quantity: [], furniture_id: [] }, { path: '/', expires:1 } );
		    					window.location.replace( ''+cfx_vars.site_url+'/send-enquiry/?resp_message=enquiry_sent' );
		    				}
		    			}
		    		});

				} );
			}
		});

	/* 	INITIALIZATIONS
	 */ childfx.engine( 'global_structure' );
	 	childfx.engine( 'front_page_custom' );
	 	childfx.engine( 'archive_furniture_custom' );
	 	childfx.engine( 'single_furniture_custom' );
	 	childfx.engine( 'page_template_enquiry' );


});

function check_focus(elm,val){
    if(elm.value.toLowerCase() == val.toLowerCase()){
        elm.value = '';    
    }
}

jQuery(window).on("load", function($) {

	jQuery(document).ready(function($){

	   	$( 'body' ).css({
	   		background: 'transparent'
	   	});

	   	$( '#wrapper' ).css({
	   		opacity: '1'
	   	});

	   	$( '#wrapper' ).addClass( 'animated' );

	   	$( '#wrapper' ).addClass( 'fadeIn' );
	});
});

function check_blur(elm,val){
    if(elm.value.toLowerCase() == ''){
        elm.value = val;    
    }
}