<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package VCBA_Theme
 * @since 1.0.0
 */

get_header(); ?>

<!-- Banner Slider Section - Enhanced Modern Version -->
<div class="banner-section">
	<div class="banner-slider-wrapper">
		<div class="slider">
			<?php
			// Get slider images from customizer or use defaults
			$slider_images = array(
				get_theme_mod('vcba_slider_1', get_template_directory_uri() . '/assets/images/slider/sl5.jpg'),
				get_theme_mod('vcba_slider_2', get_template_directory_uri() . '/assets/images/slider/sl1.jpg'),
				get_theme_mod('vcba_slider_3', get_template_directory_uri() . '/assets/images/slider/sl3.jpg'),
			);
			
			foreach ($slider_images as $index => $image_url) : ?>
			<div class="img <?php echo $index === 0 ? 'active' : ''; ?>">
				<img src="<?php echo esc_url($image_url); ?>" alt="<?php printf(esc_attr__('VCBA Hoạt động %d', 'vcba-theme'), $index + 1); ?>"/>
			</div>
			<?php endforeach; ?>
		</div>
		
		<!-- Enhanced Slider Navigation Dots -->
		<div class="slider-nav">
			<?php foreach ($slider_images as $index => $image_url) : ?>
			<div class="slider-dot <?php echo $index === 0 ? 'active' : ''; ?>" data-slide="<?php echo $index; ?>" role="button" aria-label="<?php printf(esc_attr__('Chuyển đến slide %d', 'vcba-theme'), $index + 1); ?>" tabindex="0"></div>
			<?php endforeach; ?>
		</div>
		
		<!-- Enhanced Slider Arrow Controls with Modern Icons -->
		<div class="slider-arrow prev" onclick="changeSlide(-1)" role="button" aria-label="<?php esc_attr_e('Slide trước', 'vcba-theme'); ?>">
			<span>❮</span>
		</div>
		<div class="slider-arrow next" onclick="changeSlide(1)" role="button" aria-label="<?php esc_attr_e('Slide tiếp theo', 'vcba-theme'); ?>">
			<span>❯</span>
		</div>
		
		<!-- Progress Bar for Auto-slide -->
		<div class="banner-progress-bar"></div>
	</div>
</div>

