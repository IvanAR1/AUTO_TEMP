import { Injectable } from '@angular/core';
import { firstValueFrom } from 'rxjs'; //Procedimientos dentro del pipe
import { ResponseLoginInterface } from 'src/app/models/ResponseLogin.interface';
import { HttpClient } from '@angular/common/http'; //Necesario para capturar errores en Login
import { environment } from 'src/environments/environment';
import { LoginInterface } from 'src/app/models/Login.interface';


@Injectable({
  providedIn: 'root'
})
export abstract class ResponseService{

  constructor(private HttpClient:HttpClient){ }
  me:ResponseLoginInterface = new ResponseLoginInterface()

  Me$()
  {
    return this.HttpClient.get<ResponseLoginInterface>(this.RouterAPI('me'))
  }

  Logout$()
  {
    return this.HttpClient.post<ResponseLoginInterface>(this.RouterAPI('logout'),{})
  }

  CheckToken$():Promise<LoginInterface>
  {
    return firstValueFrom(this.HttpClient.post<LoginInterface>(this.RouterAPI('check'),{}))
  }
  
  private RouterAPI($route:string): string
  {
    return environment.ApiURL + 'auth/' + $route;
  }
}
