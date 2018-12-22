<!DOCTYPE html>
<html <?php language_attributes(); ?>>

  <head>
    <!-- encoding -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- info / SEO -->
    <title><?php echo (get_field('title', 'option')) ? get_field('title', 'option') : bloginfo('title').' '.wp_title();; ?></title>
    <meta name="description" content="<?php echo (get_field('title', 'option')) ? get_field('description', 'option') : get_bloginfo('description'); ?>">
    
    <!-- fonts -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <?php get_template_part('no-script'); ?>

    <header class="header">
      <div class="wrap">

        <a class="header__branding" href="<?php echo get_home_url(); ?>">
          <img src="<?php asset('images/logo.svg') ?>" alt="">
        </a>

        <nav class="header__nav" role="navigation">
          <?php wp_nav_menu(array('theme_location' => 'primary-menu')); ?>

          <button class="header__nav__button menu__toggle">
            <span class="menu__line"></span>
            <span class="menu__line"></span>
            <span class="menu__line"></span>
          </button>
        </nav>

      </div>
    </header>

    <main class="main">

    </main>

    <footer class="footer">
        <div class="wrap content">

        </div>
    </footer>

    <?php wp_footer(); ?>
  </body>
</html>