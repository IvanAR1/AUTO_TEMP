import { Injectable } from '@angular/core';
import { ActivatedRouteSnapshot, CanActivateChild, Router, RouterStateSnapshot, UrlTree } from '@angular/router';
import { SessionStorageService } from '../services/local/session-storage.service';
import { ResponseService } from '../services/api/response.service';

@Injectable({
  providedIn: 'root'
})

export class CheckGuard implements CanActivateChild {

  constructor(private readonly ResponseSrv:ResponseService,
              private readonly Session:SessionStorageService,
              private router:Router
    ){}

  async canActivateChild(
    route: ActivatedRouteSnapshot,
    state: RouterStateSnapshot) {
    
    console.log('Auth guard is worked!');
    if(!this.Session.getToken())
    {
      this.Session.destroyToken()
      this.router.navigate(['/login'])
    }
    let Refresh = await this.ResponseSrv.CheckToken$()
    if(Refresh.message != 'Token válido')
    {
      this.Session.destroyToken()
      this.router.navigate(['/login'])
    }
    return true;
  }
  
}
