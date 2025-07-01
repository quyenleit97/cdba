import { Component, OnInit } from '@angular/core';
import { RouterLink } from '@angular/router';
import { LoadingSpinner } from '../../shared/loading-spinner/loading-spinner';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-news-detail',
  standalone: true,
  imports: [RouterLink, LoadingSpinner, CommonModule],
  templateUrl: './news-detail.html',
  styleUrl: './news-detail.scss'
})
export class NewsDetail implements OnInit {
  isLoading: boolean = true;
  contentVisible: boolean = false;
  
  ngOnInit() {
    // Scroll to top when component is initialized
    window.scrollTo(0, 0);
    
    // Simulate loading time and show content with smooth transition
    setTimeout(() => {
      this.isLoading = false;
      setTimeout(() => {
        this.contentVisible = true;
      }, 300); // Delay showing content until spinner fade out animation completes
    }, 800); // Simulate loading for 800ms
  }
}
