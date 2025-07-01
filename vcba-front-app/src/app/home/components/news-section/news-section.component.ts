import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterLink } from '@angular/router';

@Component({
  selector: 'app-news-section',
  standalone: true,
  imports: [CommonModule, RouterLink],
  templateUrl: './news-section.component.html',
  styleUrl: './news-section.component.scss'
})
export class NewsSectionComponent implements OnInit {

  // Danh sách các danh mục để lọc
  categories = ['Tất cả', 'Hoạt động nổi bật', 'Tin hội viên', 'Sự kiện sắp tới'];
  
  // Biến theo dõi danh mục đang được chọn
  selectedCategory: string = 'Tất cả';

  // Mảng chứa các bài viết đã được lọc để hiển thị
  filteredNews: any[] = [];

  // Mảng chứa tất cả các bài viết
  allNews = [
    {
      id: 1,
      title: 'Việt Nam - Campuchia thúc đẩy hợp tác công nghiệp và thương mại',
      excerpt: 'Việt Nam và Campuchia đã thống nhất một số biện pháp nhằm thúc đẩy hợp tác...',
      image: 'https://vcba.biz/wp-content/uploads/2024/03/ho-p-ta-c-20231212154505-1.jpg',
      category: 'Hoạt động nổi bật',
      date: '15/12/2023',
      link: '/news-detail'
    },
    {
      id: 2,
      title: 'Hội nghị thường niên VCBA lần thứ 10',
      excerpt: 'Hội nghị thường niên VCBA diễn ra tại Phnom Penh với sự tham dự của hơn 200 doanh nghiệp...',
      image: 'https://vcba.biz/wp-content/uploads/2024/03/sl1.jpg',
      category: 'Sự kiện sắp tới',
      date: '05/03/2024',
      link: '/news-detail'
    },
    {
      id: 3,
      title: 'Metfone - Nhà mạng viễn thông lớn nhất Campuchia',
      excerpt: 'Viettel Cambodia với thương hiệu Metfone hoạt động từ năm 2009 và hiện là nhà mạng số 1...',
      image: 'https://vcba.biz/wp-content/uploads/2024/03/Metfone-300x189.png',
      category: 'Tin hội viên',
      date: '20/02/2024',
      link: '/news-detail'
    },
    {
      id: 4,
      title: 'Gala dinner kết nối doanh nghiệp Việt-Campuchia',
      excerpt: 'Chương trình gala dinner thường niên tạo cơ hội kết nối và giao lưu giữa các doanh nghiệp...',
      image: 'https://vcba.biz/wp-content/uploads/2024/03/sl3.jpg',
      category: 'Sự kiện sắp tới',
      date: '18/03/2024',
      link: '/news-detail'
    },
    {
      id: 5,
      title: 'VCBA thăm và làm việc tại Đại sứ quán Việt Nam',
      excerpt: 'Đoàn công tác của Hiệp hội Doanh nghiệp Việt Nam tại Campuchia đã có buổi làm việc quan trọng...',
      image: 'https://vcba.biz/wp-content/uploads/2024/03/ttxvn-1601-vn-campuchia-1-8424.jpg-300x198.webp',
      category: 'Hoạt động nổi bật',
      date: '16/01/2024',
      link: '/news-detail'
    },
    {
      id: 6,
      title: 'Sacombank Cambodia nhận giải thưởng uy tín',
      excerpt: 'Ngân hàng Sacombank chi nhánh Campuchia vinh dự nhận giải thưởng Ngân hàng bán lẻ tốt nhất...',
      image: 'https://via.placeholder.com/400x250.png/007bff/FFFFFF?text=Sacombank',
      category: 'Tin hội viên',
      date: '25/03/2024',
      link: '/news-detail'
    }
  ];

  ngOnInit() {
    // Ban đầu, hiển thị tất cả bài viết
    this.filterNews('Tất cả');
  }

  // Hàm để lọc tin tức theo danh mục được chọn
  filterNews(category: string) {
    this.selectedCategory = category;
    if (category === 'Tất cả') {
      this.filteredNews = this.allNews;
    } else {
      this.filteredNews = this.allNews.filter(news => news.category === category);
    }
  }
} 