<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Maggie Serino, Frontend and WordPress Developer. I develop high quality websites that are responsive, compatible with all the browsers, using the latest technologies such as HTML5, JavaScript, CSS3.">

    <title><?php echo bloginfo('name'); ?></title>
    <?php wp_head(); ?>
  </head>
  <body>

    <header class="header">
      <div class="container">
        <div class="row">
          <div class="col-12 header__column-container js-menu">
            <div class="header__title">
              <a href="#hero">
                <?php echo bloginfo('name'); ?>
              </a>
            </div>
            <div class="hamburger hamburger--squeeze js-hamburger">
              <div class="hamburger-box">
                <div class="hamburger-inner"></div>
              </div>
            </div>
            <!-- Header navigation -->
            <?php
              if(has_nav_menu('primary')) {
                wp_nav_menu(array(
                  'theme_location'          => 'primary',
                  'container'               => false,
                  'menu_class'              => 'header__list js-menu-list',
                  'fallback_cb'             => false,
                  'depth'                   => 4
                ));
              }
            ?>
          </div>
        </div>
      </div>
    </header>
