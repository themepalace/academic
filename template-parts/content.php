<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Academic
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'os-animation' ); ?>>
	<?php  
	if ( has_post_thumbnail() ) :
		echo '<a class="post-thumbnail" href="' . esc_url( get_permalink() ) . '">';
		the_post_thumbnail( $size = 'large', array( 'alt' => get_the_title() ) );
		echo "</a>";
	endif;
	?>
	<header class="entry-header">
		<?php
		if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php academic_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php
		endif; 
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<p>
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
		</p>
		<div class="buttons">
			<?php  $options = academic_get_theme_options(); ?>
			<a href="<?php the_permalink(); ?>" class="btn btn-blue"><?php echo esc_html( $options['read_more_text'] ); ?></a>
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
