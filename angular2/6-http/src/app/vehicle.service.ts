import { Injectable } from '@angular/core';
import { Http, Response } from '@angular/http';
import { Observable } from 'rxjs/Observable';
import { Headers, RequestOptions } from '@angular/http';

import { Vehicle } from './vehicle';

@Injectable()
export class VehicleService {
	private baseUrl = 'http://localhost:4567/lessons/api/auto-rent/public/vehicle';

	constructor(private http: Http) { }

	getVehicles (): Observable<Vehicle[]> {
		return this.http.get(this.baseUrl)
			.map(this.extractData)
			.catch(this.handleError);
	}

	save(vehicle: Vehicle) {
		let headers = new Headers({ 'Content-Type': 'application/json' });
		let options = new RequestOptions({ headers: headers });
		if (vehicle.id == null) {
			return this.http.post(this.baseUrl, vehicle, options)
				.map(this.extractData)
				.catch(this.handleError);
		} else {
			return this.http.put(`${this.baseUrl}/${vehicle.id}`, vehicle, options)
				.map(this.extractData)
				.catch(this.handleError);
		}
	}

	delete(id: string) {
		return this.http.delete(`${this.baseUrl}/${id}`)
			.map(this.extractData)
			.catch(this.handleError);
	}

	private extractData(res: Response) {
		let body = res.json();
		return body.data || { };
	}

	private handleError (error: Response | any) {
		let errMsg: string;
		if (error instanceof Response) {
			const body = error.json() || '';
			const err = body.error || JSON.stringify(body);
			errMsg = `${error.status} - ${error.statusText || ''} ${err}`;
		} else {
			errMsg = error.message ? error.message : error.toString();
		}
		console.error(errMsg);
		return Observable.throw(errMsg);
	}
}
