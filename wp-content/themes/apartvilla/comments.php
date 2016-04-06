<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>
<div itemscope itemtype="http://schema.org/Comment" id="comments" class="comment-box clearfix">
	<?php if ( have_comments() ) : ?>
		<h3><?php esc_html_e('Comments ', 'apartvilla');?><span><?php comments_number( '(0)', '(1)', '(%)' ); ?></span></h3>
		<p><?php esc_html_e('You are not signed in. ', 'apartvilla');?><a href="<?php echo esc_url(home_url('/')); ?>/wp-login.php" title="sign in"><?php esc_html_e('Sign in', 'apartvilla');?></a><?php esc_html_e(' to post comments.', 'apartvilla');?></p>
		
        <!-- comments -->
		<div class="comment-holder">
				<?php
					wp_list_comments( array(
						'style'       => 'ul',
						'short_ping'  => true,
						'avatar_size' => 74,
						'callback'=>'apartvilla_list_comments'
					) );
				?>
		</div>
		
		<?php
			
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="navigation comment-navigation" role="navigation">
			<h1 class="screen-reader-text section-heading"><?php esc_html_e( 'Comment navigation', 'apartvilla' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'apartvilla' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'apartvilla' ) ); ?></div>
		</nav><!-- .comment-navigation -->
		<?php endif; ?>
		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.' , 'apartvilla' ); ?></p>
		<?php endif; ?>
	<?php endif;  ?>
		<!-- Add Your Comments -->
       <div class="comment-form">
           
		   <!-- Heading -->
           <?php if ( comments_open()) : ?>
		    
			<h3><?php esc_html_e('Leave a Comment', 'apartvilla');?></h3>
			
		   <?php apartvilla_comment_form(); ?>
		   
		   <?php endif; ?>	
			
			
        </div>    
</div><!-- #comments -->
