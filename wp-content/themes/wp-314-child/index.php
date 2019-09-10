<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php echo (get_field('header_text', 'option')) ? get_field('header_text', 'option') : ''; ?>

    <!-- encoding -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- For IE 9 and below. ICO should be 32x32 pixels in size -->
    <!--[if IE]><link rel="shortcut icon" href="path/to/favicon.ico"><![endif]-->
    <!-- Touch Icons - iOS and Android 2.1+ 180x180 pixels in size. --> 
    <link rel="apple-touch-icon-precomposed" href="<?php asset('img/fav.png'); ?>">
    <!-- Firefox, Chrome, Safari, IE 11+ and Opera. 196x196 pixels in size. -->
    <link rel="icon" href="<?php asset('img/fav.png'); ?>">

    <!-- info / SEO -->
    <title><?php echo (get_field('title', 'option')) ? get_field('title', 'option') : bloginfo('title').' '.wp_title(); ?></title>

    <!-- livereload -->
    <?php if (strpos(get_home_url(), 'localhost') == true) : ?>
        <script>
            document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')
        </script>
    <?php endif; ?>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php echo (get_field('body_text', 'option')) ? get_field('body_text', 'option') : ''; ?>

    <div id="loader" class="flex-center">
        <img src="<?php asset('img/logo.png'); ?>" alt="<?php bloginfo('title'); ?>">
    </div>

    <header class="header">
        <div class="header__top">
            <div class="wrap">

                <div class="grid">
                    <div class="grid__item">
                        <?php the_field('adres', 'option'); ?>
                    </div>
                    <div class="grid__item">
                        <?php the_field('godzina', 'option'); ?>
                    </div>
                    <div class="grid__item">
                        <?php the_field('tel', 'option'); ?>
                        <?php the_field('email', 'option'); ?>
                    </div>
                    <div class="grid__item">
                        <a href="<?php echo '?form=reservation'; ?>" class="more --getForm">Umów się</a>
                    </div>
                </div>

            </div>
        </div><!-- header__top -->

        <div class="header__bar flex-center">
            <div class="wrap">
                
                <a class="header__branding" href="<?php echo get_home_url(); ?>" aria-label="logo">
                    <img class="header__logo" src="<?php $image = get_field('logo', 'option'); echo $thumb = $image['url']; ?>" alt="<?php if($image['alt'] != ''): echo $image['alt']; else: bloginfo('title'); endif; ?>">
                </a><!--header__logo-->

                <nav class="header__nav" role="navigation">
                    <?php wp_nav_menu(array('theme_location' => 'primary-menu')); ?>
                </nav><!--header__nav-->

                <div class="header__mobile">
                    <nav role="navigation">
                        <div id="menuToggle">
                            <input type="checkbox" />
                            <span></span>
                            <span></span>
                            <span></span>
                            
                            <ul id="menu">
                                <a class="mobile__branding" href="<?php echo get_home_url(); ?>" aria-label="logo">
                                    <img class="mobile__logo" src="<?php $image = get_field('logo', 'option'); echo $thumb = $image['url']; ?>" alt="<?php if($image['alt'] != ''): echo $image['alt']; else: bloginfo('title'); endif; ?>">
                                </a>

                                <?php wp_nav_menu(array('theme_location' => 'primary-menu')); ?>
                            </ul>
                        </div>
                    </nav>
                </div><!--header__mobile-->

            </div>
        </div><!-- header__bar -->
    </header>

    <main class="main">

    </main>

    <footer class="footer">
        <div class="wrap content">

        </div>
        
        <div class="footer__copy">
          Projekt i wykonanie <a href="http://stomatologia.314.pl/" target="_blank" aria-label="Stomatologia 314.pl">Stomatologia 314.pl</a>
        </div>
    </footer>

    <div id="ajax"></div>
    
    <?php $tab = $_GET['form']; if($_GET['form'] == 'reservation'): ?>
        <section class="modal__form flex-center <?php if(isset($tab)): echo 'lightbox active'; endif; ?>">
            <div class="wrap content --relative">
                <a href="#" id="exit" aria-label="exit">X</a>
                <div class="main__title"><h3>Umów wizytę</h3></div>
                <img src="<?php asset('img/separator.png'); ?>" class="modal__form__sep" alt="<?php bloginfo('title'); ?>">
                <?php echo (get_field('umow_wizyte', 'option')) ? get_field('umow_wizyte', 'option') : get_field('formularz', 'option'); ?>
            </div>
        </section>
    <?php endif; ?>
    
    <?php //if(get_field('cookies', 'option')): ?>
        <div style="display:none" id="cookies">
            <div class="wrap">
        
                <?php echo (get_field('cookies', 'option')) ? get_field('cookies', 'option') : "Serwis wykorzystuje pliki cookies. Korzystając ze strony wyrażasz zgodę na wykorzystywanie plików cookies."; ?>
                <div id="exit">OK</div>
                
            </div>
        </div>
    <?php //endif; ?>
    
    <?php echo (get_field('footer_text', 'option')) ? get_field('footer_text', 'option') : ''; ?>
    <?php get_template_part('no-script'); ?>

    <?php wp_footer(); ?>
</body>
</html>