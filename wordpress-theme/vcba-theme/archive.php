<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package VCBA_Theme
 * @since 1.0.0
 */

get_header(); ?>

<!-- News Page Header -->
<div class="news-page-header">
    <div class="section-content">
        <div class="news-page-intro">
            <h1>
                <?php
                if (is_category()) {
                    printf(esc_html__('Danh mục: %s', 'vcba-theme'), single_cat_title('', false));
                } elseif (is_tag()) {
                    printf(esc_html__('Tag: %s', 'vcba-theme'), single_tag_title('', false));
                } elseif (is_author()) {
                    printf(esc_html__('Tác giả: %s', 'vcba-theme'), get_the_author());
                } elseif (is_date()) {
                    if (is_year()) {
                        printf(esc_html__('Năm: %s', 'vcba-theme'), get_the_date('Y'));
                    } elseif (is_month()) {
                        printf(esc_html__('Tháng: %s', 'vcba-theme'), get_the_date('F Y'));
                    } else {
                        printf(esc_html__('Ngày: %s', 'vcba-theme'), get_the_date());
                    }
                } else {
                    esc_html_e('TIN TỨC & HOẠT ĐỘNG', 'vcba-theme');
                }
                ?>
            </h1>
            <p><?php esc_html_e('Cập nhật thông tin mới nhất về các hoạt động và sự kiện của VCBA', 'vcba-theme'); ?></p>
        </div>
    </div>
</div>

<!-- News Filter Section -->
<div class="news-filter-section">
    <div class="section-content">
        <div class="news-filter-wrapper">
            <div class="filter-controls">
                <div class="filter-group">
                    <label for="category-filter"><?php esc_html_e('Danh mục:', 'vcba-theme'); ?></label>
                    <select id="category-filter" class="filter-select">
                        <option value=""><?php esc_html_e('Tất cả danh mục', 'vcba-theme'); ?></option>
                        <?php
                        $categories = get_categories();
                        foreach ($categories as $category) {
                            $selected = is_category($category->term_id) ? 'selected' : '';
                            printf('<option value="%s" %s>%s (%d)</option>', 
                                esc_attr($category->slug), 
                                $selected, 
                                esc_html($category->name), 
                                $category->count
                            );
                        }
                        ?>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label for="date-filter"><?php esc_html_e('Thời gian:', 'vcba-theme'); ?></label>
                    <select id="date-filter" class="filter-select">
                        <option value=""><?php esc_html_e('Tất cả thời gian', 'vcba-theme'); ?></option>
                        <option value="this-month"><?php esc_html_e('Tháng này', 'vcba-theme'); ?></option>
                        <option value="last-month"><?php esc_html_e('Tháng trước', 'vcba-theme'); ?></option>
                        <option value="this-year"><?php esc_html_e('Năm nay', 'vcba-theme'); ?></option>
                    </select>
                </div>
            </div>
            
            <div class="search-box">
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                    <input type="search" class="search-input" name="s" 
                           placeholder="<?php esc_attr_e('Tìm kiếm bài viết...', 'vcba-theme'); ?>" 
                           value="<?php echo get_search_query(); ?>">
                    <button type="submit" class="search-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.35-4.35"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- News Archive Section -->
<section class="all-news-section">
    <div class="section-content">
        <?php if (have_posts()) : ?>
        
        <div class="news-grid">
            <?php
            $post_count = 0;
            while (have_posts()) : the_post();
                $post_count++;
                $is_featured = get_post_meta(get_the_ID(), '_featured_post', true) === '1';
                $card_class = ($post_count === 1 && is_home()) ? 'featured' : 'standard compact';
                ?>
                
                <article class="news-card <?php echo esc_attr($card_class); ?>">
                    <?php if (has_post_thumbnail()) : ?>
                    <div class="news-image">
                        <?php 
                        if ($card_class === 'featured') :
                            the_post_thumbnail('vcba-hero');
                        else :
                            the_post_thumbnail('vcba-card');
                        endif;
                        ?>
                        <?php
                        $categories = get_the_category();
                        if ($categories) : ?>
                            <div class="news-category"><?php echo esc_html($categories[0]->name); ?></div>
                        <?php endif; ?>
                        
                        <?php if ($is_featured) : ?>
                            <div class="featured-badge"><?php esc_html_e('Nổi bật', 'vcba-theme'); ?></div>
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
                        
                        <?php if ($is_featured) : ?>
                            <div class="featured-badge"><?php esc_html_e('Nổi bật', 'vcba-theme'); ?></div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    
                    <div class="news-content">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php echo wp_trim_words(get_the_excerpt(), $card_class === 'featured' ? 30 : 20); ?></p>
                        <div class="news-meta">
                            <span class="news-date"><?php echo get_the_date('d/m/Y'); ?></span>
                            <span class="news-views">
                                <?php 
                                $post_views = get_post_meta(get_the_ID(), '_post_views', true);
                                echo $post_views ? esc_html($post_views) : '0';
                                ?> <?php esc_html_e('lượt xem', 'vcba-theme'); ?>
                            </span>
                            <a href="<?php the_permalink(); ?>" class="news-link"><?php esc_html_e('Đọc thêm →', 'vcba-theme'); ?></a>
                        </div>
                    </div>
                </article>
                
            <?php endwhile; ?>
        </div>
        
        <!-- Pagination -->
        <div class="news-pagination">
            <?php
            global $wp_query;
            vcba_pagination($wp_query);
            ?>
        </div>
        
        <?php else : ?>
        
        <div class="no-posts-found">
            <div class="news-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14,2 14,8 20,8"></polyline>
                    <line x1="16" y1="13" x2="8" y2="13"></line>
                    <line x1="16" y1="17" x2="8" y2="17"></line>
                    <polyline points="10,9 9,9 8,9"></polyline>
                </svg>
            </div>
            <h3><?php esc_html_e('Không tìm thấy bài viết', 'vcba-theme'); ?></h3>
            <p><?php esc_html_e('Không có bài viết nào phù hợp với tìm kiếm của bạn. Vui lòng thử lại với từ khóa khác.', 'vcba-theme'); ?></p>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary"><?php esc_html_e('Về trang chủ', 'vcba-theme'); ?></a>
        </div>
        
        <?php endif; ?>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Category filter
    const categoryFilter = document.getElementById('category-filter');
    if (categoryFilter) {
        categoryFilter.addEventListener('change', function() {
            if (this.value) {
                window.location.href = '<?php echo esc_url(home_url('/category/')); ?>' + this.value;
            } else {
                window.location.href = '<?php echo esc_url(home_url('/news')); ?>';
            }
        });
    }
    
    // Date filter
    const dateFilter = document.getElementById('date-filter');
    if (dateFilter) {
        dateFilter.addEventListener('change', function() {
            const currentUrl = new URL(window.location.href);
            if (this.value) {
                currentUrl.searchParams.set('date_filter', this.value);
            } else {
                currentUrl.searchParams.delete('date_filter');
            }
            window.location.href = currentUrl.toString();
        });
    }
});
</script>

<?php get_footer(); ?> 