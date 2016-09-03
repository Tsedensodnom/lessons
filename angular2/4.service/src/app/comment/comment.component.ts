import { Component, OnInit } from '@angular/core';

@Component({
  moduleId: module.id,
  selector: 'app-comment',
  templateUrl: 'comment.component.html',
  styleUrls: ['comment.component.css']
})
export class CommentComponent implements OnInit {
  text: string;

  constructor() { }

  ngOnInit() {
  }
  
  onClick() {
    console.log(this.text);
  }

}
