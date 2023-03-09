import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-sidenav',
  templateUrl: './sidenav.component.html',
  styleUrls: ['./sidenav.component.scss']
})
export class SidenavComponent implements OnInit {

  constructor() { }

  ngOnInit(): void {
  }

  sidebarLinks:any[] = [
    {label:'Inicio', link:'/index', icon:'bi-house'},
    {label:'Dashboard', link:'/dashboard', icon:'bi-speedometer'},
    {label:'Mensages', link:'/messages', icon:'bi-chat-square', messages:'02'},
    {label:'Servicios', link:'/services', icon:'bi-envelope-paper'},
    {label:'Customizaciones', link:'/customizations', icon:'bi-person-gear'}
  ]

}
