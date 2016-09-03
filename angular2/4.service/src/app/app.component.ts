import { Component } from '@angular/core';
import { CommentComponent } from "./comment";

@Component({
  moduleId: module.id,
  selector: 'app-root',
  directives: [ CommentComponent ],
  templateUrl: 'app.component.html',
  styleUrls: ['app.component.css']
})
export class AppComponent {
  title = 'app works!';
}
