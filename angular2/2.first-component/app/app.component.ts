import { Component } from '@angular/core';
import { List } from "./components/list";

@Component({
    selector: 'my-app',
    directives: [ List ],
    template: 'Hello<br><list></list>',
})
export class AppComponent { }