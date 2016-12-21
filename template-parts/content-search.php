<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Academic
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php  
	if ( has_post_thumbnail() ) :
		the_post_thumbnail( $size = 'large', array( 'alt' => get_the_title() ) );
	endif;
	?>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php academic_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<p><?php the_excerpt(); ?></p>
		<div class="button">
			<?php  $options = academic_get_theme_options(); ?>
			<a href="<?php the_permalink(); ?>" class="btn btn-blue"><?php echo esc_html( $options['read_more_text'] ); ?></a>
		</div>
	</div><!-- .entry-summary -->

</article><!-- #post-## -->
