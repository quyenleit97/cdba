# VCBA Enterprise Theme

**Version:** 1.0.0  
**Author:** VCBA Development Team  
**License:** GPL v2 or later  

## Mô tả

VCBA Enterprise Theme là một theme WordPress tùy chỉnh được thiết kế đặc biệt cho **Hiệp hội Doanh nghiệp Việt Nam tại Campuchia (VCBA)**. Theme này được chuyển đổi từ website HTML tĩnh sang WordPress với đầy đủ tính năng quản lý nội dung động.

## Tính năng chính

### 🎨 **Thiết kế & Giao diện**
- ✅ **Modern & Responsive**: Thiết kế hiện đại, hoàn toàn responsive trên mọi thiết bị
- ✅ **Màu sắc chủ đạo**: Xanh dương (#1E40AF) phù hợp với logo VCBA
- ✅ **Typography chuyên nghiệp**: Sử dụng Google Fonts (Inter & Poppins)
- ✅ **Animations**: Hiệu ứng chuyển động mượt mà và professional
- ✅ **Floating bubbles**: Hiệu ứng nền động đẹp mắt

### 🚀 **Tính năng WordPress**
- ✅ **Custom Post Types**: Business Members, Business Opportunities
- ✅ **Custom Meta Boxes**: Quản lý thông tin chi tiết members và opportunities
- ✅ **Widget Areas**: Sidebar, Footer (3 khu vực)
- ✅ **Navigation Menus**: Primary Menu, Footer Menu
- ✅ **Custom Logo Support**: Upload logo tùy chỉnh
- ✅ **Featured Images**: Hỗ trợ ảnh đại diện với nhiều kích thước

### 📱 **Multi-language Ready**
- ✅ **WPML Compatible**: Sẵn sàng tích hợp WPML
- ✅ **Translation Ready**: Text domain "vcba-theme"
- ✅ **Language Switcher**: Tiếng Việt, English, ភាសាខ្មែរ

### 🔧 **Customizer Options**
- ✅ **Site Identity**: Logo, hotline, email, địa chỉ
- ✅ **Social Links**: Facebook, YouTube, LinkedIn
- ✅ **Hero Section**: Title, subtitle, mô tả, hình ảnh
- ✅ **Statistics**: Số liệu thống kê (hội viên, năm hoạt động, sự kiện)
- ✅ **Slider Images**: 3 ảnh slider trang chủ

### 📰 **News & Content Management**
- ✅ **Advanced Post Display**: Featured posts, category badges
- ✅ **Post Views Counter**: Đếm lượt xem bài viết
- ✅ **Related Posts**: Bài viết liên quan tự động
- ✅ **Archive Pages**: Trang danh sách tin tức với filter
- ✅ **Pagination**: Phân trang đẹp và user-friendly
- ✅ **Search Functionality**: Tìm kiếm bài viết

### 💼 **Business Features**
- ✅ **Member Management**: Quản lý danh sách hội viên
- ✅ **Business Opportunities**: Cơ hội đầu tư & kinh doanh
- ✅ **Contact Forms**: Form liên hệ và đăng ký newsletter
- ✅ **Social Sharing**: Chia sẻ bài viết lên social media

## Cài đặt

### Phương pháp 1: Upload file ZIP

1. **Download theme**: Tải file `vcba-theme.zip`
2. **WordPress Admin**: Đăng nhập vào WordPress Admin
3. **Appearance > Themes**: Vào mục Giao diện > Themes
4. **Add New**: Click "Add New" → "Upload Theme"
5. **Upload**: Chọn file `vcba-theme.zip` và upload
6. **Activate**: Kích hoạt theme sau khi cài đặt thành công

### Phương pháp 2: FTP Upload

1. **Extract**: Giải nén file `vcba-theme.zip`
2. **FTP Upload**: Upload thư mục `vcba-theme` vào `/wp-content/themes/`
3. **Activate**: Vào WordPress Admin → Appearance → Themes → Activate

## Cấu hình ban đầu

### 1. **Cài đặt Menu**
```
WordPress Admin → Appearance → Menus
- Tạo menu "Primary Menu" và assign vào "Primary Menu"
- Tạo menu "Footer Menu" và assign vào "Footer Menu"
```

### 2. **Cấu hình Customizer**
```
WordPress Admin → Appearance → Customize
- Site Identity: Upload logo, cài đặt hotline, email
- VCBA Site Identity: Cập nhật địa chỉ, social links
- Hero Section: Cài đặt title, subtitle, mô tả
- Colors: Kiểm tra và điều chỉnh màu sắc
```

### 3. **Tạo nội dung mẫu**
```
- Tạo các category: "Hoạt động sự kiện", "Hoạt động nội bộ", "Cơ hội đầu tư"
- Thêm một số bài viết với featured image
- Tạo Business Members và Business Opportunities
```

### 4. **Widget Areas**
```
WordPress Admin → Appearance → Widgets
- Sidebar: Thêm Recent Posts, Categories widget
- Footer 1,2,3: Thêm Text, Social Links widgets
```

## Custom Post Types

### Business Members
```php
- Slug: /members/
- Fields: Company Name, Website, Phone, Email, Business Type
- Archive: Có
- Featured Image: Có
```

### Business Opportunities  
```php
- Slug: /opportunities/
- Fields: Investment Amount, Location, Contact Person, Deadline
- Archive: Có
- Featured Image: Có
```

## Shortcodes

Theme hiện tại chưa có shortcodes tùy chỉnh, nhưng có thể mở rộng thêm trong tương lai.

## Hooks & Filters

### Custom Hooks
```php
// Theme setup
add_action('after_setup_theme', 'vcba_theme_setup');

// Enqueue scripts & styles  
add_action('wp_enqueue_scripts', 'vcba_theme_scripts');

// Custom post types
add_action('init', 'vcba_register_post_types');

// Meta boxes
add_action('add_meta_boxes', 'vcba_add_meta_boxes');
add_action('save_post', 'vcba_save_meta_boxes');

// Customizer
add_action('customize_register', 'vcba_customize_register');
```

### Custom Functions
```php
vcba_pagination() - Custom pagination
vcba_default_menu() - Fallback menu
VCBA_Walker_Nav_Menu - Custom menu walker
```

## Browser Support

- ✅ Chrome 90+
- ✅ Firefox 88+
- ✅ Safari 14+
- ✅ Edge 90+
- ✅ Mobile browsers (iOS Safari, Chrome Mobile)

## Performance

- ✅ **Optimized CSS**: Minimized và optimized
- ✅ **Image Optimization**: Multiple image sizes
- ✅ **Script Loading**: Proper enqueue và dependencies
- ✅ **Caching Ready**: Compatible với caching plugins

## Security

- ✅ **Data Sanitization**: Tất cả input được sanitize
- ✅ **Nonce Verification**: Bảo mật forms
- ✅ **Capability Checks**: Kiểm tra quyền user
- ✅ **SQL Injection Prevention**: Sử dụng WordPress APIs

## Plugin Recommendations

### Bắt buộc
- **None**: Theme hoạt động độc lập

### Khuyến nghị
- **WPML**: Multi-language support
- **Yoast SEO**: SEO optimization
- **Contact Form 7**: Advanced contact forms
- **WP Super Cache**: Performance optimization
- **Wordfence Security**: Security enhancement

## Troubleshooting

### Lỗi thường gặp

**1. Theme không hiển thị đúng**
```
- Kiểm tra file style.css có header comment đúng
- Đảm bảo tất cả file PHP có syntax đúng
- Clear cache nếu sử dụng caching plugin
```

**2. Menu không hiển thị**
```
- Vào Appearance > Menus tạo menu mới
- Assign menu vào đúng location
- Kiểm tra theme location trong functions.php
```

**3. Images không load**
```
- Kiểm tra đường dẫn assets/images/
- Upload lại images vào thư mục đúng
- Regenerate thumbnails
```

**4. Custom Post Types không hiện**
```
- Vào Settings > Permalinks và Save lại
- Kiểm tra functions.php có register đúng
- Check quyền user
```

## Changelog

### Version 1.0.0 (30/06/2025)
- 🎉 **Initial Release**: Chuyển đổi hoàn chỉnh từ HTML sang WordPress
- ✅ **Features**: Tất cả tính năng cơ bản được implement
- ✅ **Testing**: Đã test trên WordPress 6.0+
- ✅ **Documentation**: Hoàn thiện documentation

## Support

### Liên hệ hỗ trợ
- **Email**: vcba.cam@gmail.com
- **Phone**: +855 88 226 6997
- **Website**: https://vcba.biz

### Development
- **GitHub**: (Private repository)
- **Documentation**: Tài liệu chi tiết trong theme

## License

GPL v2 or later - https://www.gnu.org/licenses/gpl-2.0.html

---

**Developed with ❤️ for VCBA - Vietnam Cambodia Business Association** 