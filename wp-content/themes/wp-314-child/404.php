<?php get_header(); ?>

    <main class="main main__page">
        <?php get_template_part('section-top'); ?>

        <section class="main__page main__page__404">
            <div class="wrap content --relative">

                    <article>
                        <h2><?php _e( 'Nic nie znaleziono', 'webs' ); ?></h2>
                        <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentythirteen' ); ?></p>

                        <?php //get_search_form(); ?>
                    </article>

            </div><!-- wrap -->    
        </section><!-- main__page -->
    </main>

<?php get_footer(); ?>