<section id="about" class="section">
	<div class="section-content">
		<!-- Hero Text Content integrated into About section -->
		<div class="hero-intro-content">
			<!-- Hero Header - Centered above two columns -->
			<div class="hero-header-centered">
				<h1><?php echo esc_html(get_theme_mod('vcba_hero_title', __('Hiệp hội Doanh nghiệp Việt Nam tại Campuchia', 'vcba-theme'))); ?></h1>
				<p class="hero-subtitle"><?php echo esc_html(get_theme_mod('vcba_hero_subtitle', __('Kết nối - Hợp tác - Phát triển bền vững cùng cộng đồng doanh nghiệp Việt Nam tại Vương quốc Campuchia', 'vcba-theme'))); ?></p>
			</div>
			
			<div class="hero-two-column-layout">
				<!-- Left Column - Content -->
				<div class="hero-content-column">
					<!-- VCBA Description -->
					<div class="vcba-description">
						<h3><?php esc_html_e('Về VCBA', 'vcba-theme'); ?></h3>
						<p><?php echo wp_kses_post(get_theme_mod('vcba_about_description', __('VCBA là tổ chức phi lợi nhuận được thành lập trên cơ sở kế thừa Câu lạc bộ Doanh nghiệp Việt Nam tại Campuchia, có sự tham gia của các doanh nghiệp lớn trong nhiều lĩnh vực kinh tế. Hiệp hội hoạt động với mục tiêu kết nối, hỗ trợ và phát triển cộng đồng doanh nghiệp Việt Nam tại Campuchia.', 'vcba-theme'))); ?></p>
						<a href="<?php echo esc_url(home_url('/about')); ?>" class="btn btn-outline"><?php esc_html_e('Tìm hiểu thêm', 'vcba-theme'); ?></a>
					</div>
					
					<!-- Hero Statistics Inline -->
					<div class="hero-stats-inline">
						<div class="hero-stat">
							<h3><?php echo esc_html(get_theme_mod('vcba_stat_members', '200+')); ?></h3>
							<p><?php esc_html_e('Hội viên', 'vcba-theme'); ?></p>
						</div>
						<div class="hero-stat">
							<h3><?php echo esc_html(get_theme_mod('vcba_stat_years', '15+')); ?></h3>
							<p><?php esc_html_e('Năm hoạt động', 'vcba-theme'); ?></p>
						</div>
						<div class="hero-stat">
							<h3><?php echo esc_html(get_theme_mod('vcba_stat_events', '50+')); ?></h3>
							<p><?php esc_html_e('Sự kiện/năm', 'vcba-theme'); ?></p>
						</div>
					</div>
					
					<!-- Call to Action Buttons -->
					<div class="hero-actions">
						<a href="<?php echo esc_url(home_url('/members')); ?>" class="btn btn-primary"><?php esc_html_e('Gia nhập VCBA', 'vcba-theme'); ?></a>
						<a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-secondary"><?php esc_html_e('Liên hệ ngay', 'vcba-theme'); ?></a>
					</div>
				</div>
				
				<!-- Right Column - Image -->
				<div class="hero-image-column">
					<div class="hero-image-container">
						<div class="image-overlay-effect">
							<?php
							$hero_image = get_theme_mod('vcba_hero_image', get_template_directory_uri() . '/assets/images/vcba-meeting.jpg');
							?>
							<img src="<?php echo esc_url($hero_image); ?>" alt="<?php esc_attr_e('VCBA - Hiệp hội Doanh nghiệp Việt Nam tại Campuchia', 'vcba-theme'); ?>"/>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- VCBA Features Grid -->
		<div class="vcba-features-grid">
			<div class="feature-card mission">
				<div class="feature-icon">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<path d="M12 2L2 7v10c0 5.55 3.84 9.95 9 11 5.16-1.05 9-5.45 9-11V7l-10-5z"/>
						<path d="M9 12l2 2 4-4"/>
					</svg>
				</div>
				<div class="feature-content">
					<h3><?php esc_html_e('Sứ mệnh', 'vcba-theme'); ?></h3>
					<p><?php esc_html_e('Kết nối và hỗ trợ cộng đồng doanh nghiệp Việt Nam tại Campuchia phát triển bền vững', 'vcba-theme'); ?></p>
				</div>
			</div>
			
			<div class="feature-card vision">
				<div class="feature-icon">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
						<circle cx="12" cy="12" r="3"/>
					</svg>
				</div>
				<div class="feature-content">
					<h3><?php esc_html_e('Tầm nhìn', 'vcba-theme'); ?></h3>
					<p><?php esc_html_e('Trở thành cầu nối quan trọng trong hợp tác kinh tế Việt Nam - Campuchia', 'vcba-theme'); ?></p>
				</div>
			</div>
			
			<div class="feature-card values">
				<div class="feature-icon">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
						<circle cx="9" cy="7" r="4"/>
						<path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
						<path d="M16 3.13a4 4 0 0 1 0 7.75"/>
					</svg>
				</div>
				<div class="feature-content">
					<h3><?php esc_html_e('Giá trị cốt lõi', 'vcba-theme'); ?></h3>
					<p><?php esc_html_e('Minh bạch, chuyên nghiệp, hợp tác và phát triển bền vững', 'vcba-theme'); ?></p>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="news" class="section">
	<div class="section-content">
		<div class="news-header">
			<h2><?php esc_html_e('TIN TỨC & HOẠT ĐỘNG', 'vcba-theme'); ?></h2>
			<p><?php esc_html_e('Cập nhật thông tin mới nhất về các hoạt động và sự kiện của VCBA', 'vcba-theme'); ?></p>
		</div>
		
		<div class="news-grid">
			<?php
			// Get latest posts
			$news_query = new WP_Query(array(
				'post_type' => 'post',
				'posts_per_page' => 6,
				'post_status' => 'publish',
				'meta_query' => array(
					'relation' => 'OR',
					array(
						'key' => '_featured_post',
						'value' => '1',
						'compare' => '='
					),
					array(
						'key' => '_featured_post',
						'compare' => 'NOT EXISTS'
					)
				)
			));
			
			if ($news_query->have_posts()) :
				$post_count = 0;
				while ($news_query->have_posts()) : $news_query->the_post();
					$post_count++;
					$is_featured = get_post_meta(get_the_ID(), '_featured_post', true) === '1';
					$card_class = $post_count === 1 ? 'featured-large' : 'standard compact';
					?>
					
					<article class="news-card <?php echo esc_attr($card_class); ?>">
						<?php if (has_post_thumbnail()) : ?>
						<div class="news-image">
							<?php the_post_thumbnail('vcba-card'); ?>
							<?php
							$categories = get_the_category();
							if ($categories) : ?>
								<div class="news-category"><?php echo esc_html($categories[0]->name); ?></div>
							<?php endif; ?>
						</div>
						<?php else : ?>
						<div class="news-image">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/default-news.jpg'); ?>" alt="<?php the_title_attribute(); ?>"/>
							<?php
							$categories = get_the_category();
							if ($categories) : ?>
								<div class="news-category"><?php echo esc_html($categories[0]->name); ?></div>
							<?php endif; ?>
						</div>
						<?php endif; ?>
						
						<div class="news-content">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
							<div class="news-meta">
								<span class="news-date"><?php echo get_the_date('d/m/Y'); ?></span>
								<a href="<?php the_permalink(); ?>" class="news-link"><?php esc_html_e('Đọc thêm →', 'vcba-theme'); ?></a>
							</div>
						</div>
					</article>
					
				<?php endwhile;
				wp_reset_postdata();
			else : ?>
				<p><?php esc_html_e('Chưa có bài viết nào được đăng.', 'vcba-theme'); ?></p>
			<?php endif; ?>
		</div>
		
		<div class="news-cta">
			<a href="<?php echo esc_url(home_url('/news')); ?>" class="btn btn-primary"><?php esc_html_e('Xem thêm bài viết', 'vcba-theme'); ?></a>
		</div>
	</div>
