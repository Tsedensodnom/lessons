import { Component, OnInit } from '@angular/core';
import { DataService } from "./../data.service";

@Component({
  moduleId: module.id,
  selector: 'app-list',
  templateUrl: 'list.component.html',
  styleUrls: ['list.component.css'],
})
export class ListComponent implements OnInit {
  text: string = "List component";

  constructor(public dataService: DataService) { 
  }

  ngOnInit() {
  }

}
