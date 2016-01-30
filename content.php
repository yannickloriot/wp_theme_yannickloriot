<?php
/**
 * Template for displaying content. This is the
 * default content tempalte.
 *
 * @package Eighties
 * @author Justin Kopepasah
 * @since 1.0.0
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="entry-image">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail( 'main-featured' ); ?></a>
		</figure>
	<?php endif; ?><!-- .entry-image -->

	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		<p class="entry-meta entry-meta-time">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><i class="fa fa-clock-o updated"></i><time class="updated" datetime="<?php echo the_modified_time( 'Y-m-d H:i:s' ); ?>"><?php echo eighties_get_time_difference( get_the_date( 'Y-m-d H:i:s' ) ); ?></time></a>
			by
			<span class="vcard author">
				<span class="post-author author"><?php echo the_author_posts_link();?></span>
			</span>
		</p>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
