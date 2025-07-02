import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterLink } from '@angular/router';
import { allNewsData } from '../../../core/data/news.data';
import { TranslateModule } from '@ngx-translate/core';

@Component({
  selector: 'app-news-section',
  standalone: true,
  imports: [CommonModule, RouterLink, TranslateModule],
  templateUrl: './news-section.component.html',
  styleUrl: './news-section.component.scss'
})
export class NewsSectionComponent implements OnInit {

  // Danh sách các danh mục để lọc
  categories = [
    { key: 'home.news.categories.all', value: 'Tất cả' },
    { key: 'home.news.categories.featured', value: 'Hoạt động nổi bật' },
    { key: 'home.news.categories.member', value: 'Tin hội viên' },
    { key: 'home.news.categories.upcoming', value: 'Sự kiện sắp tới' }
  ];
  
  // Biến theo dõi danh mục đang được chọn
  selectedCategoryValue: string = 'Tất cả';

  // Mảng chứa các bài viết đã được lọc để hiển thị
  filteredNews: any[] = [];

  // Mảng chứa tất cả các bài viết (được import từ file riêng)
  allNews = allNewsData;

  ngOnInit() {
    // Ban đầu, hiển thị tất cả bài viết
    this.filterNews(this.categories[0]);
  }

  // Hàm để lọc tin tức theo danh mục được chọn
  filterNews(category: { key: string, value: string }) {
    this.selectedCategoryValue = category.value;
    if (category.value === 'Tất cả') {
      this.filteredNews = this.allNews;
    } else {
      this.filteredNews = this.allNews.filter(news => news.category === category.value);
    }
  }
} 