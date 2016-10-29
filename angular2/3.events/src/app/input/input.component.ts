import { Component, OnInit } from '@angular/core';

@Component({
  moduleId: module.id,
  selector: 'app-input',
  templateUrl: 'input.component.html',
  styleUrls: ['input.component.css']
})
export class InputComponent implements OnInit {
  inputModel: string;
  
  onClickMe() {
    alert(this.inputModel);
  }

  constructor() { }

  ngOnInit() {
  }

}