</section>

<section id="business" class="section">
	<div class="section-content">
		<div class="business-header">
			<h2><?php esc_html_e('KẾT NỐI GIAO THƯƠNG', 'vcba-theme'); ?></h2>
			<p><?php esc_html_e('Cơ hội đầu tư và hợp tác kinh doanh tại Campuchia', 'vcba-theme'); ?></p>
		</div>
		
		<div class="business-grid">
			<?php
			// Get business opportunities or featured posts
			$business_query = new WP_Query(array(
				'post_type' => array('business_opportunity', 'post'),
				'posts_per_page' => 4,
				'post_status' => 'publish',
				'meta_query' => array(
					array(
						'key' => '_business_featured',
						'value' => '1',
						'compare' => '='
					)
				)
			));
			
			if ($business_query->have_posts()) :
				while ($business_query->have_posts()) : $business_query->the_post(); ?>
					
					<div class="business-card">
						<div class="business-card-image">
							<?php 
							if (has_post_thumbnail()) :
								the_post_thumbnail('vcba-card');
							else : ?>
								<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/default-business.jpg'); ?>" alt="<?php the_title_attribute(); ?>"/>
							<?php endif; ?>
							<?php
							$categories = get_the_category();
							if ($categories) : ?>
								<div class="business-card-category"><?php echo esc_html($categories[0]->name); ?></div>
							<?php endif; ?>
						</div>
						<div class="business-card-content">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
							<a href="<?php the_permalink(); ?>" class="business-card-btn"><?php esc_html_e('Tìm hiểu thêm', 'vcba-theme'); ?></a>
						</div>
					</div>
					
				<?php endwhile;
				wp_reset_postdata();
			else : 
				// Fallback: show default business cards
				for ($i = 1; $i <= 4; $i++) : ?>
					<div class="business-card">
						<div class="business-card-image">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/business-' . $i . '.jpg'); ?>" alt="<?php printf(esc_attr__('Cơ hội kinh doanh %d', 'vcba-theme'), $i); ?>"/>
							<div class="business-card-category"><?php esc_html_e('Đầu tư', 'vcba-theme'); ?></div>
						</div>
						<div class="business-card-content">
							<h3><a href="#"><?php printf(esc_html__('Cơ hội kinh doanh %d', 'vcba-theme'), $i); ?></a></h3>
							<p><?php esc_html_e('Mô tả ngắn về cơ hội kinh doanh và đầu tư tại Campuchia...', 'vcba-theme'); ?></p>
							<a href="#" class="business-card-btn"><?php esc_html_e('Tìm hiểu thêm', 'vcba-theme'); ?></a>
						</div>
					</div>
				<?php endfor;
			endif; ?>
		</div>
	</div>
</section>

<?php get_footer(); ?> 