import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule, PrincipalRouting } from './app-routing.module'; //Importaciones de app-routing
import { AppComponent } from './app.component';
import {ReactiveFormsModule, FormsModule} from '@angular/forms'; //Necesario para formulario del Login
import {HTTP_INTERCEPTORS, HttpClientModule} from '@angular/common/http'; //Necesario para mandar datos al backend
import { BrowserAnimationsModule } from '@angular/platform-browser/animations'; //Animaciones para toastr(notificaciones)
import { ToastrModule } from 'ngx-toastr';
import { SpinnerComponent } from './templates/spinner/spinner.component'; //Toastr(notificaciones de error)
import { SpinnerInterceptor } from './interceptors/spinner.interceptor';
import { TokenInterceptor } from './interceptors/token.interceptor';
import { TableModule } from 'primeng/table';
import { ButtonModule } from 'primeng/button';
import {PaginatorModule} from 'primeng/paginator';
import { SweetAlert2Module } from '@sweetalert2/ngx-sweetalert2';

@NgModule({
  declarations: [
    /* Declaraciones de app-routing */
    AppComponent,
    PrincipalRouting,
    SpinnerComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    
    /* Importaciones necesarias para Login */
    ReactiveFormsModule,
    FormsModule,
    HttpClientModule,
    BrowserAnimationsModule, // required animations module
    ToastrModule.forRoot(), //Required Toastr Notifications
    ButtonModule,
    TableModule,
    PaginatorModule,
    SweetAlert2Module.forRoot({
      provideSwal: () => import('sweetalert2/dist/sweetalert2.js')
    })
  ],
  providers: [
    {provide: HTTP_INTERCEPTORS, useClass: SpinnerInterceptor, multi:true},
    {provide: HTTP_INTERCEPTORS, useClass: TokenInterceptor, multi:true},
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
