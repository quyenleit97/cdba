<?php
/**
 * VCBA Enterprise Theme Functions
 * 
 * @package VCBA_Theme
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function vcba_theme_setup() {
    // Make theme available for translation
    load_theme_textdomain('vcba-theme', get_template_directory() . '/languages');
    
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');
    
    // Let WordPress manage the document title
    add_theme_support('title-tag');
    
    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');
    
    // Set default image sizes
    set_post_thumbnail_size(1200, 675, true);
    add_image_size('vcba-hero', 1400, 800, true);
    add_image_size('vcba-card', 400, 250, true);
    add_image_size('vcba-thumbnail', 300, 200, true);
    
    // Enable HTML5 markup
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    
    // Add theme support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ));
    
    // Add support for editor color palette
    add_theme_support('editor-color-palette', array(
        array(
            'name'  => esc_html__('Primary Blue', 'vcba-theme'),
            'slug'  => 'primary-blue',
            'color' => '#1E40AF',
        ),
        array(
            'name'  => esc_html__('Accent Cyan', 'vcba-theme'),
            'slug'  => 'accent-cyan',
            'color' => '#06B6D4',
        ),
        array(
            'name'  => esc_html__('Neutral Gray', 'vcba-theme'),
            'slug'  => 'neutral-gray',
            'color' => '#6B7280',
        ),
    ));
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'vcba-theme'),
        'footer'  => esc_html__('Footer Menu', 'vcba-theme'),
    ));
}
add_action('after_setup_theme', 'vcba_theme_setup');

/**
 * Enqueue styles and scripts
 */
