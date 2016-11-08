import { Component, OnInit } from '@angular/core';
import { VehicleService } from './../vehicle.service';
import { Vehicle } from './../vehicle';


@Component({
  selector: 'app-vehicle',
  templateUrl: './vehicle.component.html',
  styleUrls: ['./vehicle.component.css']
})
export class VehicleComponent implements OnInit {
	vehicles = [];
	errorMessage: string;
	model: Vehicle;
	isUpdating = false;

	constructor(private vehicleService: VehicleService) { }

	ngOnInit() {
		this.model = new Vehicle();
		this.vehicleService.getVehicles()
			.subscribe(
				vehicles => this.vehicles = vehicles,
				error =>  this.errorMessage = <any>error);
	}

	onSubmit() {
		this.isUpdating = true;
		this.vehicleService.save(this.model).subscribe(
			vehicle => {
				console.log(this.vehicles);
				if (!this.vehicles.some(e => e.id === vehicle.id)) {
					this.vehicles.push(vehicle);
				}
				this.model = new Vehicle();
				this.isUpdating = false;
			},
			error => {
				this.errorMessage = <any>error;
				this.isUpdating = false;
			}
		);
	}

	setNewModel() {
		this.model = new Vehicle();
	}

	onUpdate(vehicle: Vehicle) {
		this.model = vehicle;
	}

	onDelete(id:string) {
		this.vehicleService.delete(id).subscribe(
			id => {
				for (var i = this.vehicles.length - 1; i >= 0; i--) {
					if (this.vehicles[i].id == id) {
						this.vehicles.splice(i, 1);
					}
				}
			},
			error => {
				this.errorMessage = <any>error;
			}
		);
	}
}