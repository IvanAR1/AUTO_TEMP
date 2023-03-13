import { Component, OnInit } from '@angular/core';
import { SpinnerService } from 'src/app/services/local/spinner.service';

@Component({
  selector: 'app-spinner',
  templateUrl: './spinner.component.html',
  styleUrls: ['./spinner.component.scss']
})
export class SpinnerComponent implements OnInit {

  isLoading$ = this.SpinnerSrv.isLoading$
  constructor(private readonly SpinnerSrv:SpinnerService) { }

  ngOnInit(): void {
  }

}
