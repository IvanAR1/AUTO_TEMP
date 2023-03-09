import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { HeaderComponent } from '../templates/header/header.component';
import { SidenavComponent } from '../templates/sidenav/sidenav.component';
import { IndexComponent } from './index/index.component';
import { CheckGuard } from '../guards/check.guard';

const routes: Routes = [
  {path:'', component:HeaderComponent,  canActivateChild:[CheckGuard], children:
  [
    {path:'index', component:IndexComponent}
  ]}
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class ViewsRoutingModule { }
export const SecondaryRouting = [HeaderComponent, SidenavComponent, IndexComponent];