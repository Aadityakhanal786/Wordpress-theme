<?php
/**
 * front-page.php — Young Boys WordPress Theme
 *
 * This file is used when:
 *  - A static front page is set in Settings > Reading, OR
 *  - The site's home page is displayed.
 *
 * WordPress template hierarchy: front-page.php > home.php > index.php
 */

get_header();
?>

<!-- ===== HERO ===== -->
<section id="hero" aria-label="<?php esc_attr_e( 'Hero', 'youngboys' ); ?>">
  <div class="hero-inner">
    <span class="hero-tag"><?php esc_html_e( 'Non-Profit Organization', 'youngboys' ); ?></span>

    <h1>
      <?php esc_html_e( 'Young', 'youngboys' ); ?>
      <span><?php esc_html_e( 'Boys', 'youngboys' ); ?></span><br>
      <?php esc_html_e( 'Empowering Youth,', 'youngboys' ); ?><br>
      <?php esc_html_e( 'Building Future', 'youngboys' ); ?>
    </h1>

    <p>
      <?php esc_html_e( 'We are dedicated to nurturing the next generation of leaders — providing skills, opportunities, and a supportive community so every young person can thrive and contribute meaningfully to society.', 'youngboys' ); ?>
    </p>

    <div class="hero-buttons">
      <a href="#contact" class="btn btn-primary">
        <?php esc_html_e( 'Join Us Today', 'youngboys' ); ?>
      </a>
      <a href="#about" class="btn btn-outline">
        <?php esc_html_e( 'Learn More', 'youngboys' ); ?>
      </a>
    </div>
  </div>
</section>

<!-- ===== STATS BAR ===== -->
<div id="stats-bar" aria-label="<?php esc_attr_e( 'Impact Statistics', 'youngboys' ); ?>">
  <?php foreach ( youngboys_get_stats() as $stat ) : ?>
    <div class="stat-item">
      <div class="stat-number"><?php echo esc_html( $stat['number'] ); ?></div>
      <div class="stat-label"><?php echo esc_html( $stat['label'] ); ?></div>
    </div>
  <?php endforeach; ?>
</div>

<!-- ===== ABOUT ===== -->
<section id="about" aria-label="<?php esc_attr_e( 'About Us', 'youngboys' ); ?>">
  <div class="about-wrapper">

    <!-- Left: Text + Mission/Vision cards -->
    <div class="about-text">
      <span class="section-tag"><?php esc_html_e( '8+ Years of Impact', 'youngboys' ); ?></span>
      <h2 class="section-title"><?php esc_html_e( 'About Us', 'youngboys' ); ?></h2>
      <h3><?php esc_html_e( 'Who We Are', 'youngboys' ); ?></h3>
      <p>
        <?php esc_html_e( 'Young Boys is a youth-driven non-profit committed to creating safe, empowering spaces for young people aged 14–25. We believe every young person deserves the tools to reach their full potential — regardless of background, circumstance, or geography.', 'youngboys' ); ?>
      </p>

      <div class="about-cards">
        <div class="about-card">
          <h4>🎯 <?php esc_html_e( 'Our Mission', 'youngboys' ); ?></h4>
          <p><?php esc_html_e( 'To empower young people with leadership skills, education, and community support systems that create lasting change.', 'youngboys' ); ?></p>
        </div>
        <div class="about-card">
          <h4>🔭 <?php esc_html_e( 'Our Vision', 'youngboys' ); ?></h4>
          <p><?php esc_html_e( 'A world where every youth has equal access to opportunities, mentorship, and a voice in shaping their future.', 'youngboys' ); ?></p>
        </div>
      </div>
    </div>

    <!-- Right: Core Values -->
    <div class="values-section">
      <h4><?php esc_html_e( 'Our Core Values', 'youngboys' ); ?></h4>
      <div class="values-grid">
        <?php foreach ( youngboys_get_values() as $value ) : ?>
          <span class="value-tag"><?php echo esc_html( $value ); ?></span>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
</section>