function vcba_theme_scripts() {
    // Main stylesheet
    wp_enqueue_style('vcba-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Main JavaScript
    wp_enqueue_script('vcba-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);
    
    // Add thread comments reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    
    // Localize script for AJAX
    wp_localize_script('vcba-script', 'vcba_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('vcba_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'vcba_theme_scripts');

/**
 * Register widget areas
 */
function vcba_theme_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'vcba-theme'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'vcba-theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer 1', 'vcba-theme'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Footer widget area 1.', 'vcba-theme'),
        'before_widget' => '<section id="%1$s" class="widget footer-widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer 2', 'vcba-theme'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Footer widget area 2.', 'vcba-theme'),
        'before_widget' => '<section id="%1$s" class="widget footer-widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer 3', 'vcba-theme'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Footer widget area 3.', 'vcba-theme'),
        'before_widget' => '<section id="%1$s" class="widget footer-widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'vcba_theme_widgets_init');

/**
 * Custom Post Types
 */
function vcba_register_post_types() {
    // Business Members Post Type
    register_post_type('business_member', array(
        'labels' => array(
            'name'               => esc_html__('Business Members', 'vcba-theme'),
            'singular_name'      => esc_html__('Business Member', 'vcba-theme'),
            'menu_name'          => esc_html__('Members', 'vcba-theme'),
            'add_new'            => esc_html__('Add New Member', 'vcba-theme'),
            'add_new_item'       => esc_html__('Add New Business Member', 'vcba-theme'),
            'edit_item'          => esc_html__('Edit Business Member', 'vcba-theme'),
            'new_item'           => esc_html__('New Business Member', 'vcba-theme'),
            'view_item'          => esc_html__('View Business Member', 'vcba-theme'),
            'search_items'       => esc_html__('Search Business Members', 'vcba-theme'),
            'not_found'          => esc_html__('No business members found', 'vcba-theme'),
            'not_found_in_trash' => esc_html__('No business members found in trash', 'vcba-theme'),
        ),
        'public'        => true,
        'has_archive'   => true,
        'menu_icon'     => 'dashicons-groups',
        'supports'      => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'rewrite'       => array('slug' => 'members'),
        'show_in_rest'  => true,
    ));
    
    // Business Opportunities Post Type
    register_post_type('business_opportunity', array(
        'labels' => array(
            'name'               => esc_html__('Business Opportunities', 'vcba-theme'),
            'singular_name'      => esc_html__('Business Opportunity', 'vcba-theme'),
            'menu_name'          => esc_html__('Opportunities', 'vcba-theme'),
            'add_new'            => esc_html__('Add New Opportunity', 'vcba-theme'),
            'add_new_item'       => esc_html__('Add New Business Opportunity', 'vcba-theme'),
            'edit_item'          => esc_html__('Edit Business Opportunity', 'vcba-theme'),
            'new_item'           => esc_html__('New Business Opportunity', 'vcba-theme'),
            'view_item'          => esc_html__('View Business Opportunity', 'vcba-theme'),
            'search_items'       => esc_html__('Search Business Opportunities', 'vcba-theme'),
            'not_found'          => esc_html__('No business opportunities found', 'vcba-theme'),
            'not_found_in_trash' => esc_html__('No business opportunities found in trash', 'vcba-theme'),
        ),
        'public'        => true,
        'has_archive'   => true,
        'menu_icon'     => 'dashicons-businessman',
        'supports'      => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'rewrite'       => array('slug' => 'opportunities'),
        'show_in_rest'  => true,
    ));
}
add_action('init', 'vcba_register_post_types');

/**
 * Custom Meta Boxes
 */
function vcba_add_meta_boxes() {
    add_meta_box(
        'vcba_member_info',
        esc_html__('Member Information', 'vcba-theme'),
        'vcba_member_info_callback',
        'business_member',
        'normal',
        'high'
    );
    
    add_meta_box(
        'vcba_opportunity_info',
        esc_html__('Opportunity Details', 'vcba-theme'),
        'vcba_opportunity_info_callback',
        'business_opportunity',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'vcba_add_meta_boxes');

function vcba_member_info_callback($post) {
    wp_nonce_field('vcba_member_info', 'vcba_member_info_nonce');
    
    $company_name = get_post_meta($post->ID, '_company_name', true);
    $website = get_post_meta($post->ID, '_website', true);
    $phone = get_post_meta($post->ID, '_phone', true);
    $email = get_post_meta($post->ID, '_email', true);
    $business_type = get_post_meta($post->ID, '_business_type', true);
    ?>
    <table class="form-table">
        <tr>
            <th scope="row"><label for="company_name"><?php esc_html_e('Company Name', 'vcba-theme'); ?></label></th>
            <td><input type="text" id="company_name" name="company_name" value="<?php echo esc_attr($company_name); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="website"><?php esc_html_e('Website', 'vcba-theme'); ?></label></th>
            <td><input type="url" id="website" name="website" value="<?php echo esc_attr($website); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="phone"><?php esc_html_e('Phone', 'vcba-theme'); ?></label></th>
            <td><input type="tel" id="phone" name="phone" value="<?php echo esc_attr($phone); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="email"><?php esc_html_e('Email', 'vcba-theme'); ?></label></th>
            <td><input type="email" id="email" name="email" value="<?php echo esc_attr($email); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="business_type"><?php esc_html_e('Business Type', 'vcba-theme'); ?></label></th>
            <td>
                <select id="business_type" name="business_type">
                    <option value=""><?php esc_html_e('Select Business Type', 'vcba-theme'); ?></option>
                    <option value="manufacturing" <?php selected($business_type, 'manufacturing'); ?>><?php esc_html_e('Manufacturing', 'vcba-theme'); ?></option>
                    <option value="trading" <?php selected($business_type, 'trading'); ?>><?php esc_html_e('Trading', 'vcba-theme'); ?></option>
                    <option value="services" <?php selected($business_type, 'services'); ?>><?php esc_html_e('Services', 'vcba-theme'); ?></option>
                    <option value="agriculture" <?php selected($business_type, 'agriculture'); ?>><?php esc_html_e('Agriculture', 'vcba-theme'); ?></option>
                    <option value="technology" <?php selected($business_type, 'technology'); ?>><?php esc_html_e('Technology', 'vcba-theme'); ?></option>
                </select>
            </td>
        </tr>
    </table>
    <?php
}

function vcba_opportunity_info_callback($post) {
    wp_nonce_field('vcba_opportunity_info', 'vcba_opportunity_info_nonce');
    
    $investment_amount = get_post_meta($post->ID, '_investment_amount', true);
    $location = get_post_meta($post->ID, '_location', true);
    $contact_person = get_post_meta($post->ID, '_contact_person', true);
    $deadline = get_post_meta($post->ID, '_deadline', true);
    ?>
    <table class="form-table">
        <tr>
            <th scope="row"><label for="investment_amount"><?php esc_html_e('Investment Amount', 'vcba-theme'); ?></label></th>
            <td><input type="text" id="investment_amount" name="investment_amount" value="<?php echo esc_attr($investment_amount); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="location"><?php esc_html_e('Location', 'vcba-theme'); ?></label></th>
            <td><input type="text" id="location" name="location" value="<?php echo esc_attr($location); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="contact_person"><?php esc_html_e('Contact Person', 'vcba-theme'); ?></label></th>
            <td><input type="text" id="contact_person" name="contact_person" value="<?php echo esc_attr($contact_person); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="deadline"><?php esc_html_e('Deadline', 'vcba-theme'); ?></label></th>
            <td><input type="date" id="deadline" name="deadline" value="<?php echo esc_attr($deadline); ?>" class="regular-text" /></td>
        </tr>
    </table>
    <?php
}

/**
 * Save Meta Box Data
 */
function vcba_save_meta_boxes($post_id) {
    // Check if user has permissions to save data
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // Check if not an autosave
    if (wp_is_post_autosave($post_id)) {
        return;
    }
    
    // Check if not a revision
    if (wp_is_post_revision($post_id)) {
        return;
    }
    
    // Save member info
    if (isset($_POST['vcba_member_info_nonce']) && wp_verify_nonce($_POST['vcba_member_info_nonce'], 'vcba_member_info')) {
        $fields = array('company_name', 'website', 'phone', 'email', 'business_type');
        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
            }
        }
    }
    
    // Save opportunity info
    if (isset($_POST['vcba_opportunity_info_nonce']) && wp_verify_nonce($_POST['vcba_opportunity_info_nonce'], 'vcba_opportunity_info')) {
        $fields = array('investment_amount', 'location', 'contact_person', 'deadline');
        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
            }
        }
    }
}
add_action('save_post', 'vcba_save_meta_boxes');

