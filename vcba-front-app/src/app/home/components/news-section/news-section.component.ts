import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterLink } from '@angular/router';
import { allNewsData } from '../../../core/data/news.data';
import { TranslateModule, TranslateService } from '@ngx-translate/core';

@Component({
  selector: 'app-news-section',
  standalone: true,
  imports: [CommonModule, RouterLink, TranslateModule],
  templateUrl: './news-section.component.html',
  styleUrl: './news-section.component.scss'
})
export class NewsSectionComponent implements OnInit {

  categories = [
    { key: 'home.news.categories.all', value: 'all' },
    { key: 'home.news.categories.featured', value: 'home.news.categories.featured' },
    { key: 'home.news.categories.member', value: 'home.news.categories.member' },
    { key: 'home.news.categories.upcoming', value: 'home.news.categories.upcoming' }
  ];
  
  selectedCategoryValue: string = 'all';

  filteredNews: any[] = [];
  allNews = allNewsData;

  constructor(public translate: TranslateService) {}

  ngOnInit() {
    // Initial filter
    this.filterNews(this.categories[0]);
    
    // Subscribe to language changes to re-filter
    this.translate.onLangChange.subscribe(() => {
      // Find the currently selected category object to pass to filterNews
      const currentCategory = this.categories.find(c => c.value === this.selectedCategoryValue) || this.categories[0];
      this.filterNews(currentCategory);
    });
  }

  filterNews(category: { key: string, value: string }) {
    this.selectedCategoryValue = category.value;
    if (category.value === 'all') {
      this.filteredNews = this.allNews;
    } else {
      this.filteredNews = this.allNews.filter(news => news.categoryKey === category.value);
    }
  }
} 