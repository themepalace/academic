<?php
/**
 * Outputs the content of the sidebar position
 */
function academic_header_image_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'academic_nonce' );
    $stored_header_image_option = get_post_meta( $post->ID, 'academic-header-image', true );

    $header_image_options       = academic_header_image();
    ?>

    <p>
     <label for="academic-header-image" class="academic-row-title"><?php _e( 'Header Image', 'academic' )?></label>
     <select name="academic-header-image" id="academic-header-image">
      <option value=""><?php _e( 'Default ( Customizer Header Image )', 'academic' ); ?></option>

        <?php foreach ( $header_image_options as $header_image_option => $value ) { ?>
         <option value="<?php echo esc_attr( $header_image_option );?>" <?php if ( isset ( $stored_header_image_option ) ) selected( $stored_header_image_option, $header_image_option ); ?>><?php echo esc_html( $value ); ?></option>
        <?php } ?>
     </select>
    </p>
    <?php
}


/**
 * Saves the sidebar position input
 */
function academic_sidebar_header_image_save( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'academic_nonce' ] ) && wp_verify_nonce( $_POST[ 'academic_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
        return;
    }

    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'academic-header-image' ] ) ) {
        update_post_meta( $post_id, 'academic-header-image', esc_html( $_POST[ 'academic-header-image' ] ) );
    }

}
add_action( 'save_post', 'academic_sidebar_header_image_save' );