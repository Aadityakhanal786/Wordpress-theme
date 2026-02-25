<?php
/**
 * index.php — Young Boys WordPress Theme
 *
 * This is the ultimate fallback template required by WordPress.
 * For the actual homepage, front-page.php is used.
 * This file handles the blog posts loop if ever needed.
 */

get_header();
?>

<main id="main-content" role="main">
  <div style="max-width:900px; margin: 6rem auto 4rem; padding: 0 5%;">

    <?php if ( have_posts() ) : ?>

      <h1 class="section-title" style="margin-bottom:2rem;">
        <?php
          if ( is_home() && ! is_front_page() ) {
              single_post_title();
          } else {
              esc_html_e( 'Latest Posts', 'youngboys' );
          }
        ?>
      </h1>

      <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'project-card' ); ?> style="margin-bottom:2rem;">
          <h2 style="font-size:1.3rem; margin-bottom:0.5rem;">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </h2>
          <p style="font-size:0.85rem; color:var(--text-muted); margin-bottom:1rem;">
            <?php echo esc_html( get_the_date() ); ?>
          </p>
          <div><?php the_excerpt(); ?></div>
          <a href="<?php the_permalink(); ?>" class="btn-sm" style="margin-top:1rem; display:inline-block;">
            <?php esc_html_e( 'Read More', 'youngboys' ); ?>
          </a>
        </article>
      <?php endwhile; ?>

      <?php the_posts_navigation(); ?>

    <?php else : ?>

      <p style="color:var(--text-muted); font-size:1.1rem;">
        <?php esc_html_e( 'No posts found.', 'youngboys' ); ?>
      </p>

    <?php endif; ?>

  </div>
</main>

<?php get_footer(); ?>
