<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Academic
 */

get_header(); 

/**
 * academic_page_section hook
 *
 * @hooked academic_page_section -  10
 *
 */
do_action( 'academic_page_section' );
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'academic' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; 

		/**
		* Hook - academic_action_pagination.
		*
		* @hooked academic_default_pagination 
		* @hooked academic_numeric_pagination 
		*/
		do_action( 'academic_action_pagination' ); 
		?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
if ( academic_is_sidebar_enable() ) {
	get_sidebar();
}

/**
 * academic_page_section_end hook
 *
 * @hooked academic_page_section_end -  10
 *
 */
do_action( 'academic_page_section_end' );

get_footer();
