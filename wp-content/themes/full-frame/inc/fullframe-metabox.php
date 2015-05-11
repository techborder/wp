<?php
/**
 * The template for displaying meta box in page/post
 *
 * This adds Layout Options, Header Freatured Image Options, Single Page/Post Image Layout
 * This is only for the design purpose and not used to save any content
 *
 * @package Catch Themes
 * @subpackage Full Frame
 * @since Full Frame 1.0 
 */
 
 if ( ! defined( 'FULLFRAME_THEME_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}


/**
 * Add the Meta Box  
 * 
 * @uses add_meta_box
 * 
 * @action add_meta_boxes
 * 
 * @since  Fullframe 1.0
 */
function fullframe_add_custom_box() {
	add_meta_box(
		'fullframe-options',						//Unique ID
       __( 'Fullframe Options', 'fullframe' ),   	//Title
        'fullframe_meta_options',                  //Callback function
        'page'                                      //show metabox in page
    ); 
	add_meta_box(
		'fullframe-options',						//Unique ID
       __( 'Fullframe Options', 'fullframe' ),   	//Title
        'fullframe_meta_options',                  //Callback function
        'post'                                      //show metabox in post
    ); 	
}
add_action( 'add_meta_boxes', 'fullframe_add_custom_box' );

	
/**
 * Renders metabox to for sidebar layout
 *
 * @since  Fullframe 1.0
 */
function fullframe_meta_options() {
	global $post;

	$layout_options			= fullframe_metabox_layouts();
	$featured_image_options	= fullframe_metabox_featured_image_options();  
	$header_image_options 	= fullframe_metabox_header_featured_image_options();
	
    
    // Use nonce for verification  
    wp_nonce_field( basename( __FILE__ ), 'fullframe_custom_meta_box_nonce' );

    // Begin the field table and loop  ?>  
    <div id="fullframe-ui-tabs" class="ui-tabs">
	    <ul class="fullframe-ui-tabs-nav" id="fullframe-ui-tabs-nav">
	    	<li><a href="#frag1"><?php _e( 'Layout Options', 'fullframe' ); ?></a></li>
	    	<li><a href="#frag3"><?php _e( 'Header Featured Image Options', 'fullframe' ); ?></a></li>
	    	<li><a href="#frag4"><?php _e( 'Single Page/Post Image Layout ', 'fullframe' ); ?></a></li>
	    </ul> 
	    <div id="frag1" class="catch_ad_tabhead">
	    	<table id="layout-options" class="form-table" width="100%">
	            <tbody>
	                <tr>
	                    <select name="fullframe-layout-option" id="custom_element_grid_class">
	      					<?php  
		                    foreach ( $layout_options as $field ) {  
		                        $metalayout = get_post_meta( $post->ID, 'fullframe-layout-option', true );
		                        if( empty( $metalayout ) ){
		                            $metalayout='default';
		                        }
		                   	?>
		                   		<option value="<?php echo $field['value']; ?>" <?php selected( $metalayout, $field['value'] ); ?>><?php echo $field['label']; ?></option>
	    					<?php
	    					} // end foreach 
		                    ?>
	                    </select>
	                </tr>
	            </tbody>
	        </table>
	    </div>

	    <div id="frag3" class="catch_ad_tabhead">
	    	<table id="featuedimage-metabox" class="form-table" width="100%">
	            <tbody> 
	                <tr>                
	                    <?php  
	                    foreach ( $header_image_options as $field ) { 
						
						 	$metaheader = get_post_meta( $post->ID, $field['id'], true );
	                        
	                        if ( empty( $metaheader ) ){
	                            $metaheader='default';
	                        }
	                    ?>
	                        
	                        <td style="width: 100px;">
	                            <label class="description">
	                                <input type="radio" name="<?php echo $field['id']; ?>" value="<?php echo $field['value']; ?>" <?php checked( $field['value'], $metaheader ); ?>/>&nbsp;&nbsp;<?php echo $field['label']; ?>
	                            </label>
	                        </td>
	                        
	                    <?php
	                    } // end foreach 
	                    ?>
	                </tr>
	            </tbody>
	        </table>
	    </div>

	    <div id="frag4" class="catch_ad_tabhead">
	    	<table id="featuedimage-metabox" class="form-table" width="100%">
	            <tbody> 
	                <tr>
	                    <?php
	                    foreach ($featured_image_options as $field) { 
						
						 	$metaimage = get_post_meta( $post->ID, $field['id'], true );
	                        
	                        if (empty( $metaimage ) ){
	                            $metaimage='default';
	                        } 
	                    ?>
	                        <td style="width: 100px;">
	                            <label class="description">
	                                <input type="radio" name="<?php echo $field['id']; ?>" value="<?php echo $field['value']; ?>" <?php checked( $field['value'], $metaimage ); ?>/>&nbsp;&nbsp;<?php echo $field['label']; ?>
	                            </label>
	                        </td>
	                
	                    <?php
	                    } // end foreach 
	                    ?>
	                </tr>
	            </tbody>
	        </table> 
	    </div>
	</div>
<?php 
}


/**
 * save the custom metabox data
 * 
 * @action save_post
 *
 * @since  Fullframe 1.0
 */
function fullframe_save_custom_meta( $post_id ) { 
	global $post;

	$layout_options			= fullframe_metabox_layouts();
	$featured_image_options	= fullframe_metabox_featured_image_options();  
	$header_image_options 	= fullframe_metabox_header_featured_image_options();
	
	// Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'fullframe_custom_meta_box_nonce' ] ) || !wp_verify_nonce( $_POST[ 'fullframe_custom_meta_box_nonce' ], basename( __FILE__ ) ) )
        return;
		
	// Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
        return;
		
	if ('page' == $_POST['post_type']) {  
        if (!current_user_can( 'edit_page', $post_id ) )  
            return $post_id;  
    } elseif (!current_user_can( 'edit_post', $post_id ) ) {  
            return $post_id;  
    }  
	

	foreach ( $header_image_options as $field ) {  
		//Execute this saving function
		$old = get_post_meta( $post_id, $field['id'], true); 
		$new = sanitize_key( $_POST[$field['id']] );
		if ($new && $new != $old) {  
			update_post_meta($post_id, $field['id'], $new);  
		} elseif ('' == $new && $old) {  
			delete_post_meta($post_id, $field['id'], $old);  
		} 
	 } // end foreach 

	
	foreach ($layout_options as $field) {  
		//Execute this saving function
		$old = get_post_meta( $post_id, $field['id'], true); 
		$new = sanitize_key( $_POST[$field['id']] );
		if ($new && $new != $old) {  
			update_post_meta($post_id, $field['id'], $new);  
		} elseif ('' == $new && $old) {  
			delete_post_meta($post_id, $field['id'], $old);  
		} 
	 } // end foreach
	 
	foreach ( $featured_image_options as $field ) {  
		//Execute this saving function
		$old = get_post_meta( $post_id, $field['id'], true); 
		$new = sanitize_key( $_POST[$field['id']] );
		if ($new && $new != $old) {  
			update_post_meta($post_id, $field['id'], $new);  
		} elseif ('' == $new && $old) {  
			delete_post_meta($post_id, $field['id'], $old);  
		} 
	 } // end foreach 
	 
}
add_action('save_post', 'fullframe_save_custom_meta'); 