<!-- ===== OUR WORK ===== -->
<section id="our-work" aria-label="<?php esc_attr_e( 'Our Work', 'youngboys' ); ?>">
  <div class="work-header">
    <span class="section-tag"><?php esc_html_e( 'Our Work', 'youngboys' ); ?></span>
    <h2 class="section-title"><?php esc_html_e( 'Projects That Create Impact', 'youngboys' ); ?></h2>
    <p><?php esc_html_e( 'From grassroots initiatives to skills-building programs, here\'s what we\'ve accomplished together.', 'youngboys' ); ?></p>
  </div>

  <div class="projects-grid">
    <?php foreach ( youngboys_get_projects() as $project ) : ?>
      <div class="project-card">
        <span class="project-icon"><?php echo esc_html( $project['icon'] ); ?></span>
        <div class="project-category"><?php echo esc_html( $project['category'] ); ?></div>
        <h3><?php echo esc_html( $project['title'] ); ?></h3>
        <p><?php echo esc_html( $project['description'] ); ?></p>
        <a href="#contact" class="btn-sm"><?php esc_html_e( 'Get Involved', 'youngboys' ); ?></a>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- ===== CONTACT ===== -->
<section id="contact" aria-label="<?php esc_attr_e( 'Contact Us', 'youngboys' ); ?>">
  <div class="contact-wrapper">

    <!-- Contact Info -->
    <div class="contact-info">
      <span class="section-tag"><?php esc_html_e( 'Get Involved', 'youngboys' ); ?></span>
      <h2><?php esc_html_e( 'Let\'s Build the Future Together', 'youngboys' ); ?></h2>
      <p><?php esc_html_e( 'Whether you want to volunteer, donate, partner, or simply learn more — we\'d love to hear from you. Every connection matters.', 'youngboys' ); ?></p>

      <div class="contact-details">
        <div class="contact-item">
          <div class="contact-icon">📍</div>
          <div>
            <strong><?php esc_html_e( 'Location', 'youngboys' ); ?></strong>
            <span><?php esc_html_e( 'Butwal,13 jitgadi', 'youngboys' ); ?></span>
          </div>
        </div>
        <div class="contact-item">
          <div class="contact-icon">✉️</div>
          <div>
            <strong><?php esc_html_e( 'Email Us', 'youngboys' ); ?></strong>
            <span><a href="mailto:heeloyoung@youngboys.org">heeloyoung@youngboys.org</a></span>
          </div>
        </div>
        <div class="contact-item">
          <div class="contact-icon">📞</div>
          <div>
            <strong><?php esc_html_e( 'Call Us', 'youngboys' ); ?></strong>
            <span><a href="tel:9845362712">9845362712</a> (YOUNG-BYS)</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Contact Form (submits via AJAX defined in script.js + functions.php) -->
    <div class="contact-form-wrapper">

      <!-- Success box (shown by JS after successful AJAX submit) -->
      <div class="success-box" id="successBox" role="alert" aria-live="polite">
        <div class="success-icon">🎉</div>
        <h3><?php esc_html_e( 'Message Received!', 'youngboys' ); ?></h3>
        <p><?php esc_html_e( 'Thank you for reaching out. Our team will get back to you within 24–48 hours.', 'youngboys' ); ?></p>
      </div>

      <form class="contact-form" id="contactForm" novalidate>

        <?php wp_nonce_field( 'youngboys_contact_nonce', 'youngboys_nonce' ); ?>

        <div class="form-group" id="fg-name">
          <label for="contactName"><?php esc_html_e( 'Full Name', 'youngboys' ); ?></label>
          <input
            type="text"
            id="contactName"
            name="contact_name"
            placeholder="<?php esc_attr_e( 'Your full name', 'youngboys' ); ?>"
            autocomplete="name"
          />
          <span class="error-msg"><?php esc_html_e( 'Please enter your name.', 'youngboys' ); ?></span>
        </div>

        <div class="form-group" id="fg-email">
          <label for="contactEmail"><?php esc_html_e( 'Email Address', 'youngboys' ); ?></label>
          <input
            type="email"
            id="contactEmail"
            name="contact_email"
            placeholder="<?php esc_attr_e( 'you@example.com', 'youngboys' ); ?>"
            autocomplete="email"
          />
          <span class="error-msg"><?php esc_html_e( 'Please enter a valid email address.', 'youngboys' ); ?></span>
        </div>

        <div class="form-group" id="fg-message">
          <label for="contactMessage"><?php esc_html_e( 'Your Message', 'youngboys' ); ?></label>
          <textarea
            id="contactMessage"
            name="contact_message"
            rows="5"
            placeholder="<?php esc_attr_e( 'Tell us how you\'d like to get involved...', 'youngboys' ); ?>"
          ></textarea>
          <span class="error-msg"><?php esc_html_e( 'Please write a message (at least 10 characters).', 'youngboys' ); ?></span>
        </div>

        <button type="submit" class="btn-submit">
          <?php esc_html_e( 'Send Message →', 'youngboys' ); ?>
        </button>

      </form>
    </div>

  </div>
</section>

<?php get_footer(); ?>
