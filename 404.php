<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Academic
 */

get_header(); ?>
<?php 
/**
 * academic_page_section hook
 *
 * @hooked academic_page_section -  10
 *
 */
do_action( 'academic_page_section' );?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title title-404" ><?php _e( '404', 'academic' ); ?></h1>
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'academic' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'academic' ); ?></p>

					<?php get_search_form();?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
/**
 * academic_page_section_end hook
 *
 * @hooked academic_page_section_end -  10
 *
 */
do_action( 'academic_page_section_end' );

get_footer();
