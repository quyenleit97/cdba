import { Routes } from '@angular/router';
import { HomeComponent } from './home/home.component';
import { MainLayoutComponent } from './layout/main-layout/main-layout';
import { NewsDetail } from './pages/news-detail/news-detail';
import { NewsPageComponent } from './pages/news-page/news-page';

export const routes: Routes = [
  {
    path: ':lang',
    component: MainLayoutComponent,
    children: [
      { path: '', component: HomeComponent },
      { path: 'home', component: HomeComponent },
      { path: 'news', component: NewsPageComponent, data: { headerStatic: true } },
      { path: 'news/:slug', component: NewsDetail },

      // Temporary routes, pointing to HomeComponent
      { path: 'about', component: HomeComponent },
      { path: 'organization', component: HomeComponent },
      { path: 'register', component: HomeComponent },
      { path: 'projects', component: HomeComponent },
      { path: 'legal', component: HomeComponent },
      { path: 'contact', component: HomeComponent },

      // Temporary child routes for 'about'
      { path: 'about/letter', component: HomeComponent },
      { path: 'about/rules', component: HomeComponent },
      { path: 'about/history', component: HomeComponent },
      { path: 'about/awards', component: HomeComponent },

      // Temporary child routes for 'organization'
      { path: 'organization/chart', component: HomeComponent },
      { path: 'organization/board', component: HomeComponent },
      { path: 'organization/executive', component: HomeComponent },

      // Temporary footer routes
      { path: 'privacy', component: HomeComponent },
      { path: 'terms', component: HomeComponent },
      { path: 'sitemap', component: HomeComponent },
    ]
  },
  { path: '', redirectTo: 'vi', pathMatch: 'full' },
  { path: '**', redirectTo: 'vi' }
];
