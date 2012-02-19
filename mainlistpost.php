<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
		
		<div class="mainlist-thumbnail floatl">

			<?php if ( has_post_thumbnail() ) :
					// $w = get_option('thumbnail_size_w') / 2;
					// $h = get_option('thumbnail_size_h') /2;
					the_post_thumbnail( thumbnail );
			 ?>
			<?php else : 
					echo'<img width="150" height="150" src="http://karu.me/wp-content/uploads/2011/06/20110101-003.jpg" class="attachment-thumbnail wp-post-image">';
			?>
			<?php endif; ?>
		</div><!-- .entry-thumbnail -->
		
		<?php wp_reset_query(); ?><!-- Reset query before invoking conditional tags. -->
		<?php if (is_home() || $_SERVER["REQUEST_URI"] == '/' || $_SERVER["REQUEST_URI"] == '/index.php') : ?>
		<div class="mainlist-content-home floatl">
		<?php else : ?>
		<div class="mainlist-content-regular floatl">
		<?php endif; ?>
		
			<span class="overlay"><!-- KM: for fading hover overlay --></span>
			<header class="entry-header">
			
				<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Click to Read %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h1><!-- .entry-title -->
				
				<h6 class="entry-define less-focus roboto">Written By <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php the_author() ?></a> on <?php echo get_the_date(); ?> <b class="red">+</b> <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Click to Read %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php comments_number( '<span class="red">0 notes</span>', '<span class="red">1 note</span>', '<span class="red">% notes</span>' ); ?><br /></a></h6>
				
			</header><!-- .entry-header -->

			<!-- KM: Consider clean this search part later. -->
			<div class="entry-summary">
				<?php if ($post->post_excerpt!==''): ?>
					<?php the_excerpt(); ?>
				<?php else : ?>
					<?php echo '<p>';
					echo mb_strimwidth(strip_tags($post->post_content),0,200,'......');
					// KM: If no excerpts specified, trim 200 words for default display.
					// KM: Below: Manually ouput "read more". Yeah I know, but I can take it. :/
					?>
					</p><div class="author-block"><a href="<?php the_permalink();?>">阅读全文 ｜ Read More</a></div>				
				<?php endif; ?>
			</div><!-- .entry-summary -->

		</div><!-- .mainlist-content -->
		
	</article><!-- #post-<?php the_ID(); ?> -->