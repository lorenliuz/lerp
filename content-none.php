<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package lerp
 */

?>

<div class="row-container">
	<section class="no-results not-found row row-parent limit-width no-top-padding no-bottom-padding no-h-padding">
		<div class="page-header">
			<h1 class="post-title"><?php esc_html_e( 'Nothing Found', 'lerp' ); ?></h1>
		</div><!-- .page-header -->

		<div class="page-content">
			<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

				<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'lerp' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

			<?php elseif ( is_search() ) : ?>

				<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'lerp' ); ?></p>
				<?php get_search_form(); ?>

			<?php else : ?>

				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'lerp' ); ?></p>
				<?php get_search_form(); ?>

			<?php endif; ?>
		</div><!-- .page-content -->
	</section><!-- .no-results -->
</div>