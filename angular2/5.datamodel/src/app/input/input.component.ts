import { Component, OnInit } from '@angular/core';
import { DataService } from "./../data.service";
import { Todo } from "./../todo";

@Component({
  moduleId: module.id,
  selector: 'app-input',
  templateUrl: 'input.component.html',
  styleUrls: ['input.component.css'],
})
export class InputComponent implements OnInit {
  todoModel: Todo = new Todo();
  
  onSubmit() {
    this.dataService.data.push(this.todoModel);
    console.log(this.dataService);
    
    this.todoModel = new Todo();
  }

  constructor(public dataService: DataService) { }

  ngOnInit() {
  }
  
}
