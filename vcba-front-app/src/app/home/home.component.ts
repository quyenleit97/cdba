import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { BannerSliderComponent } from './components/banner-slider/banner-slider.component';
import { NewsSectionComponent } from './components/news-section/news-section.component';

@Component({
  selector: 'app-home',
  standalone: true,
  imports: [CommonModule, BannerSliderComponent, NewsSectionComponent],
  templateUrl: './home.component.html',
  styleUrl: './home.component.scss'
})
export class HomeComponent {
  title = 'Trang chủ - VCBA';
  aboutSections = [
    {
      title: 'Giới thiệu VCBA',
      paragraphs: [
        'Hiệp hội Doanh nghiệp Việt Nam tại Campuchia (VCBA) là tổ chức phi chính phủ được thành lập nhằm kết nối, hỗ trợ và thúc đẩy sự phát triển của cộng đồng doanh nghiệp Việt Nam tại Campuchia.',
        'Với sứ mệnh tạo dựng một cộng đồng doanh nghiệp mạnh mẽ, VCBA đóng vai trò là cầu nối quan trọng giữa các doanh nghiệp Việt Nam và thị trường Campuchia, góp phần thúc đẩy quan hệ hợp tác kinh tế giữa hai quốc gia.'
      ],
      imageUrl: 'https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=800&q=80',
      altText: 'Giới thiệu VCBA',
      layout: 'reverse'
    },
    {
      title: 'Lịch sử hình thành',
      paragraphs: [
        'VCBA được thành lập vào năm 2015 với sự tham gia của các doanh nghiệp tiên phong người Việt tại Campuchia. Từ những bước đầu khiêm tốn, hiệp hội đã không ngừng phát triển và mở rộng quy mô hoạt động.',
        'Qua gần một thập kỷ hình thành và phát triển, VCBA đã trở thành tổ chức đại diện uy tín của cộng đồng doanh nghiệp Việt Nam tại Campuchia, với hơn 200 thành viên hoạt động trong nhiều lĩnh vực kinh tế khác nhau.'
      ],
      imageUrl: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=800&q=80',
      altText: 'Lịch sử hình thành',
      layout: 'normal'
    },
    {
      title: 'Vai trò và ý nghĩa',
      paragraphs: [
        'VCBA đóng vai trò quan trọng trong việc thúc đẩy hợp tác kinh tế Việt - Campuchia, tạo môi trường thuận lợi cho các doanh nghiệp Việt Nam phát triển bền vững tại thị trường Campuchia.',
        'Hiệp hội không chỉ là nơi kết nối các doanh nghiệp mà còn là cầu nối văn hóa, góp phần tăng cường tình hữu nghị và hợp tác toàn diện giữa hai dân tộc anh em Việt Nam - Campuchia.'
      ],
      imageUrl: 'https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=800&q=80',
      altText: 'Vai trò và ý nghĩa',
      layout: 'reverse'
    }
  ];

  members = [
    {
      name: 'Metfone',
      logoUrl: 'https://b2b-cambodia.com/storage/uploads/articles/large/eCD1qa1PSRIqYhK5wLbXbRMDOVnpzNDlaN5QUgdP.png',
      field: 'Viễn thông',
      profileUrl: '#'
    },
    {
      name: 'BIDV Cambodia',
      logoUrl: 'https://b2b-cambodia.com/storage/uploads/articles/large/eCD1qa1PSRIqYhK5wLbXbRMDOVnpzNDlaN5QUgdP.png',
      field: 'Tài chính - Ngân hàng',
      profileUrl: '#'
    },
    {
      name: 'Vietnam Airlines',
      logoUrl: 'https://b2b-cambodia.com/storage/uploads/articles/large/eCD1qa1PSRIqYhK5wLbXbRMDOVnpzNDlaN5QUgdP.png',
      field: 'Hàng không',
      profileUrl: '#'
    },
    {
      name: 'Angkor Milk',
      logoUrl: 'https://b2b-cambodia.com/storage/uploads/articles/large/eCD1qa1PSRIqYhK5wLbXbRMDOVnpzNDlaN5QUgdP.png',
      field: 'Thực phẩm & Đồ uống',
      profileUrl: '#'
    },
    {
      name: 'Sacombank Cambodia',
      logoUrl: 'https://b2b-cambodia.com/storage/uploads/articles/large/eCD1qa1PSRIqYhK5wLbXbRMDOVnpzNDlaN5QUgdP.png',
      field: 'Tài chính - Ngân hàng',
      profileUrl: '#'
    },
    {
      name: 'HAGL Agrico',
      logoUrl: 'https://b2b-cambodia.com/storage/uploads/articles/large/eCD1qa1PSRIqYhK5wLbXbRMDOVnpzNDlaN5QUgdP.png',
      field: 'Nông nghiệp',
      profileUrl: '#'
    }
  ];
} 