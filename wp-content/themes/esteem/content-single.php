<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package ThemeGrill
 * @subpackage Esteem
 * @since Esteem 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   <?php do_action( 'esteem_before_post_content' ); ?>
   <div class="entry-content clearfix">
      <?php
         the_content();

         $esteem_tag_list = get_the_tag_list( '', '&nbsp;&nbsp;&nbsp;&nbsp;', '' );
         if( !empty( $esteem_tag_list ) ) {
            ?>
            <div class="tags">
               <?php
               _e( 'Tagged on: ', 'esteem' ); echo $esteem_tag_list;
               ?>
            </div>
            <?php
         }

         wp_link_pages( array(
         'before'            => '<div style="clear: both;"></div><div class="pagination clearfix">'.__( 'Pages:', 'esteem' ),
         'after'             => '</div>',
         'link_before'       => '<span>',
         'link_after'        => '</span>'
      ) );
      ?>
   </div>
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
   <?php
   do_action( 'esteem_after_post_content' );
   ?>
</article>