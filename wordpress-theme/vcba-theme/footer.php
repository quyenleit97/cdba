		</div>
	</main>

	<footer id="footer">
		<!-- Footer Main Content -->
		<div class="footer-main">
			<div class="section-content">
				<div class="footer-grid">
					<!-- About VCBA Section -->
					<div class="footer-section footer-about">
						<div class="footer-logo">
							<?php
							if (function_exists('the_custom_logo') && has_custom_logo()) :
								the_custom_logo();
							else : ?>
								<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.png'); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>
							<?php endif; ?>
						</div>
						<p class="footer-description">
							<?php 
							$footer_description = get_theme_mod('vcba_footer_description', 
								__('VCBA là tổ chức phi lợi nhuận được thành lập trên cơ sở kế thừa Câu lạc bộ Doanh nghiệp Việt Nam tại Campuchia, có sự tham gia của các doanh nghiệp lớn trong nhiều lĩnh vực kinh tế.', 'vcba-theme')
							);
							echo esc_html($footer_description);
							?>
						</p>
						
						<!-- Footer Stats -->
						<div class="footer-stats">
							<div class="footer-stat">
								<div class="stat-number">200+</div>
								<div class="stat-label"><?php esc_html_e('Hội viên', 'vcba-theme'); ?></div>
							</div>
							<div class="footer-stat">
								<div class="stat-number">15+</div>
								<div class="stat-label"><?php esc_html_e('Năm hoạt động', 'vcba-theme'); ?></div>
							</div>
							<div class="footer-stat">
								<div class="stat-number">50+</div>
								<div class="stat-label"><?php esc_html_e('Sự kiện/năm', 'vcba-theme'); ?></div>
							</div>
						</div>
					</div>
					
					<!-- Contact Info Section -->
					<div class="footer-section footer-contact">
						<h4><?php esc_html_e('Thông tin liên hệ', 'vcba-theme'); ?></h4>
						<div class="contact-info">
							<div class="contact-item">
								<div class="contact-icon">
									<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
										<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
										<circle cx="12" cy="10" r="3"></circle>
									</svg>
								</div>
								<div class="contact-text">
									<span class="contact-label"><?php esc_html_e('Địa chỉ', 'vcba-theme'); ?></span>
									<span class="contact-value"><?php echo esc_html(get_theme_mod('vcba_address', 'Số 255 (Suncity) Tầng 1, đường 51 góc đường 370, phường Buong Keng Koan, thủ đô Phnompenh')); ?></span>
								</div>
							</div>
							
							<div class="contact-item">
								<div class="contact-icon">
									<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
										<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
									</svg>
								</div>
								<div class="contact-text">
									<span class="contact-label"><?php esc_html_e('Hotline', 'vcba-theme'); ?></span>
									<span class="contact-value">
										<a href="tel:<?php echo esc_attr(str_replace(' ', '', get_theme_mod('vcba_hotline', '+855882266997'))); ?>">
											<?php echo esc_html(get_theme_mod('vcba_hotline', '+855 88 226 6997')); ?>
										</a>
									</span>
								</div>
							</div>
							
							<div class="contact-item">
								<div class="contact-icon">
									<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
										<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
										<polyline points="22,6 12,13 2,6"></polyline>
									</svg>
								</div>
								<div class="contact-text">
									<span class="contact-label"><?php esc_html_e('Email', 'vcba-theme'); ?></span>
									<span class="contact-value">
										<a href="mailto:<?php echo esc_attr(get_theme_mod('vcba_email', 'vcba.cam@gmail.com')); ?>">
											<?php echo esc_html(get_theme_mod('vcba_email', 'vcba.cam@gmail.com')); ?>
										</a>
									</span>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Social & Newsletter Section -->
					<div class="footer-section footer-social">
						<h4><?php esc_html_e('Kết nối với chúng tôi', 'vcba-theme'); ?></h4>
						<p class="social-description"><?php esc_html_e('Theo dõi VCBA để cập nhật thông tin mới nhất về các hoạt động và cơ hội kinh doanh', 'vcba-theme'); ?></p>
						
						<div class="social-links">
							<?php
							$facebook_url = get_theme_mod('vcba_facebook', 'https://facebook.com');
							$youtube_url = get_theme_mod('vcba_youtube', 'https://youtube.com');
							$linkedin_url = get_theme_mod('vcba_linkedin', 'https://linkedin.com');
							
							if ($facebook_url) : ?>
							<a href="<?php echo esc_url($facebook_url); ?>" target="_blank" rel="noopener" class="social-link facebook" aria-label="Facebook">
								<svg viewBox="0 0 24 24" fill="currentColor">
									<path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
								</svg>
								<span>Facebook</span>
							</a>
							<?php endif;
							
							if ($youtube_url) : ?>
							<a href="<?php echo esc_url($youtube_url); ?>" target="_blank" rel="noopener" class="social-link youtube" aria-label="YouTube">
								<svg viewBox="0 0 24 24" fill="currentColor">
									<path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
								</svg>
								<span>YouTube</span>
							</a>
							<?php endif;
							
							if ($linkedin_url) : ?>
							<a href="<?php echo esc_url($linkedin_url); ?>" target="_blank" rel="noopener" class="social-link linkedin" aria-label="LinkedIn">
								<svg viewBox="0 0 24 24" fill="currentColor">
									<path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
								</svg>
								<span>LinkedIn</span>
							</a>
							<?php endif; ?>
						</div>
						
						<!-- Newsletter Signup -->
						<div class="newsletter">
							<h5><?php esc_html_e('Đăng ký nhận tin', 'vcba-theme'); ?></h5>
							<p><?php esc_html_e('Nhận thông tin cập nhật về các hoạt động và cơ hội kinh doanh', 'vcba-theme'); ?></p>
							<form class="newsletter-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
								<input type="hidden" name="action" value="vcba_newsletter_signup">
								<?php wp_nonce_field('vcba_newsletter', 'vcba_newsletter_nonce'); ?>
								<input type="email" name="newsletter_email" placeholder="<?php esc_attr_e('Nhập email của bạn', 'vcba-theme'); ?>" required>
								<button type="submit">
									<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
										<line x1="22" y1="2" x2="11" y2="13"></line>
										<polygon points="22,2 15,22 11,13 2,9 22,2"></polygon>
									</svg>
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Footer Bottom -->
		<div class="footer-bottom">
			<div class="section-content">
				<div class="footer-bottom-content">
					<div class="copyright">
						<p><?php printf(esc_html__('© %s VCBA - Hiệp hội Doanh nghiệp Việt Nam-Campuchia. All rights reserved.', 'vcba-theme'), date('Y')); ?></p>
					</div>
					<div class="footer-bottom-links">
						<?php
						wp_nav_menu(array(
							'theme_location' => 'footer',
							'menu_class'     => 'footer-menu',
							'container'      => false,
							'fallback_cb'    => 'vcba_default_footer_menu',
							'depth'          => 1,
						));
						?>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>

