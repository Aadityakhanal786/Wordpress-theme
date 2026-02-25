<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php bloginfo( 'description' ); ?>">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); // Required — loads styles, scripts, SEO plugins, etc. ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); // Required for plugins like cookie banners ?>

<!-- ===== SITE HEADER / NAVBAR ===== -->
<header id="site-header" role="banner">
  <div class="navbar-inner">

    <!-- Logo -->
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" rel="home">
      <?php
        $blog_name = get_bloginfo( 'name' );
        // Split "Young Boys" so "Boys" gets accent colour
        $parts = explode( ' ', $blog_name, 2 );
        echo esc_html( $parts[0] );
        if ( ! empty( $parts[1] ) ) {
            echo '<span>' . esc_html( $parts[1] ) . '</span>';
        }
      ?>
    </a>

    <!-- Primary Navigation (registered in functions.php) -->
    <nav id="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'youngboys' ); ?>">
      <?php
        wp_nav_menu( [
            'theme_location' => 'primary',
            'menu_id'        => 'primary-menu',
            'container'      => false,
            'fallback_cb'    => 'youngboys_fallback_menu',
        ] );
      ?>
    </nav>

    <!-- Hamburger (mobile) -->
    <button class="hamburger-btn" id="hamburgerBtn" aria-label="<?php esc_attr_e( 'Toggle Navigation', 'youngboys' ); ?>" aria-expanded="false" aria-controls="primary-navigation">
      <span></span>
      <span></span>
      <span></span>
    </button>

  </div><!-- .navbar-inner -->
</header><!-- #site-header -->

<?php
/**
 * Fallback menu when no menu is assigned in Appearance > Menus.
 * Shows links to Home, About, Our Work, Contact.
 */
function youngboys_fallback_menu() {
    echo '<ul id="primary-menu">';
    echo '<li><a href="' . esc_url( home_url( '/#home'    ) ) . '">' . esc_html__( 'Home',     'youngboys' ) . '</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/#about'   ) ) . '">' . esc_html__( 'About',    'youngboys' ) . '</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/#our-work') ) . '">' . esc_html__( 'Our Work', 'youngboys' ) . '</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/#contact' ) ) . '">' . esc_html__( 'Contact',  'youngboys' ) . '</a></li>';
    echo '</ul>';
}
