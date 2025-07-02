import { Component, OnInit } from '@angular/core';
import { RouterLink } from '@angular/router';
import { LoadingSpinner } from '../../shared/loading-spinner/loading-spinner';
import { CommonModule } from '@angular/common';
import { TranslateModule, TranslateService } from '@ngx-translate/core';

// Define the structure for a news article
export interface NewsArticle {
  id: number;
  slug: string;
  titleKey: string;
  descriptionKey: string;
  imageUrl: string;
  category: string;
  categoryNameKey: string;
  date: string;
  views: number;
  featured: boolean;
}

@Component({
  selector: 'app-news-page',
  standalone: true,
  imports: [RouterLink, LoadingSpinner, CommonModule, TranslateModule],
  templateUrl: './news-page.html',
  styleUrl: './news-page.scss'
})
export class NewsPageComponent implements OnInit {
  isLoading: boolean = true;
  contentVisible: boolean = false;

  categories = [
    { value: 'all', nameKey: 'news.page.categories.all' },
    { value: 'hoat-dong', nameKey: 'news.page.categories.events' },
    { value: 'noi-bo', nameKey: 'news.page.categories.internal' },
    { value: 'dau-tu', nameKey: 'news.page.categories.investment' },
    { value: 'hop-tac', nameKey: 'news.page.categories.cooperation' },
    { value: 'networking', nameKey: 'news.page.categories.networking' }
  ];
  activeCategory: string = 'all';

  // Master list of all articles
  allArticles: NewsArticle[] = [
    {
      id: 1,
      slug: 'vcba-annual-conference-2024',
      titleKey: 'news.page.article1.title',
      descriptionKey: 'news.page.article1.description',
      imageUrl: 'https://vcba.biz/wp-content/uploads/2024/03/sl5.jpg',
      category: 'hoat-dong',
      categoryNameKey: 'news.page.categories.events',
      date: '25/03/2024',
      views: 1247,
      featured: true,
    },
    {
      id: 2,
      slug: 'gala-dinner-vietnam-cambodia',
      titleKey: 'news.page.article2.title',
      descriptionKey: 'news.page.article2.description',
      imageUrl: 'https://vcba.biz/wp-content/uploads/2024/03/sl1.jpg',
      category: 'networking',
      categoryNameKey: 'news.page.categories.networking',
      date: '18/03/2024',
      views: 856,
      featured: false,
    },
    {
      id: 3,
      slug: 'investment-opportunities-seminar-cambodia',
      titleKey: 'news.page.article3.title',
      descriptionKey: 'news.page.article3.description',
      imageUrl: 'https://vcba.biz/wp-content/uploads/2024/03/sl3.jpg',
      category: 'dau-tu',
      categoryNameKey: 'news.page.categories.investment',
      date: '15/03/2024',
      views: 723,
      featured: false,
    },
    {
      id: 4,
      slug: 'vietnamese-enterprises-investment-opportunities-cambodia',
      titleKey: 'news.page.article4.title',
      descriptionKey: 'news.page.article4.description',
      imageUrl: 'https://vcba.biz/wp-content/uploads/2024/03/ttxvn-1601-vn-campuchia-1-8424.jpg-300x198.webp',
      category: 'dau-tu',
      categoryNameKey: 'news.page.categories.investment',
      date: '12/03/2024',
      views: 1089,
      featured: false,
    },
    {
      id: 5,
      slug: 'metfone-largest-telecom-operator-cambodia',
      titleKey: 'news.page.article5.title',
      descriptionKey: 'news.page.article5.description',
      imageUrl: 'https://vcba.biz/wp-content/uploads/2024/03/Metfone-300x189.png',
      category: 'networking',
      categoryNameKey: 'news.page.categories.networking',
      date: '10/03/2024',
      views: 945,
      featured: false,
    },
     {
      id: 6,
      slug: 'promoting-trade-cooperation-vietnam-cambodia',
      titleKey: 'news.page.article6.title',
      descriptionKey: 'news.page.article6.description',
      imageUrl: 'https://vcba.biz/wp-content/uploads/2024/03/ho-p-ta-c-20231212154505-1.jpg',
      category: 'hop-tac',
      categoryNameKey: 'news.page.categories.cooperation',
      date: '08/03/2024',
      views: 678,
      featured: false,
    },
    {
      id: 7,
      slug: 'workshop-on-import-export',
      titleKey: 'news.page.article7.title',
      descriptionKey: 'news.page.article7.description',
      imageUrl: 'https://vcba.biz/wp-content/uploads/2024/03/sl5.jpg',
      category: 'noi-bo',
      categoryNameKey: 'news.page.categories.internal',
      date: '28/02/2024',
      views: 389,
      featured: false,
    }
  ];

  // Articles to be displayed in the template
  featuredArticle: NewsArticle | undefined;
  standardArticles: NewsArticle[] = [];
  
  constructor(public translate: TranslateService) {}

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
