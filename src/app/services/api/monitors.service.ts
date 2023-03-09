import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class MonitorsService {

  constructor(private HttpClient:HttpClient) { }


  public get$(size:number = 15 , page:number = 1)
  {
    return this.HttpClient.get<any>(this.RouterAPI(size, page));
  }

  private RouterAPI(size:number = 15, page:number = 1): string
  {
    return environment.ApiURL + 'auth/' + 'monitor:' + size  + '?page=' + page;
  }
}
