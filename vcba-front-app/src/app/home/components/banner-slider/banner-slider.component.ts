import { Component, OnInit, AfterViewInit, OnDestroy } from '@angular/core';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-banner-slider',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './banner-slider.component.html',
  styleUrl: './banner-slider.component.scss'
})
export class BannerSliderComponent implements OnInit, AfterViewInit, OnDestroy {
  slides = [
    {
      id: 1,
      image: 'https://vcba.biz/wp-content/uploads/2024/03/sl5.jpg',
      alt: 'VCBA Hoạt động 1'
    },
    {
      id: 2,
      image: 'https://vcba.biz/wp-content/uploads/2024/03/sl1.jpg',
      alt: 'VCBA Hoạt động 2'
    },
    {
      id: 3,
      image: 'https://vcba.biz/wp-content/uploads/2024/03/sl3.jpg',
      alt: 'VCBA Hoạt động 3'
    },
    {
      id: 3,
      image: 'https://vcba.biz/wp-content/uploads/2024/03/sl3.jpg',
      alt: 'VCBA Hoạt động 3'
    }
  ];

  currentSlide = 0;
  autoTimer: any;

  ngOnInit() {
    // Component initialization
  }

  ngAfterViewInit() {
    this.startAutoSlide();
  }

  ngOnDestroy() {
    if (this.autoTimer) {
      clearInterval(this.autoTimer);
    }
  }

  setSlide(index: number) {
    this.currentSlide = index;
    this.resetTimer();
  }

  nextSlide() {
    this.currentSlide = (this.currentSlide + 1) % this.slides.length;
    this.resetTimer();
  }

  prevSlide() {
    this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
    this.resetTimer();
  }

  startAutoSlide() {
    this.resetTimer();
  }

  resetTimer() {
    if (this.autoTimer) {
      clearInterval(this.autoTimer);
    }
    
    this.autoTimer = setInterval(() => {
      this.nextSlide();
    }, 5000);
  }

  onMouseEnter() {
    if (this.autoTimer) {
      clearInterval(this.autoTimer);
    }
  }

  onMouseLeave() {
    this.resetTimer();
  }
} 