import { Component } from '@angular/core';
import { InputComponent } from "./input";

@Component({
  moduleId: module.id,
  selector: 'app-root',
  directives: [ InputComponent ],
  templateUrl: 'app.component.html',
  styleUrls: ['app.component.css']
})
export class AppComponent {
  title = 'app works!';
}
