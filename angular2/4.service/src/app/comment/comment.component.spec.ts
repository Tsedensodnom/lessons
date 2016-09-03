/* tslint:disable:no-unused-variable */

import { By }           from '@angular/platform-browser';
import { DebugElement } from '@angular/core';
import { addProviders, async, inject } from '@angular/core/testing';
import { CommentComponent } from './comment.component';

describe('Component: Comment', () => {
  it('should create an instance', () => {
    let component = new CommentComponent();
    expect(component).toBeTruthy();
  });
});
