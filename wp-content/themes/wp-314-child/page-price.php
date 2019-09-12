<?php 
/**
 * Template Name: Cennik
*/
get_header(); ?>

    <main class="main main__page">
        <?php get_template_part('section-top'); ?>

        <section class="main__price main__page__price">
            <div class="wrap content --relative">
                <?php while (have_posts()) : the_post(); ?>
                    
                    <?php while(have_rows('oferta')): the_row(); ?>

                        <div class="grid">
                            <?php while(have_rows('zabiegi')): the_row();
                                    $post = get_sub_field('zabieg'); setup_postdata( $post );
                                    $thumb_id = get_post_thumbnail_id(); $thumb = wp_get_attachment_image_src($thumb_id,'thumbOf', true);                                
                                
                                if(get_field('cennik')):
                            ?>

                                    <div class="grid__item grid__item--medium">
                                        <div class="main__price__item">
                                            <div class="post --relative">
                                                
                                                <div class="post__content">
                                                    <a class="post__title" href="<?php the_permalink(); ?>">
                                                        <h3><?php the_title(); ?></h3>
                                                    </a>

                                                    <ul class="main__price post__price">
                                                        <?php while(have_rows('cennik')): the_row(); ?>

                                                            <li class="flex-center">
                                                                <span class="u"><?php the_sub_field('text'); ?></span>
                                                                <span class="p"><?php the_sub_field('cena'); ?></span>
                                                            </li>

                                                        <?php endwhile; ?>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                            <?php endif; wp_reset_postdata(); endwhile; ?>
                        </div>
                    <?php endwhile; ?>

                <?php endwhile; ?>
            </div>
        </section><!-- main__page__offer -->
    </main>
    
<?php get_footer(); ?>

