<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Academic
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

if ( ! function_exists( 'academic_move_comment_field_to_bottom' ) ) {
	/**
	* move comment form to bottom
	*/
	function academic_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
	}
}
add_filter( 'comment_form_fields', 'academic_move_comment_field_to_bottom' );

$tp_fields = array(
	'submit_button' => '<input type="submit" class="submit" value="POST COMMENT">',
);
?>

<div id="comments" class="comments-area">
<section>
	<div class="standard-layout">
	    <div class="feedback-wrapper">
	       
		<?php // You can start editing here -- including this comment! ?>

		<?php if ( have_comments() ) : ?>
			 <header class="entry-header text-left">
			<h2 class="comments-title entry-title">
				<?php
					printf( // WPCS: XSS OK.
						esc_html( _nx( 'Feedback on &ldquo;%2$s&rdquo;', '%1$s Feedbacks on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'academic' ) ),
						number_format_i18n( get_comments_number() ), get_the_title()
					);
				?>
			</h2>
	       	</header>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'academic' ); ?></h2>
				<div class="nav-links">
					<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'academic' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'academic' ) ); ?></div>
				</div><!-- .nav-links -->
			</nav><!-- #comment-nav-above -->
			<?php endif; // Check for comment navigation. ?>
			<div class="entry-content">
				<ul>
	            <?php  
					wp_list_comments( array( 
						'callback' 		=> 'academic_comments_callback',
						'avatar_size'   => 90, 
						) );
	            ?>
	         	</ul>	
	        </div><!-- .entry-content -->
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'academic' ); ?></h2>
				<div class="nav-links">

					<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'academic' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'academic' ) ); ?></div>

				</div><!-- .nav-links -->
			</nav><!-- #comment-nav-below -->
			<?php endif; // Check for comment navigation. ?>

		<?php endif; // Check for have_comments(). ?>

		<?php
			// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'academic' ); ?></p>
		<?php endif; ?>

		<?php comment_form( $tp_fields ); ?>
		</div><!-- end .feedback-wrapper -->
	</div><!-- end .standard-layout -->
</section>
</div><!-- #comments -->

<?php
function academic_comments_callback( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
    <article id="comment-<?php comment_ID(); ?>" class="comment">

        <div class="feedback os-animation">
            <div class="user-image">
                <?php echo get_avatar( $comment ); ?>
            </div>
            <div class="comment">
                <div class="desc">
                    <h4><?php echo wp_trim_words( get_comment_text(), 5, '...' ); ?></h4>
                    <div class="entry-meta">
                        <ul>
                            <li>
                            	<i class="fa fa-calendar"></i>
			                    <?php
			                        printf( __( ' %1$s', 'academic' ), get_comment_date() ); 
		                        ?>
                            </li>
                            <li>
                            	<i class="fa fa-user"></i> <?php echo esc_attr( get_comment_author() ); ?>
                        	</li>
                        </ul>
                        <p><?php comment_text(); ?></p>
                        <p><?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'academic' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></p>
                    </div><!-- end .entry-meta -->
                </div><!-- end .desc -->
            </div><!-- end .comment -->
        </div><!-- end .feedback -->

    </article>
</li>
<?php
}
