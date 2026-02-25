<?php
/**
 * functions.php — Young Boys WordPress Theme
 * Core theme setup, enqueue scripts/styles, custom functions.
 */

// ── 1. THEME SETUP ────────────────────────────────────────────
function youngboys_setup() {
    // Make theme available for translation
    load_theme_textdomain( 'youngboys', get_template_directory() . '/languages' );

    // Let WordPress manage the document title
    add_theme_support( 'title-tag' );

    // Enable featured images on posts/pages
    add_theme_support( 'post-thumbnails' );

    // Enable HTML5 markup for core elements
    add_theme_support( 'html5', [
        'search-form', 'comment-form', 'comment-list',
        'gallery', 'caption', 'style', 'script',
    ] );

    // Register navigation menus
    register_nav_menus( [
        'primary' => __( 'Primary Navigation', 'youngboys' ),
        'footer'  => __( 'Footer Navigation',  'youngboys' ),
    ] );
}
add_action( 'after_setup_theme', 'youngboys_setup' );


// ── 2. ENQUEUE STYLES & SCRIPTS ───────────────────────────────
function youngboys_enqueue_assets() {
    // Main stylesheet (style.css — also contains the theme header)
    wp_enqueue_style(
        'youngboys-style',
        get_stylesheet_uri(),
        [],
        '1.0.0'
    );

    // Main JavaScript file
    wp_enqueue_script(
        'youngboys-script',
        get_template_directory_uri() . '/assets/js/script.js',
        [],          // no dependencies
        '1.0.0',
        true         // load in footer
    );

    // Pass PHP data to JavaScript
    wp_localize_script( 'youngboys-script', 'youngboysData', [
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'youngboys_contact_nonce' ),
        'homeUrl' => home_url(),
    ] );

    // Comment reply script (only on singular pages with comments open)
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'youngboys_enqueue_assets' );


// ── 3. WIDGET AREAS / SIDEBARS ────────────────────────────────
function youngboys_widgets_init() {
    register_sidebar( [
        'name'          => __( 'Footer Widget Area', 'youngboys' ),
        'id'            => 'footer-widgets',
        'description'   => __( 'Add widgets here to appear in the footer.', 'youngboys' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-widget-title">',
        'after_title'   => '</h3>',
    ] );
}
add_action( 'widgets_init', 'youngboys_widgets_init' );


// ── 4. CONTACT FORM — AJAX HANDLER ───────────────────────────
/**
 * Handles the AJAX contact form submission.
 * Hooked to both logged-in and logged-out users.
 */
function youngboys_handle_contact_form() {
    // Verify nonce
    if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'youngboys_contact_nonce' ) ) {
        wp_send_json_error( [ 'message' => __( 'Security check failed. Please refresh the page and try again.', 'youngboys' ) ] );
    }

    // Collect & sanitize input
    $name    = isset( $_POST['contact_name'] )    ? sanitize_text_field( wp_unslash( $_POST['contact_name'] ) )    : '';
    $email   = isset( $_POST['contact_email'] )   ? sanitize_email( wp_unslash( $_POST['contact_email'] ) )         : '';
    $message = isset( $_POST['contact_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['contact_message'] ) ) : '';

    // Validate
    $errors = [];

    if ( strlen( $name ) < 2 ) {
        $errors['name'] = __( 'Please enter your full name.', 'youngboys' );
    }
    if ( ! is_email( $email ) ) {
        $errors['email'] = __( 'Please enter a valid email address.', 'youngboys' );
    }
    if ( strlen( $message ) < 10 ) {
        $errors['message'] = __( 'Your message must be at least 10 characters.', 'youngboys' );
    }

    if ( ! empty( $errors ) ) {
        wp_send_json_error( [ 'errors' => $errors ] );
    }

    // Send email
    $to      = get_option( 'admin_email' ); // uses your WordPress admin email
    $subject = sprintf( __( 'New Contact Message from %s', 'youngboys' ), $name );
    $body    = sprintf(
        "Name: %s\nEmail: %s\n\nMessage:\n%s",
        $name, $email, $message
    );
    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        sprintf( 'Reply-To: %s <%s>', $name, $email ),
    ];

    $sent = wp_mail( $to, $subject, $body, $headers );

    if ( $sent ) {
        wp_send_json_success( [ 'message' => __( 'Thank you! We will get back to you within 24–48 hours.', 'youngboys' ) ] );
    } else {
        wp_send_json_error( [ 'message' => __( 'Sorry, something went wrong. Please try again later.', 'youngboys' ) ] );
    }
}
add_action( 'wp_ajax_youngboys_contact',        'youngboys_handle_contact_form' );
add_action( 'wp_ajax_nopriv_youngboys_contact', 'youngboys_handle_contact_form' );


// ── 5. HELPER: STATS DATA ─────────────────────────────────────
function youngboys_get_stats() {
    return [
        [ 'number' => '500+', 'label' => __( 'Youth Empowered',      'youngboys' ) ],
        [ 'number' => '30+',  'label' => __( 'Projects Completed',   'youngboys' ) ],
        [ 'number' => '12',   'label' => __( 'Communities Reached',  'youngboys' ) ],
        [ 'number' => '8yrs', 'label' => __( 'Of Impact',            'youngboys' ) ],
    ];
}


// ── 6. HELPER: PROJECTS DATA ──────────────────────────────────
function youngboys_get_projects() {
    return [
        [
            'icon'        => '🌍',
            'category'    => __( 'Environment', 'youngboys' ),
            'title'       => __( 'Community Clean-Up Campaign', 'youngboys' ),
            'description' => __( 'Mobilizing hundreds of young volunteers to clean parks, rivers, and streets — fostering environmental responsibility and civic pride.', 'youngboys' ),
        ],
        [
            'icon'        => '🛠️',
            'category'    => __( 'Skills & Education', 'youngboys' ),
            'title'       => __( 'Youth Skill Development Workshop', 'youngboys' ),
            'description' => __( 'Free workshops in coding, digital literacy, entrepreneurship, and vocational skills — equipping youth for the jobs of tomorrow.', 'youngboys' ),
        ],
        [
            'icon'        => '🎁',
            'category'    => __( 'Charity', 'youngboys' ),
            'title'       => __( 'Charity & Donation Drive', 'youngboys' ),
            'description' => __( 'Annual drives collecting clothing, food, and school supplies for underprivileged families — teaching compassion through direct action.', 'youngboys' ),
        ],
    ];
}


// ── 7. HELPER: CORE VALUES ────────────────────────────────────
function youngboys_get_values() {
    return [
        '🏆 ' . __( 'Leadership',        'youngboys' ),
        '🤝 ' . __( 'Community Service', 'youngboys' ),
        '💡 ' . __( 'Youth Empowerment', 'youngboys' ),
        '🌱 ' . __( 'Growth Mindset',    'youngboys' ),
        '❤️ ' . __( 'Inclusion',          'youngboys' ),
        '🔥 ' . __( 'Passion',            'youngboys' ),
    ];
}


// ── 8. EXCERPT LENGTH ─────────────────────────────────────────
function youngboys_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'youngboys_excerpt_length' );


// ── 9. BODY CLASSES ───────────────────────────────────────────
function youngboys_body_classes( $classes ) {
    if ( is_front_page() ) {
        $classes[] = 'youngboys-front-page';
    }
    return $classes;
}
add_filter( 'body_class', 'youngboys_body_classes' );
