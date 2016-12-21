<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Academic
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
	// Check if customizer header image meta value is set to show both
	$header_image_meta = academic_header_image_meta_option();
	if ( is_array( $header_image_meta ) ) {
		$header_image_meta = $header_image_meta[1];
	} 
	if ( 'show-both' == $header_image_meta ) { ?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail();?>
		</div>
	<?php }	?>

	<header class="entry-header">
		<?php 
		if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php academic_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php 
		endif; 

		if ( ! $header_image_meta || ! get_header_image() ) :
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif; 
		endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'academic' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'academic' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php academic_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
