import { Component, OnInit } from '@angular/core';
import { RouterLink } from '@angular/router';
import { LoadingSpinner } from '../../shared/loading-spinner/loading-spinner';
import { CommonModule } from '@angular/common';

// Define the structure for a news article
export interface NewsArticle {
  id: number;
  title: string;
  description: string;
  imageUrl: string;
  category: string;
  categoryName: string; // e.g., 'Hoạt động sự kiện'
  date: string;
  views: number;
  featured: boolean;
  link: string;
}

@Component({
  selector: 'app-news-page',
  standalone: true,
  imports: [RouterLink, LoadingSpinner, CommonModule],
  templateUrl: './news-page.html',
  styleUrl: './news-page.scss'
})
export class NewsPageComponent implements OnInit {
  isLoading: boolean = true;
  contentVisible: boolean = false;

  categories = [
    { value: 'all', name: 'Tất cả' },
    { value: 'hoat-dong', name: 'Hoạt động sự kiện' },
    { value: 'noi-bo', name: 'Hoạt động nội bộ' },
    { value: 'dau-tu', name: 'Đầu tư' },
    { value: 'hop-tac', name: 'Hợp tác' },
    { value: 'networking', name: 'Networking' }
  ];
  activeCategory: string = 'all';

  // Master list of all articles
  allArticles: NewsArticle[] = [
    {
      id: 1,
      title: 'VCBA tổ chức thành công Hội nghị thường niên 2024',
      description: 'Hội nghị thường niên VCBA 2024 đã diễn ra thành công với sự tham gia của hơn 200 đại biểu đại diện cho các doanh nghiệp Việt Nam tại Campuchia...',
      imageUrl: 'https://vcba.biz/wp-content/uploads/2024/03/sl5.jpg',
      category: 'hoat-dong',
      categoryName: 'Hoạt động sự kiện',
      date: '25/03/2024',
      views: 1247,
      featured: true,
      link: '/news-detail'
    },
    {
      id: 2,
      title: 'Gala dinner kết nối doanh nghiệp Việt-Campuchia',
      description: 'Chương trình gala dinner thường niên tạo cơ hội kết nối và giao lưu giữa các doanh nghiệp hai nước...',
      imageUrl: 'https://vcba.biz/wp-content/uploads/2024/03/sl1.jpg',
      category: 'networking',
      categoryName: 'Networking',
      date: '18/03/2024',
      views: 856,
      featured: false,
      link: '/news-detail'
    },
    {
      id: 3,
      title: 'Hội thảo về cơ hội đầu tư tại Campuchia',
      description: 'Hội thảo cung cấp thông tin chi tiết về môi trường đầu tư và các lĩnh vực tiềm năng tại Campuchia...',
      imageUrl: 'https://vcba.biz/wp-content/uploads/2024/03/sl3.jpg',
      category: 'dau-tu',
      categoryName: 'Đầu tư',
      date: '15/03/2024',
      views: 723,
      featured: false,
      link: '/news-detail'
    },
    {
      id: 4,
      title: 'Nhiều dư địa cho doanh nghiệp Việt Nam đầu tư kinh doanh tại Campuchia',
      description: 'Đại sứ quán Việt Nam tại Campuchia tổ chức hội nghị gặp gỡ doanh nghiệp nhằm tạo điều kiện cho các doanh nghiệp mở rộng hoạt động...',
      imageUrl: 'https://vcba.biz/wp-content/uploads/2024/03/ttxvn-1601-vn-campuchia-1-8424.jpg-300x198.webp',
      category: 'dau-tu',
      categoryName: 'Đầu tư',
      date: '12/03/2024',
      views: 1089,
      featured: false,
      link: '/news-detail'
    },
    {
      id: 5,
      title: 'Metfone - Nhà mạng viễn thông lớn nhất Campuchia',
      description: 'Viettel Cambodia với thương hiệu Metfone hoạt động từ năm 2009 và hiện là nhà mạng số 1 tại Campuchia với hơn 6 triệu khách hàng...',
      imageUrl: 'https://vcba.biz/wp-content/uploads/2024/03/Metfone-300x189.png',
      category: 'networking', // Assuming this is a member's business
      categoryName: 'Networking',
      date: '10/03/2024',
      views: 945,
      featured: false,
      link: '/news-detail'
    },
     {
      id: 6,
      title: 'Thúc đẩy hợp tác thương mại Việt Nam - Campuchia',
      description: 'Nhiều cơ hội hợp tác trong các lĩnh vực nông nghiệp, công nghiệp chế biến, du lịch và dịch vụ giữa hai nước được mở ra...',
      imageUrl: 'https://vcba.biz/wp-content/uploads/2024/03/ho-p-ta-c-20231212154505-1.jpg',
      category: 'hop-tac',
      categoryName: 'Hợp tác',
      date: '08/03/2024',
      views: 678,
      featured: false,
      link: '/news-detail'
    },
    {
      id: 7,
      title: 'Hội thảo chuyên đề về xuất nhập khẩu',
      description: 'Hội thảo cung cấp thông tin về quy trình xuất nhập khẩu và các thủ tục hải quan tại Campuchia...',
      imageUrl: 'https://vcba.biz/wp-content/uploads/2024/03/sl5.jpg',
      category: 'noi-bo',
      categoryName: 'Hoạt động nội bộ',
      date: '28/02/2024',
      views: 389,
      featured: false,
      link: '/news-detail'
    }
  ];

  // Articles to be displayed in the template
  featuredArticle: NewsArticle | undefined;
  standardArticles: NewsArticle[] = [];

  ngOnInit() {
    window.scrollTo(0, 0);
    this.filterArticles();
    
    setTimeout(() => {
      this.isLoading = false;
      setTimeout(() => this.contentVisible = true, 300);
    }, 800);
  }

  selectCategory(category: string): void {
    this.activeCategory = category;
    this.filterArticles();
  }

  filterArticles(): void {
    let filtered: NewsArticle[];
    if (this.activeCategory === 'all') {
      filtered = [...this.allArticles];
    } else {
      filtered = this.allArticles.filter(article => article.category === this.activeCategory);
    }
    
    // The first article in the filtered list is always the featured one
    this.featuredArticle = filtered.length > 0 ? filtered[0] : undefined;
    this.standardArticles = filtered.length > 1 ? filtered.slice(1) : [];
  }
}
