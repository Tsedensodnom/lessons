import { Component, OnInit } from '@angular/core';
import { DataService } from "./../data.service";
import { Todo } from "./../todo";

@Component({
  moduleId: module.id,
  selector: 'app-list',
  templateUrl: 'list.component.html',
  styleUrls: ['list.component.css'],
})
export class ListComponent implements OnInit {
  
  onRemove(item: Todo) {
    let index = this.dataService.data.indexOf(item);
    this.dataService.data.splice(index, 1);
  }
  
  constructor(public dataService: DataService) { 
  }

  ngOnInit() {
  }

}