/**
 * Customize excerpt length
 */
function vcba_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'vcba_excerpt_length');

/**
 * Customize excerpt more
 */
function vcba_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'vcba_excerpt_more');

/**
 * Custom pagination
 */
function vcba_pagination($query = null) {
    global $wp_query;
    
    if (!$query) {
        $query = $wp_query;
    }
    
    $big = 999999999;
    
    $paginate_links = paginate_links(array(
        'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format'    => '?paged=%#%',
        'current'   => max(1, get_query_var('paged')),
        'total'     => $query->max_num_pages,
        'prev_text' => esc_html__('« Previous', 'vcba-theme'),
        'next_text' => esc_html__('Next »', 'vcba-theme'),
        'type'      => 'array',
    ));
    
    if ($paginate_links) {
        echo '<nav class="pagination-wrapper" aria-label="' . esc_attr__('Page navigation', 'vcba-theme') . '">';
        echo '<div class="pagination-numbers">';
        foreach ($paginate_links as $link) {
            echo wp_kses_post($link);
        }
        echo '</div>';
        echo '</nav>';
    }
}

/**
 * Add theme customizer options
 */
function vcba_customize_register($wp_customize) {
    // Site Identity Section
    $wp_customize->add_section('vcba_site_identity', array(
        'title'    => esc_html__('VCBA Site Identity', 'vcba-theme'),
        'priority' => 30,
    ));
    
    // Hotline Setting
    $wp_customize->add_setting('vcba_hotline', array(
        'default'           => '+855 23 999 999',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('vcba_hotline', array(
        'label'   => esc_html__('Hotline Number', 'vcba-theme'),
        'section' => 'vcba_site_identity',
        'type'    => 'text',
    ));
    
    // Email Setting
    $wp_customize->add_setting('vcba_email', array(
        'default'           => 'info@vcba.biz',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('vcba_email', array(
        'label'   => esc_html__('Contact Email', 'vcba-theme'),
        'section' => 'vcba_site_identity',
        'type'    => 'email',
    ));
    
    // Address Setting
    $wp_customize->add_setting('vcba_address', array(
        'default'           => 'Phnom Penh, Cambodia',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('vcba_address', array(
        'label'   => esc_html__('Address', 'vcba-theme'),
        'section' => 'vcba_site_identity',
        'type'    => 'textarea',
    ));
}
add_action('customize_register', 'vcba_customize_register');
?> 