<!-- ===== SITE FOOTER ===== -->
<footer id="site-footer" role="contentinfo">

  <?php if ( is_active_sidebar( 'footer-widgets' ) ) : ?>
    <div class="footer-widgets-area">
      <?php dynamic_sidebar( 'footer-widgets' ); ?>
    </div>
  <?php endif; ?>

  <p>
    &copy; <?php echo esc_html( date( 'Y' ) ); ?>
    <strong><?php bloginfo( 'name' ); ?></strong>
    &mdash; <?php esc_html_e( 'Empowering Youth, Building Future', 'youngboys' ); ?>
  </p>

  <p style="margin-top:0.4rem;">
    <?php esc_html_e( 'Made with ❤️ for the next generation', 'youngboys' ); ?>
    &middot;
    <a href="#hero"><?php esc_html_e( 'Back to Top ↑', 'youngboys' ); ?></a>
  </p>

</footer><!-- #site-footer -->

<?php wp_footer(); // Required — loads scripts, plugin footers, etc. ?>

</body>
</html>
