import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LoginComponent } from './views/login/login.component';
import { NotFoundComponent } from './views/not-found/not-found.component';
import { SecondaryRouting } from './views/views-routing.module';

const routes: Routes = [
  {path:"",redirectTo:"login",pathMatch:"full"},
  {path:"login", component:LoginComponent},
  {path:"", loadChildren:()=>import('./views/views.module').then(m=>m.ViewsModule)},
  {path:"**", component:NotFoundComponent}
  
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})

/* Exportar todas las rutas */
export class AppRoutingModule { }
export const PrincipalRouting = [LoginComponent, NotFoundComponent, SecondaryRouting];