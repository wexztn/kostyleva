<?php
/**
 * Template part for displaying offer section
 *
 * @package Travel Vlogger
 * @subpackage travel_vlogger
 */
?>
<?php $travel_vlogger_static_image= get_template_directory_uri() . '/assets/images/sliderimage.png'; ?>
<?php if( get_theme_mod( 'travel_vlogger_slider_show_hide', true) != '') { ?>
<section id="slider-post">
  <div class="owl-carousel">
    <?php
      $travel_vlogger_post_slider_category = get_theme_mod('travel_vlogger_slider_section_category');
      if($travel_vlogger_post_slider_category){
        $travel_vlogger_page_query = new WP_Query(array( 'category_name' => esc_html( $travel_vlogger_post_slider_category ,'travel-vlogger')));?>
        <?php while( $travel_vlogger_page_query->have_posts() ) : $travel_vlogger_page_query->the_post(); ?>
          <div class="slider-inner-box">
            <?php if(has_post_thumbnail()){ ?> <img src="<?php the_post_thumbnail_url('full'); ?>"/> <?php }else {echo ('<img src="'.$travel_vlogger_static_image.'">'); } ?>
            <div class="slider-content-box p-3">
              <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
               <?php if(get_theme_mod('travel_vlogger_slider_remove_date',true) != ''){ ?>
                  <i class="fas fa-calendar me-2"></i><span class="entry-date"><?php echo get_the_date( 'j F, Y' ); ?></span>
              <?php }?>
            </div>
          </div>
        <?php endwhile;
        wp_reset_postdata();
      }
    ?>
  </div>
</section> 
<?php }?>