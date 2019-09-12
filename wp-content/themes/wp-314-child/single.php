<?php get_header(); ?>

    <main class="main main__page">
        <?php get_template_part('section-top'); ?>

        <section class="main__single main__page__single">
            <div class="wrap content --relative">
                <?php while (have_posts()) : the_post();
                    $thumb_id = get_post_thumbnail_id(); $thumb = wp_get_attachment_image_src($thumb_id,'thumb1', true);    
                ?>

                    <?php if(is_singular('zabieg')): ?>

                        <div class="row post">
                            <div class="col-xs-12 col-sm-6">
                                <article class="post__content">
                                    <?php the_content(); ?>
                                </article>

                                <?php if(get_field('cennik')): ?>
                                    <ul class="main__price post__price">
                                        <h3>Cennik zabiegów</h3>
                                        <?php while(have_rows('cennik')): the_row(); ?>

                                            <li class="flex-center">
                                                <span class="u"><?php the_sub_field('text'); ?></span>
                                                <span class="p"><?php the_sub_field('cena'); ?></span>
                                            </li>

                                        <?php endwhile; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="post__thumb flex-center">
                                    <img src="<?php echo $thumb[0]; ?>" alt="<?php if($image['alt'] != ''): echo $image['alt']; else: bloginfo('title'); endif; ?>">
                                </div>

                                <?php if(get_field('lekarze')): ?>
                                    <div class="main__person">
                                        <div class="owl-carousel">
                                            <?php while(have_rows('lekarze')): the_row();
                                                    $post = get_sub_field('lekarz'); setup_postdata( $post );
                                                    $thumb_id = get_post_thumbnail_id(); $thumb = wp_get_attachment_image_src($thumb_id,'thumbOf', true);                                
                                            ?>
                                                <div class=" flex-center --gray">
                                                    <div class="col-xs-12 col-sm-5">
                                                        <div class="thumb">
                                                            <img src="<?php echo $thumb[0]; ?>" alt="<?php if($image['alt'] != ''): echo $image['alt']; else: bloginfo('title'); endif; ?>">
                                                            <div class="bg" style="background-image: url(<?php echo $thumb[0]; ?>)"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-7">
                                                        <article class="content">
                                                            <span>Lekarzem wykonującym zabieg jest</span>
                                                            <h4><?php the_title(); ?></h4>
                                                        </article>
                                                    </div>
                                                </div>
                                            <?php wp_reset_postdata(); endwhile; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="main__contact__form">
                                    <h3>Umów się!</h3>
                                    <?php the_field('formularz', 'option'); ?>
                                </div>
                            </div>
                        </div><!-- .row.post -->
                    <?php else: ?>

                        <div class="row post">
                            <div class="col-xs-12 col-sm-6">
                                <article class="post__content">
                                    <?php the_content(); ?>
                                </article>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <article class="post__thumb">
                                    <img src="<?php echo $thumb[0]; ?>" alt="<?php if($image['alt'] != ''): echo $image['alt']; else: bloginfo('title'); endif; ?>">
                                </article>
                            </div>
                        </div>

                    <?php endif; ?>

                <?php endwhile; ?>
            </div>
        </section><!-- main__page__about -->
    </main>

<?php get_footer(); ?>

