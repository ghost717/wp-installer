<?php 
/**
 * Template Name: Kontakt
*/
get_header(); ?>

    <main class="main main__page">
      <section class="main__page__contact">

        <div class="wrap content --relative">
            <?php while (have_posts()) : the_post(); ?>

                <!-- <?php /*while(have_rows('mapy')): the_row(); ?>
                
                    <?php $location = get_sub_field('mapa'); ?>
                    
                    <div class="acf_map">
                        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>" data-address="<?php echo $location['address']; ?>"></div>
                        <p class="address"><?php echo $location['address']; ?></p>
                    </div>
                    
                <?php endwhile; */ ?> -->

                <div class="acf__map">
                    <?php echo do_shortcode('[pimap]'); ?>
                </div>

                <span class="tel">
                    <a class="tel__primary" href="tel:<?php the_field('tel'); ?>"><?php the_field('tel'); ?></a>
                    <a class="tel__hover" href="#t">+71 344 ... (kliknij by zobaczyć)</a>
                </span>
                
            <?php endwhile; ?>
        </div>

      </section><!-- main__page__contact -->
    </main>

<?php get_footer(); ?>

