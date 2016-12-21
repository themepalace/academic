<?php
/**
 * About section
 *
 * This is the template for the content of about section
 *
 * @package Academic
 * @since Academic 0.3
 */
if ( ! function_exists( 'academic_add_about_section' ) ) :
  /**
   * Add about section
   *
   *@since Academic 0.3
   */
  function academic_add_about_section() {

    // Check if about is enabled on frontpage
    $about_enable = apply_filters( 'academic_section_status', true, 'about_section_enable' );
    if ( true !== $about_enable ) {
      return false;
    }

    // Get about section details
    $section_details = array();
    $section_details = apply_filters( 'academic_filter_about_section_details', $section_details );

    if ( empty( $section_details ) ) {
      return;
    }

    // Render about section now.
    academic_render_about_section( $section_details );
  }
endif;
add_action( 'academic_primary_content', 'academic_add_about_section', 60 );


if ( ! function_exists( 'academic_get_about_section_details' ) ) :
  /**
   * about section details.
   *
   * @since Academic 0.3
   * @param array $input about section details.
   */
  function academic_get_about_section_details( $input ) {
    $options = academic_get_theme_options();

    $content = array();
    $id = ! empty( $options['about_content_page'] ) ? $options['about_content_page'] : '';
    if( !empty ( $id ) ) {
        $args = array(
            'post_type'     => 'page',
            'page_id'       => absint( $id ),
        );
    }
    // Fetch posts.
    if ( ! empty( $args ) ) {
        $posts = get_posts( $args );
        foreach ( $posts as $key => $post ) {
            $page_id = $post->ID;
            $content[0]['sub_title']    = '';
            $content[0]['title']        = get_the_title( $page_id );
            $content[0]['excerpt']      = academic_trim_content( 100, $post );
            $content[0]['alt']          = get_the_title( $page_id );
            $content[0]['url']          = get_permalink( $page_id );
            $content[0]['btn_label']    = ! empty( $options['read_more_text'] ) ? $options['read_more_text'] : __( 'Read More', 'academic' );
            $content[0]['btn_target']   = '';
        }
    }

    if ( empty( $content[0][1]['statistics_title'] ) && empty( $content[0][1]['statistics_value'] ) ){
        $input = "";
    }

    if ( ! empty( $content ) ) {
      $input = $content;
    }
    return $input;
  }
endif;
// about section content details.
add_filter( 'academic_filter_about_section_details', 'academic_get_about_section_details' );


if ( ! function_exists( 'academic_render_about_section' ) ) :
  /**
   * Start about section 
   *
   * @return string about content
   * @since Academic 0.3
   *
   */
   function academic_render_about_section( $content_details = array() ) {
        $options          = academic_get_theme_options();
        
        if ( empty( $content_details ) ) {
          return;
        } ?>
        <section id="welcome-section" class="page-section one-col os-animation">
            <?php foreach ( $content_details as $content ): ?>
                <div class="container">
                    <div class="column-wrapper">
                        <header class="entry-header">
                            <?php if ( ! empty( $content['title'] ) ) : ?>
                                <h2 class="entry-title"><?php echo esc_html( $content['title'] ); ?></h2>  
                            <?php endif; 
                            if ( ! empty( $content['sub_title'] ) ) : ?>
                                <h6 class="entry-subtitle"><?php echo esc_html( $content['sub_title'] ); ?></h6>
                            <?php endif; ?>
                        </header><!-- end .entry-header -->

                        <div class="entry-content">
                            <?php if ( ! empty( $content['excerpt'] ) ) : ?>
                                <p><?php echo academic_santize_line_break( $content['excerpt'] ); ?></p>
                            <?php endif;
                             if ( ! empty( $content['url'] ) && ! empty( $content['btn_label'] ) ) : ?>
                                <div class="buttons">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>" href="<?php echo esc_attr( $content['btn_target'] ); ?>" class="btn btn-blue"><?php echo esc_html( $content['btn_label'] ); ?><i class="fa fa-angle-right"></i></a>
                                </div><!-- end .buttons -->
                            <?php endif; ?>
                        </div><!-- end .entry-content -->
                    </div><!-- end .column-wrapper -->
                </div><!-- end .container -->
            <?php endforeach; ?>
        </section><!-- end #welcome-section-->         
    <?php 
    }
endif;