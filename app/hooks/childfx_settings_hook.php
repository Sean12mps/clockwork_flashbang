<?php 

add_filter( 'calibrefx_theme_settings_defaults', 'codename_theme_settings_default', $priority = 10, $accepted_args = 1 );
function codename_theme_settings_default($default_arr = array()){
    $codename_default=array(
    );

    return array_merge($default_arr, $codename_default);
}

add_action( 'calibrefx_theme_settings_meta_section', 'codename_meta_sections' );
function codename_meta_sections(){
    global $calibrefx_target_form;
    
    calibrefx_add_meta_section('pages', __('Pages Settings', 'calibrefx'), $calibrefx_target_form,10);
}

add_action( 'calibrefx_theme_settings_meta_box', 'codename_meta_boxes' );
function codename_meta_boxes(){
    global $calibrefx;
  
    calibrefx_add_meta_box('pages', 'basic', 'clockwork-pages-customization', __('Customization for pages', 'calibrefx'), 'clockwork_pages_customization', $calibrefx->theme_settings->pagehook, 'main', 'low');
    calibrefx_add_meta_box('social', 'basic', 'clockwork-social-customization', __('Customization for social', 'calibrefx'), 'clockwork_social_customization', $calibrefx->theme_settings->pagehook, 'main', 'low');
}

function clockwork_pages_customization(){
    wp_enqueue_style('childthemes-admin-bootstrap', CALIBREFX_CSS_URL . '/bootstrap.min.css');
    wp_enqueue_script('childthemes-admin-bootstrap', CALIBREFX_JS_URL . '/bootstrap.min.js');

    $crk_front_img_1    = esc_attr(calibrefx_get_option('crk_front_img_1'));
    $crk_front_img_1_i  = esc_attr(calibrefx_get_option('crk_front_img_1_i'));
    $crk_front_img_1_l  = esc_attr(calibrefx_get_option('crk_front_img_1_l'));

    $crk_front_img_2    = esc_attr(calibrefx_get_option('crk_front_img_2'));
    $crk_front_img_2_i  = esc_attr(calibrefx_get_option('crk_front_img_2_i'));
    $crk_front_img_2_l  = esc_attr(calibrefx_get_option('crk_front_img_2_l'));

    $crk_front_img_3    = esc_attr(calibrefx_get_option('crk_front_img_3'));
    $crk_front_img_3_i  = esc_attr(calibrefx_get_option('crk_front_img_3_i'));
    $crk_front_img_3_l  = esc_attr(calibrefx_get_option('crk_front_img_3_l'));

    $crk_front_img_4    = esc_attr(calibrefx_get_option('crk_front_img_4'));
    $crk_front_img_4_i  = esc_attr(calibrefx_get_option('crk_front_img_4_i'));
    $crk_front_img_4_l  = esc_attr(calibrefx_get_option('crk_front_img_4_l'));

     ?> 
        <hr class="div">
        <div class="controls">
        <h3>Home Page</h3>
            <div class="container-fluid">


                <div class="row">

                    <div class="col-md-6">

                        <hr class="div">
                        <div class="controls">
                            <div class="row-options">
                                <label for="link_1">Link 1</label><br />
                                <input type="text" name="calibrefx-settings[crk_front_img_1_l]" id="link_1" value="<?php echo $crk_front_img_1_l ?>" />
                                <p class="description">input category link here.</p>  
                            </div> 
                        </div>

                        <p><label for="crk_front_img_1"><strong>Image 1</strong></label></p>
                        <input type="text" name="calibrefx-settings[crk_front_img_1]" id="crk_front_img_1" value="<?php echo $crk_front_img_1; ?>" class="uploaded-input image_url" />
                        <input type="hidden" name="calibrefx-settings[crk_front_img_1_i]" class="image_id" value="<?php echo $crk_front_img_1_i; ?>" />
                        <div class="upload_button_div">
                            <span class="button image_upload_button image_upload" id="upload_custom_logo">Upload Image</span>
                            <span class="button image_reset_button hide image_reset" id="reset_custom_logo">Remove</span>
                            <div class="clear"></div>
                        </div>
                        <?php if(empty($crk_front_img_1)){ ?>
                        <div class="preview_image image_preview" id="preview_logo"></div>
                        <?php }else{ ?>
                         <div class="preview_image image_preview" id="preview_logo"><img src="<?php echo $crk_front_img_1; ?>" /></div>
                        <?php } ?>
                        <p class="description">Recommended image size ?? x ?? pixels</p>
                    </div>

                    <div class="col-md-6">
                        <hr class="div">
                        <div class="controls">
                            <div class="row-options">
                                <label for="link_2">Link 2</label><br />
                                <input type="text" name="calibrefx-settings[crk_front_img_2_l]" id="link_2" value="<?php echo $crk_front_img_2_l ?>" />
                                <p class="description">input category link here.</p>  
                            </div> 
                        </div>

                        <p><label for="crk_front_img_2"><strong>Image 2</strong></label></p>
                        <input type="text" name="calibrefx-settings[crk_front_img_2]" id="crk_front_img_2" value="<?php echo $crk_front_img_2; ?>" class="uploaded-input image_url" />
                        <input type="hidden" name="calibrefx-settings[crk_front_img_2_i]" class="image_id" value="<?php echo $crk_front_img_2_i; ?>" />
                        <div class="upload_button_div">
                            <span class="button image_upload_button image_upload" id="upload_custom_logo">Upload Image</span>
                            <span class="button image_reset_button hide image_reset" id="reset_custom_logo">Remove</span>
                            <div class="clear"></div>
                        </div>
                        <?php if(empty($crk_front_img_2)){ ?>
                        <div class="preview_image image_preview" id="preview_logo"></div>
                        <?php }else{ ?>
                         <div class="preview_image image_preview" id="preview_logo"><img src="<?php echo $crk_front_img_2; ?>" /></div>
                        <?php } ?>
                        <p class="description">Recommended image size ?? x ?? pixels</p>
                    </div>

                </div>


                <div class="row">

                    <div class="col-md-6">
                        <hr class="div">
                        <div class="controls">
                            <div class="row-options">
                                <label for="link_3">Link 3</label><br />
                                <input type="text" name="calibrefx-settings[crk_front_img_3_l]" id="link_3" value="<?php echo $crk_front_img_3_l ?>" />
                                <p class="description">input category link here.</p>  
                            </div> 
                        </div>

                        <p><label for="crk_front_img_3"><strong>Image 3</strong></label></p>
                        <input type="text" name="calibrefx-settings[crk_front_img_3]" id="crk_front_img_3" value="<?php echo $crk_front_img_3; ?>" class="uploaded-input image_url" />
                        <input type="hidden" name="calibrefx-settings[crk_front_img_3_i]" class="image_id" value="<?php echo $crk_front_img_3_i; ?>" />
                        <div class="upload_button_div">
                            <span class="button image_upload_button image_upload" id="upload_custom_logo">Upload Image</span>
                            <span class="button image_reset_button hide image_reset" id="reset_custom_logo">Remove</span>
                            <div class="clear"></div>
                        </div>
                        <?php if(empty($crk_front_img_3)){ ?>
                        <div class="preview_image image_preview" id="preview_logo"></div>
                        <?php }else{ ?>
                         <div class="preview_image image_preview" id="preview_logo"><img src="<?php echo $crk_front_img_3; ?>" /></div>
                        <?php } ?>
                        <p class="description">Recommended image size ?? x ?? pixels</p>
                    </div>

                    <div class="col-md-6">
                        <hr class="div">
                        <div class="controls">
                            <div class="row-options">
                                <label for="link_1">Link 4</label><br />
                                <input type="text" name="calibrefx-settings[crk_front_img_4_l]" id="link_4" value="<?php echo $crk_front_img_4_l ?>" />
                                <p class="description">input category link here.</p>  
                            </div> 
                        </div>
                        
                        <p><label for="crk_front_img_4"><strong>Image 4</strong></label></p>
                        <input type="text" name="calibrefx-settings[crk_front_img_4]" id="crk_front_img_4" value="<?php echo $crk_front_img_4; ?>" class="uploaded-input image_url" />
                        <input type="hidden" name="calibrefx-settings[crk_front_img_4_i]" class="image_id" value="<?php echo $crk_front_img_4_i; ?>" />
                        <div class="upload_button_div">
                            <span class="button image_upload_button image_upload" id="upload_custom_logo">Upload Image</span>
                            <span class="button image_reset_button hide image_reset" id="reset_custom_logo">Remove</span>
                            <div class="clear"></div>
                        </div>
                        <?php if(empty($crk_front_img_4)){ ?>
                        <div class="preview_image image_preview" id="preview_logo"></div>
                        <?php }else{ ?>
                         <div class="preview_image image_preview" id="preview_logo"><img src="<?php echo $crk_front_img_4; ?>" /></div>
                        <?php } ?>
                        <p class="description">Recommended image size ?? x ?? pixels</p>
                    </div>

                </div>


            </div>
        </div>
    <?php
}


