import { Component, OnInit } from '@angular/core';
import { DataService } from "./../data.service";

@Component({
  moduleId: module.id,
  selector: 'app-input',
  templateUrl: 'input.component.html',
  styleUrls: ['input.component.css'],
})
export class InputComponent implements OnInit {
  inputModel: string;
  
  onClickMe() {
    this.dataService.data.push(this.inputModel);
    console.log(this.dataService);
  }

  constructor(public dataService: DataService) { }

  ngOnInit() {
  }
  
}
