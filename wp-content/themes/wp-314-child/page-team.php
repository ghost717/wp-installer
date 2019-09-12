<?php 
/**
 * Template Name: Zespół
*/
get_header(); ?>

    <main class="main main__page">
        <?php get_template_part('section-top'); ?>

        <section class="main__team main__page__team">
            <div class="wrap content --relative">
                <?php while (have_posts()) : the_post(); ?>

                    <article>
                        <?php the_content(); ?>
                    </article>

                <?php endwhile; ?>

                <?php while(have_rows('gabinet')): the_row(); ?>
                    <div class="grid grid--3cols">
                        <?php while(have_rows('zespol')): the_row(); 
                            $post = get_sub_field('osoba'); setup_postdata( $post );
                            $thumb_id = get_post_thumbnail_id(); $thumb = wp_get_attachment_image_src($thumb_id,'team', true);
                        ?>

                                <div class="grid__item main__team__item">
                                    <div class="grid__item__thumb main__team__item__thumb">
                                        <?php if(has_post_thumbnail()): ?>
                                            <img src="<?php echo $thumb[0]; ?>" alt="<?php if($image['alt'] != ''): echo $image['alt']; else: the_title(); endif; ?>">
                                            <div class="bg" style="background-image: url(<?php echo $thumb[0]; ?>);"></div>
                                        <?php endif; ?>
                                    </div>
                                    <article>
                                        <h5><?php the_title(); ?></h5>
                                        <span class="desc"><?php the_field('stanowisko'); ?></span>
                                    </article>
                                </div>

                        <?php wp_reset_postdata(); endwhile; ?>
                    </div>
                <?php endwhile; ?>
            </div><!-- wrap -->    
        </section><!-- main__team -->
    </main>

<?php get_footer(); ?>

