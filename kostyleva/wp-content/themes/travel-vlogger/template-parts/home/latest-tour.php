<?php
/**
 * Template part for displaying offer section
 *
 * @package Travel Vlogger
 * @subpackage travel_vlogger
 */
?>
<?php $travel_vlogger_static_image = get_template_directory_uri() . '/assets/images/sliderimage.png'; ?>
<?php if( get_theme_mod( 'travel_vlogger_offer_show_hide', true) != '') { ?>
<section id="travel-offer" class="py-5">
  <div class="container">
    <?php if( get_theme_mod('travel_vlogger_offer_section_tittle') != ''){ ?>
      <h2 class="my-3 text-center"><?php echo esc_html(get_theme_mod('travel_vlogger_offer_section_tittle','')); ?></h2>
    <?php }?>
    <?php if( get_theme_mod('travel_vlogger_offer_section_text') != ''){ ?>
      <p class="text-center"><?php echo esc_html(get_theme_mod('travel_vlogger_offer_section_text','')); ?></p>
    <?php }?>
    <div class="row mt-4">
      <?php 
        $travel_vlogger_post_category = get_theme_mod('travel_vlogger_offer_section_category');
        if($travel_vlogger_post_category){
          $travel_vlogger_page_query = new WP_Query(array( 'category_name' => esc_html( $travel_vlogger_post_category ,'travel-vlogger')));?>
          <?php while( $travel_vlogger_page_query->have_posts() ) : $travel_vlogger_page_query->the_post(); ?>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="cat-inner-box mb-3">
                <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php }else {echo ('<img src="'.$travel_vlogger_static_image .'">'); } ?>
                <div class="offer-box p-3">
                  <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-9 col-9 align-self-center">
                      <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                      <span class="entry-veiw me-3"><?php echo travel_vlogger_get_post_view(); ?></span>
                      <?php if(get_theme_mod('travel_vlogger_latest_remove_date',true) != ''){ ?>
                       <i class="fas fa-calendar me-2"></i><span class="entry-date"><?php echo get_the_date( 'j F, Y' ); ?></span>
                      <?php }?>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-3 align-self-center text-end">
                      <a href="<?php the_permalink(); ?>"><i class="fas fa-play"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endwhile;
          wp_reset_postdata();
        }
      ?>
    </div>
  </div>
</section> 
<?php }?>