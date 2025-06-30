<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package VCBA_Theme
 * @since 1.0.0
 */

get_header(); ?>

<div class="news-detail-section">
    <div class="section-content">
        <?php while (have_posts()) : the_post(); ?>
        
        <!-- Breadcrumb -->
        <div class="breadcrumb-section">
            <nav class="breadcrumb-nav">
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Trang chủ', 'vcba-theme'); ?></a>
                <span class="breadcrumb-separator">›</span>
                <a href="<?php echo esc_url(home_url('/news')); ?>"><?php esc_html_e('Tin tức', 'vcba-theme'); ?></a>
                <span class="breadcrumb-separator">›</span>
                <span class="current-page"><?php the_title(); ?></span>
            </nav>
        </div>

        <article class="news-detail-article">
            <header class="news-detail-header">
                <?php
                $categories = get_the_category();
                if ($categories) : ?>
                    <div class="news-category-badge"><?php echo esc_html($categories[0]->name); ?></div>
                <?php endif; ?>
                
                <h1 class="news-detail-title"><?php the_title(); ?></h1>
                
                <div class="news-meta-info">
                    <div class="news-date">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        <?php echo get_the_date('d/m/Y'); ?>
                    </div>
                    <div class="news-author">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <?php the_author(); ?>
                    </div>
                    <div class="news-views">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                        <?php 
                        $post_views = get_post_meta(get_the_ID(), '_post_views', true);
                        echo $post_views ? esc_html($post_views) : '0';
                        ?> <?php esc_html_e('lượt xem', 'vcba-theme'); ?>
                    </div>
                </div>
            </header>

            <?php if (has_post_thumbnail()) : ?>
            <div class="news-featured-image">
                <?php the_post_thumbnail('vcba-hero', array('alt' => get_the_title())); ?>
            </div>
            <?php endif; ?>

            <div class="news-detail-content">
                <?php if (has_excerpt()) : ?>
                <div class="news-excerpt">
                    <p class="lead-text"><?php the_excerpt(); ?></p>
                </div>
                <?php endif; ?>

                <div class="news-body">
                    <?php 
                    the_content();
                    
                    wp_link_pages(array(
                        'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__('Trang:', 'vcba-theme') . '</span>',
                        'after'       => '</div>',
                        'link_before' => '<span>',
                        'link_after'  => '</span>',
                        'pagelink'    => '<span class="screen-reader-text">' . esc_html__('Trang', 'vcba-theme') . ' </span>%',
                        'separator'   => '<span class="screen-reader-text">, </span>',
                    ));
                    ?>
                </div>
            </div>

            <footer class="news-detail-footer">
                <div class="news-tags-share">
                    <?php
                    $tags = get_the_tags();
                    if ($tags) : ?>
                    <div class="news-tags">
                        <span class="tag-label"><?php esc_html_e('Tags:', 'vcba-theme'); ?></span>
                        <?php foreach ($tags as $tag) : ?>
                            <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="news-tag"><?php echo esc_html($tag->name); ?></a>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <div class="news-share">
                        <span class="share-label"><?php esc_html_e('Chia sẻ:', 'vcba-theme'); ?></span>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" 
                           target="_blank" rel="noopener" class="share-btn facebook">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" 
                           target="_blank" rel="noopener" class="share-btn twitter">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>" 
                           target="_blank" rel="noopener" class="share-btn linkedin">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </footer>
        </article>

        <?php
        // Update post views
        $post_views = get_post_meta(get_the_ID(), '_post_views', true);
        $post_views = $post_views ? $post_views + 1 : 1;
        update_post_meta(get_the_ID(), '_post_views', $post_views);
        ?>

        <?php endwhile; ?>
    </div>
</div>

<!-- Related News Section -->
<section class="related-news-section">
    <div class="section-content">
        <h2 class="related-news-title"><?php esc_html_e('Bài viết liên quan', 'vcba-theme'); ?></h2>
        
        <div class="news-grid">
            <?php
            $current_post_id = get_the_ID();
            $current_categories = wp_get_post_categories($current_post_id);
            
            if ($current_categories) :
                $related_query = new WP_Query(array(
                    'category__in' => $current_categories,
                    'post__not_in' => array($current_post_id),
                    'posts_per_page' => 3,
                    'post_status' => 'publish'
                ));
                
                if ($related_query->have_posts()) :
                    while ($related_query->have_posts()) : $related_query->the_post(); ?>
                    
                    <article class="news-card standard compact">
                        <?php if (has_post_thumbnail()) : ?>
                        <div class="news-image">
                            <?php the_post_thumbnail('vcba-card'); ?>
                            <?php
                            $categories = get_the_category();
                            if ($categories) : ?>
                                <div class="news-category"><?php echo esc_html($categories[0]->name); ?></div>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        
                        <div class="news-content">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                            <div class="news-meta">
                                <span class="news-date"><?php echo get_the_date('d/m/Y'); ?></span>
                                <a href="<?php the_permalink(); ?>" class="news-link"><?php esc_html_e('Đọc thêm →', 'vcba-theme'); ?></a>
                            </div>
                        </div>
                    </article>
                    
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p><?php esc_html_e('Không có bài viết liên quan.', 'vcba-theme'); ?></p>
                <?php endif;
            endif; ?>
        </div>
    </div>
</section>

<?php
// Include comments if open
if (comments_open() || get_comments_number()) :
    comments_template();
endif;
?>

<?php get_footer(); ?> 