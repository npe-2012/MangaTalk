<?php
/**
 * The template used to display Tag Archive pages
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>


<div class="mainlist floatl floatparentfix clearfix">
	
	<header id="titlebar" class="page-header roboto">
		<h1 class="page-title"><a href="<?php echo home_url(); ?>">漫言首页 &raquo; </a><?php
			printf( __( '%s文集', 'twentyeleven' ), '<span>' . single_tag_title( '', false ) . '</span>' );
		?></h1>
		<?php
			$tag_description = tag_description();
			if ( ! empty( $tag_description ) )
				echo apply_filters( 'tag_archive_meta', '<div class="tag-archive-meta">' . $tag_description . '</div>' );
		?>
	</header><!-- #titlebar -->	
	
	<div class="mainlist-regular floatparentfix">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to overload this in a child theme then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 
					 get_template_part( 'content', get_post_format() );
					 
					 */
					get_template_part( 'mainlistpost' );
				?>
			<?php endwhile; ?>

			<?php twentyeleven_content_nav( 'nav-below' ); /* Display navigation to next/previous pages when applicable */?>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		<?php endif; ?>

			
	</div><!-- .mainlist-regular -->
</div><!-- .mainlist -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>