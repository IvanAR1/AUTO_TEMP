import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class SessionStorageService {

  constructor() { }
  setToken(Token:any):void
  {
    return sessionStorage.setItem("token", Token);
  }

  getToken()
  {
    return sessionStorage.getItem("token");
  }
  destroyToken()
  {
    return sessionStorage.removeItem("token");
  }
}
