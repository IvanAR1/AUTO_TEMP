import { Injectable } from '@angular/core';
import {
  HttpRequest,
  HttpHandler,
  HttpEvent,
  HttpInterceptor,
  HttpHeaders,
  HttpErrorResponse
} from '@angular/common/http';
import { Observable, catchError, throwError } from 'rxjs';
import { SessionStorageService } from '../services/local/session-storage.service';
import { Router } from '@angular/router';

@Injectable()
export class TokenInterceptor implements HttpInterceptor {

  constructor(private session:SessionStorageService, private router:Router) {}

  intercept(request: HttpRequest<unknown>, next: HttpHandler): Observable<HttpEvent<unknown>> {
    if(!this.session.getToken())
    {
      this.session.destroyToken();
      this.router.navigate(['/login'])
      return next.handle(request);
    }
    let auth_token = this.session.getToken();
    let headers = new HttpHeaders({
      'Content-Type': 'application/json',
      'Authorization': `Bearer ${auth_token}`
    })
    const reqClone = request.clone({headers});
    return next.handle(reqClone).pipe(
      catchError(this.HTTPError)
    );
  }

  HTTPError(err:HttpErrorResponse)
  {
    return throwError('Error de acceso');
  }
}
