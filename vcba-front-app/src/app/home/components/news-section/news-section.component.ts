import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterLink } from '@angular/router';
import { allNewsData } from '../../../core/data/news.data';

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

  // Mảng chứa tất cả các bài viết (được import từ file riêng)
  allNews = allNewsData;

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