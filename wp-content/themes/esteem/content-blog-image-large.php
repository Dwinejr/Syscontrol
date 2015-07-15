<?php
/**
 * The template used for displaying blog image large post.
 *
 * @package ThemeGrill
 * @subpackage Esteem
 * @since Esteem 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php do_action( 'esteem_before_post_content' ); ?>
	<?php
		if( has_post_thumbnail() ) {
			$image = '';
			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'blog-large');
     		$title_attribute = the_title_attribute( 'echo=0' );
     		$image .= '<figure class="post-featured-image">';
  			$image .= '<a href="' . get_permalink() . '" title="'.the_title_attribute( 'echo=0' ).'">';
  			$image .= get_the_post_thumbnail( $post->ID, 'blog-large', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ) ) ).'</a>';
  			$image .= '<div class="mask">
  						<div class="image-icon-wrap">
  							<a href="'.$large_image_url[0].'" class="img-icon img-search"><i class="icon-search"></i></a>
  							<a href="'.get_permalink().'" class="img-icon img-link"><i class="icon-link"></i></a>
  						</div>
  					</div>';
  			$image .= '</figure>';

  			echo $image;
  		}
	?>
	<div class="blog-content">
		<header class="entry-header">
			<h2 class="entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php the_title(); ?></a>
			</h2><!-- .entry-title -->
		</header>

		<div class="entry-meta-bar clearfix">
			<div class="entry-meta clearfix">
				<span class="icon-user vcard author"><a class="url fn n" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
				<span class="icon-time updated"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_time() ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a></span>
				<?php if( has_category() ) { ?>
       			<span class="icon-tag"><?php the_category(', '); ?></span>
       			<?php } ?>
				<?php if ( comments_open() ) { ?>
       			<span class="icon-comment-alt"><?php comments_popup_link( __( 'No Comments', 'esteem' ), __( '1 Comment', 'esteem' ), __( '% Comments', 'esteem' ), '', __( 'Comments Off', 'esteem' ) ); ?></span>
       			<?php } ?>
       			<?php edit_post_link( __( 'Edit', 'esteem' ), '<span class="icon-pencil">', '</span>' ); ?>
			</div><!-- .entry-meta -->
		</div><!-- .entry-meta-bar -->

		<div class="entry-content clearfix">
			<?php the_excerpt(); ?>
			<div class="readmore-wrap"><a class="readmore" href="<?php the_permalink(); ?>"><?php _e( 'Read more', 'esteem' ); ?></a></div>
		</div><!-- .entry-content -->
	</div>

	<?php do_action( 'esteem_after_post_content' ); ?>
</article>