function clockwork_social_customization(){
    
    $crk_contact_number    = esc_attr(calibrefx_get_option('crk_contact_number'));

     ?>
        <hr class="div">
        <div class="controls">
            <h3>Contact</h3>

            <div class="row-options">
                <label for="contact_no">Contact Number</label><br />
                <input type="text" name="calibrefx-settings[crk_contact_number]" id="contact_no" value="<?php echo $crk_contact_number ?>" />
                <p class="description">Please input contact number here.</p>  
            </div> 

        </div>
    <?php
}

//Below is the sample
/*
function codemaniac_custom_logo(){
    $logo = esc_attr(calibrefx_get_option('custom_logo'));
    $logo_id = esc_attr(calibrefx_get_option('custom_logo_id'));
?>
    <div class="controls">
        <p><label for="custom_logo"><strong>Custom Logo</strong></label></p>
        <input type="text" name="calibrefx-settings[custom_logo]" id="custom_logo" value="<?php echo $logo; ?>" class="uploaded-input image_url" />
        <input type="hidden" name="calibrefx-settings[custom_logo_id]" class="image_id" value="<?php echo $logo_id; ?>" />
        <div class="upload_button_div">
            <span class="button image_upload_button image_upload" id="upload_custom_logo">Upload Image</span>
            <span class="button image_reset_button hide image_reset" id="reset_custom_logo">Remove</span>
            <div class="clear"></div>
        </div>
        <?php if(empty($logo)){ ?>
        <div class="preview_image image_preview" id="preview_logo"></div>
        <?php }else{ ?>
         <div class="preview_image image_preview" id="preview_logo"><img src="<?php echo $logo; ?>" /></div>
        <?php } ?>
        <p class="description">Recommended image size <?php echo CHILD_LOGO_WIDTH; ?>x<?php echo CHILD_LOGO_HEIGHT; ?> pixels</p>
    </div>
<?php
}*/
