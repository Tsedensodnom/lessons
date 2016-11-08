import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpModule, JsonpModule } from '@angular/http';
import { RouterModule }   from '@angular/router';

import { AppComponent } from './app.component';
import { DriverComponent } from './driver/driver.component';
import { VehicleComponent } from './vehicle/vehicle.component';
import { DashboardComponent } from './dashboard/dashboard.component';
import { PageNotFoundComponent } from './page-not-found/page-not-found.component';

import { VehicleService } from './vehicle.service';

import 'rxjs/add/operator/map';
import 'rxjs/add/operator/toPromise';
import 'rxjs/add/operator/catch';

@NgModule({
  declarations: [
    AppComponent,
    DriverComponent,
    VehicleComponent,
    DashboardComponent,
    PageNotFoundComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpModule,
    JsonpModule,
    RouterModule.forRoot([
      { path: '', component: DashboardComponent },
      { path: 'vehicles', component: VehicleComponent },
      { path: 'drivers', component: DriverComponent },
      { path: '**', component: PageNotFoundComponent }
    ])
  ],
  providers: [
    VehicleService,
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
