import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { BannerSliderComponent } from './components/banner-slider/banner-slider.component';
import { NewsSectionComponent } from './components/news-section/news-section.component';
import { TranslateModule } from '@ngx-translate/core';

@Component({
  selector: 'app-home',
  standalone: true,
  imports: [
    CommonModule, 
    BannerSliderComponent, 
    NewsSectionComponent,
    TranslateModule
  ],
  templateUrl: './home.component.html',
  styleUrl: './home.component.scss'
})
export class HomeComponent {
  title = 'Trang chủ - VCBA';
  aboutSections = [
    {
      titleKey: 'home.about.section1.title',
      paragraphKeys: [
        'home.about.section1.p1',
        'home.about.section1.p2'
      ],
      imageUrl: 'https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=800&q=80',
      altKey: 'home.about.section1.alt',
      layout: 'reverse'
    },
    {
      titleKey: 'home.about.section2.title',
      paragraphKeys: [
        'home.about.section2.p1',
        'home.about.section2.p2'
      ],
      imageUrl: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=800&q=80',
      altKey: 'home.about.section2.alt',
      layout: 'normal'
    },
    {
      titleKey: 'home.about.section3.title',
      paragraphKeys: [
        'home.about.section3.p1',
        'home.about.section3.p2'
      ],
      imageUrl: 'https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=800&q=80',
      altKey: 'home.about.section3.alt',
      layout: 'reverse'
    }
  ];

  members = [
    {
      name: 'Metfone',
      logoUrl: 'https://b2b-cambodia.com/storage/uploads/articles/large/eCD1qa1PSRIqYhK5wLbXbRMDOVnpzNDlaN5QUgdP.png',
      fieldKey: 'home.members.field.telecom',
      profileUrl: '#'
    },
    {
      name: 'BIDV Cambodia',
      logoUrl: 'https://b2b-cambodia.com/storage/uploads/articles/large/eCD1qa1PSRIqYhK5wLbXbRMDOVnpzNDlaN5QUgdP.png',
      fieldKey: 'home.members.field.finance',
      profileUrl: '#'
    },
    {
      name: 'Vietnam Airlines',
      logoUrl: 'https://b2b-cambodia.com/storage/uploads/articles/large/eCD1qa1PSRIqYhK5wLbXbRMDOVnpzNDlaN5QUgdP.png',
      fieldKey: 'home.members.field.aviation',
      profileUrl: '#'
    },
    {
      name: 'Angkor Milk',
      logoUrl: 'https://b2b-cambodia.com/storage/uploads/articles/large/eCD1qa1PSRIqYhK5wLbXbRMDOVnpzNDlaN5QUgdP.png',
      fieldKey: 'home.members.field.food',
      profileUrl: '#'
    },
    {
      name: 'Sacombank Cambodia',
      logoUrl: 'https://b2b-cambodia.com/storage/uploads/articles/large/eCD1qa1PSRIqYhK5wLbXbRMDOVnpzNDlaN5QUgdP.png',
      fieldKey: 'home.members.field.finance',
      profileUrl: '#'
    },
    {
      name: 'HAGL Agrico',
      logoUrl: 'https://b2b-cambodia.com/storage/uploads/articles/large/eCD1qa1PSRIqYhK5wLbXbRMDOVnpzNDlaN5QUgdP.png',
      fieldKey: 'home.members.field.agriculture',
      profileUrl: '#'
    }
  ];
} 