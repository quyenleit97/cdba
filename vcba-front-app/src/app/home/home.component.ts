import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { BannerSliderComponent } from './components/banner-slider/banner-slider.component';
import { AboutSectionComponent } from './components/about-section/about-section.component';
import { NewsSectionComponent } from './components/news-section/news-section.component';

@Component({
  selector: 'app-home',
  standalone: true,
  imports: [
    CommonModule,
    BannerSliderComponent,
    AboutSectionComponent,
    NewsSectionComponent
  ],
  templateUrl: './home.component.html',
  styleUrl: './home.component.scss'
})
export class HomeComponent {
  title = 'Trang chủ - VCBA';
} 