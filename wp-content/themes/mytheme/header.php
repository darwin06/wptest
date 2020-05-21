<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <title>
    <?php
    if (function_exists('is_tag') && is_tag()) {
      echo 'Tag Archive for &quot;' . $tag . '&quot; - ';
    } elseif (is_archive()) {
      wp_title('');
      echo ' Archive - ';
    } elseif (is_search()) {
      echo 'Search for &quot;' . wp_specialchars($s) . '&quot; - ';
    } elseif (!(is_404()) && (is_single()) || (is_page())) {
      wp_title('');
      echo ' ';
    } elseif (is_404()) {
      echo 'Not Found - ';
    }
    bloginfo('name');
    ?>
  </title>
  <meta name="description" content="<?php if (is_single()) {
                                      single_post_title('', true);
                                    } else {
                                      bloginfo('name');
                                      echo " - ";
                                      bloginfo('description');
                                    } ?>" />
  <meta charset='UTF-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0' />

  <?php if (is_single() || is_page() || is_home()) { ?>
    <meta name="googlebot" content="index,noarchive,follow,noodp" />
    <meta name="robots" content="all,index,follow" />
    <meta name="msnbot" content="all,index,follow" />
  <?php } else { ?>
    <meta name="googlebot" content="noindex,noarchive,follow,noodp" />
    <meta name="robots" content="noindex,follow" />
    <meta name="msnbot" content="noindex,follow" />
  <?php } ?>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'mytheme'); ?></a>
  <header role="banner" aria-label="<?php _e('Main header', 'mytheme'); ?>">
    <div class="nav-header fixed-top bg-white box-shadow">
      <div class="container">
        <div class="row">
          <div class="w-100">
            <nav id="primary-nav" class="primary-nav navbar navbar-expand-md navbar-fixed-top" role="navigation" aria-label="<?php _e('Primary', 'mytheme'); ?>">
              <a class="navbar-brand" href="<?php echo get_site_url(); ?>">
                <?php
                if (has_custom_logo()) {
                  echo get_custom_logo();
                } else {
                ?>
                  <h2 class="h6 title text-center">
                    <?php
                    bloginfo('title');
                    ?>
                    <small>
                      <?php
                      bloginfo('description');
                      ?>
                    </small>
                  </h2>
                <?php
                }
                ?>
              </a>
              <!-- Brand and toggle get grouped for better mobile display -->
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
              </button>
              <?php
              wp_nav_menu(array(
                'theme_location'  => 'primary',
                'depth'            => 2, // 1 = no dropdowns, 2 = with dropdowns.
                'container'       => 'div',
                'container_class' => 'collapse navbar-collapse',
                'container_id'    => 'bs-example-navbar-collapse-1',
                'menu_class'      => 'navbar-nav ml-auto',
                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                'walker'          => new WP_Bootstrap_Navwalker(),
              ));
              ?>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>
