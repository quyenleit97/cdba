<?php
/**
 * The header for VCBA theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package VCBA_Theme
 * @since 1.0.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Preconnect for Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	
	<!-- Google Fonts - Ultra Modern Typography -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Floating Bubbles Background -->
<div class="floating-bubbles">
    <?php for ($i = 0; $i < 15; $i++) : ?>
    <div class="bubble"></div>
    <?php endfor; ?>
</div>

<div id="wrapper">
	<header id="header">
		<div class="header-wrapper">
			<div id="top-bar" class="header-top">
				<div class="flex-row container">
					<div class="flex-col hide-for-medium flex-left">
						<ul class="nav nav-left">
							<li><?php esc_html_e('HIỆP HỘI DOANH NGHIỆP VIỆT NAM-CAMPUCHIA', 'vcba-theme'); ?></li>
						</ul>
					</div>
					
					<div class="flex-col hide-for-medium flex-right">
						<ul class="nav top-bar-nav nav-right language-switcher">
							<?php if (function_exists('icl_get_languages')) : 
								$languages = icl_get_languages('skip_missing=0&orderby=code');
								if (!empty($languages)) :
									foreach ($languages as $l) : ?>
							<li>
								<?php if (!$l['active']) : ?>
									<a href="<?php echo esc_url($l['url']); ?>" class="lang-link">
								<?php else : ?>
									<span class="lang-link active">
								<?php endif; ?>
									<span class="flag flag-<?php echo esc_attr($l['code']); ?>">
										<?php if ($l['code'] == 'vi') : ?>🇻🇳
										<?php elseif ($l['code'] == 'en') : ?>🇺🇸
										<?php elseif ($l['code'] == 'km') : ?>🇰🇭
										<?php endif; ?>
									</span>
									<span><?php echo esc_html($l['native_name']); ?></span>
								<?php if (!$l['active']) : ?>
									</a>
								<?php else : ?>
									</span>
								<?php endif; ?>
							</li>
									<?php endforeach;
								endif;
							else : ?>
							<!-- Fallback if WPML is not active -->
							<li>
								<a href="<?php echo esc_url(home_url('/')); ?>" class="lang-link active">
									<span class="flag flag-vn">🇻🇳</span>
									<span><?php esc_html_e('Tiếng Việt', 'vcba-theme'); ?></span>
								</a>
							</li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</div>
			
			<!-- Combined Header with Logo and Menu -->
			<div class="header-main">
				<div class="container">
					<div class="header-inner">
						<!-- Logo -->
						<div id="logo" class="flex-col logo">
							<?php
							if (function_exists('the_custom_logo') && has_custom_logo()) :
								the_custom_logo();
							else : ?>
								<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" rel="home">
									<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.png'); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>
								</a>
							<?php endif; ?>
						</div>
						
						<!-- Main Navigation -->
						<nav class="header-nav hide-for-medium">
							<?php
							wp_nav_menu(array(
								'theme_location' => 'primary',
								'menu_class'     => 'nav main-nav',
								'container'      => false,
								'fallback_cb'    => 'vcba_default_menu',
								'depth'          => 2,
								'walker'         => new VCBA_Walker_Nav_Menu(),
							));
							?>
						</nav>
						
						<!-- Hotline in header -->
						<div class="header-contact hide-for-medium">
							<div class="contact-item">
								<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/call-ring.png'); ?>" alt="<?php esc_attr_e('Phone Icon', 'vcba-theme'); ?>"/>
								<div>
									<h3><a href="tel:<?php echo esc_attr(get_theme_mod('vcba_hotline', '+855882266997')); ?>"><?php echo esc_html(get_theme_mod('vcba_hotline', '+855 88 226 6997')); ?></a></h3>
								</div>
							</div>
						</div>
						
						<!-- Mobile Menu Button -->
						<button class="mobile-menu-toggle show-for-medium" aria-label="<?php esc_attr_e('Menu', 'vcba-theme'); ?>">
							<span></span>
							<span></span>
							<span></span>
						</button>
					</div>
				</div>
			</div>
		</div>
	</header>

	<main id="main">
		<div id="content">

<?php
/**
 * Default menu fallback if no menu is assigned
 */
function vcba_default_menu() {
    echo '<ul class="nav main-nav">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('TRANG CHỦ', 'vcba-theme') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/about')) . '">' . esc_html__('GIỚI THIỆU', 'vcba-theme') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/members')) . '">' . esc_html__('HỘI VIÊN', 'vcba-theme') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/news')) . '">' . esc_html__('TIN TỨC', 'vcba-theme') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/business')) . '">' . esc_html__('GIAO THƯƠNG', 'vcba-theme') . '</a></li>';
    echo '</ul>';
}

/**
 * Custom Walker for Navigation Menu
 */
class VCBA_Walker_Nav_Menu extends Walker_Nav_Menu {
    
    function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul>\n";
    }
    
    function end_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
    
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';
        
        $output .= $indent . '<li' . $id . $class_names .'>';
        
        $attributes = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target     ) .'"' : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn        ) .'"' : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url        ) .'"' : '';
        
        $item_output = isset($args->before) ? $args->before : '';
        $item_output .= '<a' . $attributes .'>';
        $item_output .= (isset($args->link_before) ? $args->link_before : '') . apply_filters('the_title', $item->title, $item->ID) . (isset($args->link_after) ? $args->link_after : '');
        $item_output .= '</a>';
        $item_output .= isset($args->after) ? $args->after : '';
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
    
    function end_el(&$output, $item, $depth = 0, $args = array()) {
        $output .= "</li>\n";
    }
}
?> 