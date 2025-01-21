<?php
/**
 * The template for displaying all pages
 *
 * @package Adventure Travelling
 * @subpackage adventure_travelling
 */

get_header(); ?>

<?php $adventure_travelling_static_image = get_template_directory_uri() . '/assets/images/sliderimage.png'; ?>
	<?php while ( have_posts() ) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" class="external-div">
		        <div class="box-image">
		          	<?php if(has_post_thumbnail()){ 
		            	the_post_thumbnail();
			        }else { ?>
			            <img src="<?php echo esc_url($adventure_travelling_static_image); ?>">
			        <?php } ?>
		        </div> 
		        <div class="box-text">
		        	<h2><?php the_title();?></h2>  
		        </div> 
			</div>
		<?php endwhile; ?>

	<main id="tp_content" role="main">
		<div class="container">
			<div id="primary" class="content-area">
				<?php $adventure_travelling_sidebar_layout = get_theme_mod( 'adventure_travelling_sidebar_page_layout','right');
			    if($adventure_travelling_sidebar_layout == 'left'){ ?>
			        <div class="row">
			          	<div class="col-md-4 col-sm-4" id="theme-sidebar"><?php dynamic_sidebar('sidebar-2');?></div>
			          	<div class="col-md-8 col-sm-8 left-sidebar">
			           		<?php while ( have_posts() ) : the_post();

								the_content();

								wp_link_pages( array(
									'before' => '<div class="page-links">' . __( 'Pages:', 'adventure-travelling' ),
									'after'  => '</div>',
								) );
								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

								endwhile; // End of the loop.
							?>
			          	</div>
			        </div>
			        <div class="clearfix"></div>
			    <?php }else if($adventure_travelling_sidebar_layout == 'right'){ ?>
			        <div class="row">
			          	<div class="col-md-8 col-sm-8 right-sidebar">
				            <?php while ( have_posts() ) : the_post();

								the_content();

								wp_link_pages( array(
									'before' => '<div class="page-links">' . __( 'Pages:', 'adventure-travelling' ),
									'after'  => '</div>',
								) );
								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

								endwhile; // End of the loop.
							?>
			          	</div>
			          	<div class="col-md-4 col-sm-4" id="theme-sidebar"><?php dynamic_sidebar('sidebar-2');?></div>
			        </div>
			    <?php }else if($adventure_travelling_sidebar_layout == 'full'){ ?>
			        <div class="full">
			            <?php while ( have_posts() ) : the_post();

							the_content();

								wp_link_pages( array(
									'before' => '<div class="page-links">' . __( 'Pages:', 'adventure-travelling' ),
									'after'  => '</div>',
								) );
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

							endwhile; // End of the loop.
						?>
			      	</div>
				<?php }?>
			</div>
	    </div>
	</main>


<?php get_footer();