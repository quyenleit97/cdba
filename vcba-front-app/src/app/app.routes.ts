import { Routes } from '@angular/router';
import { HomeComponent } from './home/home.component';
import { MainLayoutComponent } from './layout/main-layout/main-layout';
import { NewsDetail } from './pages/news-detail/news-detail';
import { NewsPageComponent } from './pages/news-page/news-page';

export const routes: Routes = [
  {
    path: '',
    component: MainLayoutComponent,
    children: [
      { path: '', component: HomeComponent },
      { path: 'home', component: HomeComponent },
      { path: 'news', component: NewsPageComponent, data: { headerStatic: true } },
      { path: 'news-detail', component: NewsDetail }
    ]
  },
  { path: '**', redirectTo: '' }
];
