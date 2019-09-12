        <section class="main__top flex-center">
            <?php while (have_posts()) : the_post();
                    if(is_singular('post') || is_singular('zabieg')):
                        $thumb_id = get_post_thumbnail_id(88);
                    else:
                        $thumb_id = get_post_thumbnail_id();
                    endif; 
                    
                    $thumb = wp_get_attachment_image_src($thumb_id,'page', true);                                
            ?>
                <div class="bg" style="background-image: url(<?php echo $thumb[0]; ?>);"></div>
                
                <div class="wrap --relative">
                    <div class="post">

                        <div class="content --relative">
                            <h1><?php the_title(); ?></h1>
                            <?php if(get_field('subtitle')):
                                echo '<span>'.get_field('subtitle').'</span>';
                            endif; ?>
                        </div>

                    </div><!-- post -->
                </div>
            <?php endwhile; ?>
        </section>