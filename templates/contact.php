<?php
/**
 * @package   Rams Child
 * @author    Julien Liabeuf <julien@liabeuf.fr>
 * @license   GPL-2.0+
 * @link      https://julienliabeuf.com
 * @copyright 2016 Julien Liabeuf
 *
 * Template name: Contact
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

get_header(); ?>

	<div class="content">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div <?php post_class('post single'); ?>>

				<?php if ( has_post_thumbnail() ) : ?>

					<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail_size' ); $thumb_url = $thumb['0']; ?>

					<div class="featured-media">

						<?php the_post_thumbnail('post-image'); ?>

					</div> <!-- /featured-media -->

				<?php endif; ?>

				<div class="post-inner">

					<div class="post-header">

						<h1 class="post-title"><?php the_title(); ?></h1>

					</div> <!-- /post-header section -->

					<div class="post-content">

						<?php the_content(); ?>

						<form action="https://formspree.io/julien@liabeuf.fr" method="post">

							<p>
								<label for="name">Your Name</label>
								<input type="text" name="name" id="name" required>
							</p>

							<p>
								<label for="email">Your E-Mail</label>
								<input type="text" name="email" id="email" required>
							</p>

							<p>
								<label for="message">Your Message</label>
								<textarea name="message" id="message" required></textarea>
							</p>

							<input type="hidden" name="_next" value="/thank-you">
							<input type="hidden" name="_subject" value="New message from Julien's Guide">
							<input type="text" name="_gotcha" style="display:none">

							<p><input type="submit" value="Send"></p>
						</form>

						<?php wp_link_pages('before=<div class="clear"></div><p class="page-links">' . __('Pages:','rams') . ' &after=</p>&seperator= <span class="sep">/</span> '); ?>

					</div>

				</div> <!-- /post-inner -->

			</div> <!-- /post -->

			<?php if ( comments_open() ) : ?>

				<div class="comments-container">

					<?php comments_template( '', true ); ?>

				</div> <!-- /comments-container -->

			<?php endif; ?>

		<?php endwhile; else: ?>

			<p><?php _e("We couldn't find any posts that matched your query. Please try again.", "rams"); ?></p>

		<?php endif; ?>

		<div class="clear"></div>

	</div> <!-- /content -->

<?php get_footer(); ?>