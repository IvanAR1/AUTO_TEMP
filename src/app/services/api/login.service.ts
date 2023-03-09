import { Injectable } from '@angular/core';
import { LoginInterface } from 'src/app/models/Login.interface';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs'; //Procedimientos dentro del pipe
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class LoginService {

  constructor(private HttpClient:HttpClient) { }
  URLAPI:string = environment.ApiURL + 'auth/';

  //Procedimiento para mandar Recibir respuesta de Login
  loginByEmail(form:LoginInterface):Observable<LoginInterface>
  {
    let URLogin = this.URLAPI + 'login';
    const email = form.email;
    const password = form.password;
    return this.HttpClient.post<LoginInterface>(URLogin, {email, password});
  }
}
