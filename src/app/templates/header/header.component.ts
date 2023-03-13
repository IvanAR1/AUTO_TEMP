import { Component, OnInit } from '@angular/core';
import { delay, firstValueFrom } from 'rxjs'; //Procedimientos dentro del pipe
import { ResponseLoginInterface } from 'src/app/models/ResponseLogin.interface';
import { ResponseService } from 'src/app/services/api/response.service';
import { SessionStorageService } from 'src/app/services/local/session-storage.service';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { Router } from '@angular/router';
import { ToastrService } from 'ngx-toastr';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
export class HeaderComponent implements OnInit {
  constructor(private readonly ResponseSrv:ResponseService,
              private readonly Session:SessionStorageService,
              private toastr: ToastrService,
              private router:Router)
              { }
  
  me:ResponseLoginInterface = this.ResponseSrv.me
  ngOnInit(): void {
    this.Me()
  }

  async Me()
  {
     const me = await firstValueFrom(this.ResponseSrv.Me$());
     return this.me = me
  }

  Logout()
  {
    return firstValueFrom(this.ResponseSrv.Logout$()).then(res => {
      this.Session.destroyToken();
      var audplay = new Audio('assets/sounds/Notify.wav');
      audplay.play();
      delay(50);
      setTimeout(()=>
      {
        Swal.fire({
          title: 'Correcto',
          icon: 'success',
          text: res.message,
          confirmButtonText:'Ok',
          allowOutsideClick:false,
        }).then((result) => {
          if (result.value || !result)
          {
            this.router.navigate(['/login']);
          }
        })
      },1000);
    }
    ).catch(err => 
        this.toastr.error(err.error.error, 'Código de error: ' + err.status)
    );
  }

}
