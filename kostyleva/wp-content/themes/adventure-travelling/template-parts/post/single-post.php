<?php
/**
 * Template part for displaying posts
 *
 * @package Adventure Travelling
 * @subpackage adventure_travelling
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="box-info">
        <?php $adventure_travelling_blog_archive_ordering = get_theme_mod('blog_meta_order', array('date', 'author', 'comment', 'category'));
        foreach ($adventure_travelling_blog_archive_ordering as $adventure_travelling_blog_data_order) : 
            if ('date' === $adventure_travelling_blog_data_order) : ?>
                <i class="far fa-calendar-alt mb-1 me-2"></i><span class="entry-date me-3"><?php echo get_the_date('j F, Y'); ?></span>
            <?php elseif ('author' === $adventure_travelling_blog_data_order) : ?>
                <i class="fas fa-user mb-1 me-2"></i><span class="entry-author me-3"><?php the_author(); ?></span>
            <?php elseif ('comment' === $adventure_travelling_blog_data_order) : ?>
                <i class="fas fa-comments mb-1 me-2"></i><span class="entry-comments me-3"><?php comments_number(__('0 Comments', 'adventure-travelling'), __('0 Comments', 'adventure-travelling'), __('% Comments', 'adventure-travelling')); ?></span>
            <?php elseif ('category' === $adventure_travelling_blog_data_order) :?>
                <i class="fas fa-list mb-1 me-2"></i><span class="entry-category me-3"><?php adventure_travelling_display_post_category_count(); ?></span>
            <?php endif;
        endforeach; ?>
    </div>
    <hr>
    <div class="box-content">
        <?php the_content(); ?>
        <?php if(get_theme_mod('adventure_travelling_remove_tags',true) != ''){ 
            $tags = get_the_tags(); // Retrieve the post's tags
             custom_output_tags(); 
        }?>

        <?php if(get_theme_mod('adventure_travelling_remove_category',true) != ''){ 
            if(has_category()){ 
                echo '<div class="post_category mt-3"> Category: ';
                the_category(', ');
                echo '</div>';
            }
        }?>
        <?php if( get_theme_mod( 'adventure_travelling_remove_comment',true) != ''){ 
        // If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || '0' != get_comments_number() )
        comments_template();
        }

        if ( is_singular( 'attachment' ) ) {
            // Parent post navigation.
            the_post_navigation( array(
                'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'adventure-travelling' ),
            ) );
        } elseif ( is_singular( 'post' ) ) {
            // Previous/next post navigation.
            the_post_navigation( array(
                'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next:', 'adventure-travelling' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
                'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous:', 'adventure-travelling' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
            ) );
        } ?>
        <div class="clearfix"></div>
    </div>
      <div class="my-5"><?php get_template_part( 'template-parts/post/related-post'); ?></div>
</article>