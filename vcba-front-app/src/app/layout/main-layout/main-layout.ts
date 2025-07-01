import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ActivatedRoute, NavigationEnd, Router, RouterOutlet, RouterModule } from '@angular/router';
import { filter, map, mergeMap } from 'rxjs/operators';
import { TranslateModule, TranslateService } from '@ngx-translate/core';

@Component({
  selector: 'app-main-layout',
  standalone: true,
  imports: [
    CommonModule,
    RouterOutlet,
    RouterModule,
    TranslateModule
  ],
  templateUrl: './main-layout.html',
  styleUrls: ['./main-layout.scss']
})
export class MainLayoutComponent implements OnInit {
  isHeaderStatic: boolean = false;

  menuItems = [
    { labelKey: 'menu.home', routerLink: '/home', exact: true },
    {
      labelKey: 'menu.about',
      routerLink: '/about',
      children: [
        { labelKey: 'menu.about.letter', routerLink: '/about/letter' },
        { labelKey: 'menu.about.rules', routerLink: '/about/rules' },
        { labelKey: 'menu.about.history', routerLink: '/about/history' },
        { labelKey: 'menu.about.awards', routerLink: '/about/awards' },
      ]
    },
    {
      labelKey: 'menu.organization',
      routerLink: '/organization',
      children: [
        { labelKey: 'menu.organization.chart', routerLink: '/organization/chart' },
        { labelKey: 'menu.organization.board', routerLink: '/organization/board' },
        { labelKey: 'menu.organization.executive', routerLink: '/organization/executive' },
      ]
    },
    { labelKey: 'menu.members', routerLink: '/news' },
    { labelKey: 'menu.register', routerLink: '/register' },
    { labelKey: 'menu.projects', routerLink: '/projects' },
    { labelKey: 'menu.legal', routerLink: '/legal' },
    { labelKey: 'menu.contact', routerLink: '/contact' },
  ];

  constructor(
    private router: Router, 
    private activatedRoute: ActivatedRoute,
    public translate: TranslateService
  ) {
    translate.addLangs(['vi', 'en', 'km']);
    translate.setDefaultLang('vi');

    const browserLang = translate.getBrowserLang();
    translate.use(browserLang?.match(/vi|en|km/) ? browserLang : 'vi');
  }

  ngOnInit() {
    this.router.events.pipe(
      filter(event => event instanceof NavigationEnd),
      map(() => this.activatedRoute),
      map(route => {
        while (route.firstChild) {
          route = route.firstChild;
        }
        return route;
      }),
      filter(route => route.outlet === 'primary'),
      mergeMap(route => route.data)
    ).subscribe(data => {
      this.isHeaderStatic = data['headerStatic'] === true;
    });
  }

  changeLanguage(lang: string) {
    this.translate.use(lang);
  }
}
