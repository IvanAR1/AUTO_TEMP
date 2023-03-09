import { Component, OnInit } from '@angular/core';
import { MonitorsInterface } from 'src/app/models/Data.interface';
import { MonitorsService } from 'src/app/services/api/monitors.service';
import { firstValueFrom } from 'rxjs'; //Procedimientos dentro del pipe

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.scss']
})
export class IndexComponent implements OnInit {

  constructor(private monitors$:MonitorsService) { }

  ngOnInit(): void {
    this.getMonitors()
  }
  Monitors:MonitorsInterface[] = []
  totalRecords?:any;
  cols:any[] = []

  async getMonitors($event:any = []): Promise<MonitorsInterface[]>
  {
    let data = firstValueFrom(this.monitors$.get$($event.rows, ($event.first / $event.rows) + 1))
                      .then(res => {
                                    this.totalRecords = res.total;
                                    return <MonitorsInterface[]>res.data})
                      .then(data => {return data});
    this.cols = [
      {name:'ID', field:'id'},
      {name:'Marca de teléfono', field:'marca_tel'},
      {name:'Model de Teléfono', field:'modelo_tel'},
      {name:'Número de serie', field:'sn_tel'},
    ]
    return await data.then(monitors => {return this.Monitors = monitors})
  }

}
