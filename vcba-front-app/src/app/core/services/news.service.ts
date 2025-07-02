import { Injectable } from '@angular/core';
import { of, Observable } from 'rxjs';
import { delay } from 'rxjs/operators';

export interface NewsArticle {
  id: number;
  slug: string;
  categoryKey: string;
  titleKey: string;
  date: string;
  authorKey: string;
  views: number;
  image: string;
  excerptKey: string;
  content: {
    type: 'paragraph' | 'heading' | 'list' | 'quote' | 'image';
    contentKey?: string;
    itemsKey?: string[];
    citeKey?: string;
    imageUrl?: string;
    altText?: string;
  }[];
  tags: string[];
}


@Injectable({
  providedIn: 'root'
})
export class NewsService {

  private articles: NewsArticle[] = [
    {
      id: 1,
      slug: 'vcba-annual-conference-2024',
      categoryKey: 'news.detail.category.event',
      titleKey: 'news.detail.article1.title',
      date: '2024-03-25',
      authorKey: 'news.detail.author.vcba',
      views: 1247,
      image: 'https://vcba.biz/wp-content/uploads/2024/03/sl5.jpg',
      excerptKey: 'news.detail.article1.excerpt',
      content: [
        { type: 'heading', contentKey: 'news.detail.article1.h2_1' },
        { type: 'paragraph', contentKey: 'news.detail.article1.p1' },
        { type: 'heading', contentKey: 'news.detail.article1.h3_1' },
        { type: 'list', itemsKey: [
            'news.detail.article1.li1_1',
            'news.detail.article1.li1_2',
            'news.detail.article1.li1_3',
            'news.detail.article1.li1_4'
        ]},
        { type: 'heading', contentKey: 'news.detail.article1.h2_2' },
        { type: 'quote', contentKey: 'news.detail.article1.q1', citeKey: 'news.detail.article1.q1_cite' },
        { type: 'paragraph', contentKey: 'news.detail.article1.p2' },
      ],
      tags: ['VCBA', 'Hội nghị thường niên', 'Doanh nghiệp Việt Nam', 'Campuchia']
    },
    // We can add more articles here later
  ];

  constructor() { }

  getArticleBySlug(slug: string): Observable<NewsArticle | undefined> {
    const article = this.articles.find(a => a.slug === slug);
    // Simulate API delay
    return of(article).pipe(delay(500));
  }

  getRelatedArticles(currentArticleSlug: string): Observable<NewsArticle[]> {
    const related = this.articles.filter(a => a.slug !== currentArticleSlug).slice(0, 3);
     // Simulate API delay
    return of(related).pipe(delay(500));
  }
} 