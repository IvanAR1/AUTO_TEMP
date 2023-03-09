import { Component, OnInit} from '@angular/core'; //Defecto de Angular
import { ToastrService } from 'ngx-toastr'; //Notificaciones
import {FormGroup,FormControl,Validators} from '@angular/forms'; //Importaciones en vista necesarias para el Login
import { LoginInterface } from 'src/app/models/Login.interface';  //Importaciones de las interface
import { Router } from '@angular/router'; //Redirige
import { LoginService } from 'src/app/services/api/login.service';
import { SessionStorageService } from 'src/app/services/local/session-storage.service';
import Swal from 'sweetalert2/dist/sweetalert2.js'; //SweetAlert2
import { firstValueFrom } from 'rxjs';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {

  constructor(private Session:SessionStorageService,
              private isAuthSrv:LoginService,
              private toastr: ToastrService,
              private router:Router) { }

  //Variables necesarias para visualizar password
  text_password:string = 'password';
  icon_password:string = 'bi-eye-slash';

  //Variables necesarias para el Login
  LoginForm = new FormGroup({
    email: new FormControl('',[
      Validators.required,
      Validators.email,
    ]),
    password: new FormControl('', [
      Validators.required,
      Validators.minLength(8),
    ])
  }); //Array relacional con HTML

  ngOnInit(): void {
    if(this.Session.getToken() != null)
    {
      this.router.navigate(['/index']);
    }
  }

  //Método para visualizar password
  InputPassword()
  {
    switch(this.text_password)
    {
      case this.text_password = 'password':
        this.text_password = 'text';
        this.icon_password = 'bi-eye';
        break;
      case this.text_password = 'text':
        this.text_password = 'password';
        this.icon_password = 'bi-eye-slash'
        break;
      default:
        this.text_password = 'password';
        this.icon_password = 'bi-eye-slash'
      break;
    }
  }

  //Conseguir errores del formulario
  get EmailError()
  {
    return this.LoginForm.get('email');
  }
  get PasswordError()
  {
    return this.LoginForm.get('password');
  }

  /* Procedimiento para mandar datos a Login y recibirlos */
  onLogin(form:LoginInterface)
  {
    if(this.LoginForm.valid)
    {
      firstValueFrom(this.isAuthSrv.loginByEmail(form)).then(res => {
          this.Session.setToken(res?.access_token);
          Swal.fire({
            title: 'Correcto',
            icon: 'success',
            text: 'Se ha ingresado correctamente',
            confirmButtonText:'Ok',
            allowOutsideClick:false
          }).then((result) => {
            if (result.value || !result)
            {
              this.router.navigate(['/index']);
            }
          })
        }
        ).catch(err => 
            this.toastr.error(err.error.message, 'Código de error: ' + err.error.code)
          );
    }else
    { 
      this.toastr.error('Correo y/o contraseñas no válidos', 'Error');
    }
  }
}
