<?php 
/**
 * Template Name: Oferta
*/
get_header(); ?>

    <main class="main main__page">
        <?php get_template_part('section-top'); ?>

        <section class="main__offer main__page__offer">
            <div class="wrap content --relative">
                <?php while (have_posts()) : the_post(); ?>
                    
                    <?php while(have_rows('oferta')): the_row(); ?>

                        <div class="main__title">
                            <h2><?php the_sub_field('nazwa'); ?></h2>
                        </div>

                        <div class="grid">
                            <?php while(have_rows('zabiegi')): the_row();
                                    $post = get_sub_field('zabieg'); setup_postdata( $post );
                                    $thumb_id = get_post_thumbnail_id(); $thumb = wp_get_attachment_image_src($thumb_id,'thumbOf', true);                                
                            ?>

                                    <div class="grid__item">
                                        <div class="main__offer__item">
                                            <div class="post --relative">

                                                <div class="main__offer__item__thumb post__thumb flex-center --relative">
                                                    <img src="<?php echo $thumb[0]; ?>" alt="<?php echo $image['alt']; ?>">
                                                    <a href="<?php the_permalink(); ?>" class="bg">
                                                        <img src="<?php echo $thumb[0]; ?>" alt="<?php echo $image['alt']; ?>">
                                                    </a>
                                                </div>
                                                <a class="post__title" href="<?php the_permalink(); ?>">
                                                    <h4><?php the_title(); ?></h4>
                                                </a>

                                            </div>
                                        </div>
                                    </div>

                            <?php wp_reset_postdata(); endwhile; ?>
                        </div>
                    <?php endwhile; ?>

                <?php endwhile; ?>
            </div>
        </section><!-- main__page__offer -->
    </main>
    
<?php get_footer(); ?>