<!-- Theme JavaScript -->
<script>
// Copy from existing script.js functionality here or load it via wp_enqueue_script
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const headerNav = document.querySelector('.header-nav');
    
    if (mobileMenuToggle && headerNav) {
        mobileMenuToggle.addEventListener('click', function() {
            headerNav.classList.toggle('active');
            this.classList.toggle('active');
        });
    }
    
    // Newsletter form submission
    const newsletterForm = document.querySelector('.newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            
            fetch(this.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Cảm ơn bạn đã đăng ký!');
                    this.reset();
                } else {
                    alert('Có lỗi xảy ra. Vui lòng thử lại!');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Có lỗi xảy ra. Vui lòng thử lại!');
            });
        });
    }
});
</script>

</body>
</html>

<?php
/**
 * Default footer menu fallback if no menu is assigned
 */
function vcba_default_footer_menu() {
    echo '<a href="' . esc_url(home_url('/privacy-policy')) . '">' . esc_html__('Chính sách bảo mật', 'vcba-theme') . '</a>';
    echo '<a href="' . esc_url(home_url('/terms-of-service')) . '">' . esc_html__('Điều khoản sử dụng', 'vcba-theme') . '</a>';
    echo '<a href="' . esc_url(home_url('/sitemap')) . '">' . esc_html__('Sơ đồ website', 'vcba-theme') . '</a>';
}
?> 