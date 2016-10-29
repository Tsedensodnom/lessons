import { Component } from '@angular/core';
import { InputComponent } from "./input";
import { ListComponent } from "./list";
import { DataService } from "./data.service";

@Component({
  moduleId: module.id,
  selector: 'app-root',
  directives: [ InputComponent, ListComponent],
  templateUrl: 'app.component.html',
  styleUrls: ['app.component.css'],
  providers: [ DataService ],
})
export class AppComponent {
  title = 'Todo list';
}
