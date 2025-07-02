import { Component, OnInit, OnDestroy } from '@angular/core';
import { ActivatedRoute, Router, RouterLink } from '@angular/router';
import { LoadingSpinner } from '../../shared/loading-spinner/loading-spinner';
import { CommonModule } from '@angular/common';
import { NewsService, NewsArticle } from '../../core/services/news.service';
import { TranslateModule, TranslateService } from '@ngx-translate/core';
import { Subscription } from 'rxjs';
import { switchMap } from 'rxjs/operators';

@Component({
  selector: 'app-news-detail',
  standalone: true,
  imports: [RouterLink, LoadingSpinner, CommonModule, TranslateModule],
  templateUrl: './news-detail.html',
  styleUrl: './news-detail.scss'
})
export class NewsDetail implements OnInit, OnDestroy {
  isLoading: boolean = true;
  contentVisible: boolean = false;
  article: NewsArticle | undefined;
  relatedArticles: NewsArticle[] = [];
  
  private routeSub: Subscription | undefined;

  constructor(
    private route: ActivatedRoute,
    private router: Router,
    private newsService: NewsService,
    public translate: TranslateService
  ) {}

  ngOnInit() {
    window.scrollTo(0, 0);

    this.routeSub = this.route.paramMap.pipe(
      switchMap(params => {
        const slug = params.get('slug');
        if (!slug) {
          this.router.navigate([this.translate.currentLang, 'news']);
          return [];
        }
        this.isLoading = true;
        this.contentVisible = false;
        // Fetch related articles first
        this.newsService.getRelatedArticles(slug).subscribe(articles => {
          this.relatedArticles = articles;
        });
        // Then fetch the main article
        return this.newsService.getArticleBySlug(slug);
      })
    ).subscribe(article => {
      if (article) {
        this.article = article;
        this.isLoading = false;
        setTimeout(() => {
          this.contentVisible = true;
        }, 50); // a small delay for smoother transition
      } else {
        // Handle case where article is not found
        this.router.navigate([this.translate.currentLang, 'news']);
      }
    });
  }

  ngOnDestroy() {
    if (this.routeSub) {
      this.routeSub.unsubscribe();
    }
  }
}
