<?php
/**
 * Outputs the content of the sidebar position
 */
function academic_sidebar_position_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'academic_nonce' );
    $stored_sidebar_position = get_post_meta( $post->ID, 'academic-sidebar-position', true );

    $sidebar_positions       = academic_sidebar_position();
    ?>

    <p>
     <label for="academic-sidebar-position" class="academic-row-title"><?php _e( 'Sidebar Position', 'academic' )?></label>
     <select name="academic-sidebar-position" id="academic-sidebar-position">
      <option value=""><?php _e( 'Default ( to customizer option )', 'academic' ); ?></option>

        <?php foreach ( $sidebar_positions as $sidebar_position => $value ) { ?>
         <option value="<?php echo esc_attr( $sidebar_position );?>" <?php if ( isset ( $stored_sidebar_position ) ) selected( $stored_sidebar_position, $sidebar_position ); ?>><?php echo esc_html( $value ); ?></option>
        <?php } ?>
     </select>
    </p>
    <?php
}


/**
 * Saves the sidebar position input
 */
function academic_sidebar_layout_save( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'academic_nonce' ] ) && wp_verify_nonce( $_POST[ 'academic_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
        return;
    }

    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'academic-sidebar-position' ] ) ) {
        update_post_meta( $post_id, 'academic-sidebar-position', esc_html( $_POST[ 'academic-sidebar-position' ] ) );
    }

}
add_action( 'save_post', 'academic_sidebar_layout_save' );