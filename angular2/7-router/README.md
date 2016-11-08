Angular2-ийн 6 дахь цуврал эхлэж байна :). Нийт цувралуудаар Auto-Rent буюу авто түрээсийн бүртгэл болон түрээсийн мэдээллийг зохицуулах апп хийх болно. 
Харин энэ удаагийн цувралаар:

1. HTTP Client
2. Хэрхэн API хийх талаар үзнэ.

*Хэрвээ бүрэн ажиллагааг нь сонирхох бол:* https://ebulan-angular2-autorent.herokuapp.com/vehicles
___
# HTTP Client
Angular2-д HTTP Client-ийг ашиглан серверээс(API) өгөгдөл авах, хадгалах зэрэг үйдлийг хийнэ (өөрөөр хэлбэл ```ajax request``` сервер рүү илгээх юм).

**Angular2 HTTP Client ашиглах**

**1. Angular2 CLI суулгах**
Angular2 CLI суулгасанаар ```Component, Service, App``` - ийг ганц коммандын тусламжтайгаар үүсгэх давуу талтай
```
npm install -g angular-cli
```
___
**2. Шинэ апп үүсгэх**
```
ng new helloworld
cd helloworld
```
Энэхүү коммандын үр дүнд ```helloworld``` нэртэй фолдер үүснэ.
```
  ...
  create package.json
  create public/.npmignore
  create tslint.json
  create typings.json
⠸ Installing packages for tooling via npm
```
Шинэ апп үүсгэж байх үед дээрхи текстэн дээр удаад байвал хэсэг хүлээгээрэй, учир нь үүсгэсэн шинэ аппд хэрэгтэй ```package```-уудыг суулгаж байгаа юм.

___
**3. Component үүсгэх**
```
ng g component Vehicle
```
Шинэ компонент үүсгэхэд доорхи файлууд цуг үүснэ. ```vehicle.component.html``` файл дотор тухайн компонентийн харагдац, ```vehicle.component.ts``` файл дотор компонентийн логик код бичигдэнэ.
```
installing component
  create src/app/vehicle/vehicle.component.css
  create src/app/vehicle/vehicle.component.html
  create src/app/vehicle/vehicle.component.spec.ts
  create src/app/vehicle/vehicle.component.ts
  create src/app/vehicle/index.ts
```
___
**4. Service үүсгэх**
```
ng g service Vehicle
```
```Vehicle Service```-ийн гол зорилго нь серверээс өгөгдөл авах болон хадгалах зэрэг үйлдлийг гүйцэтгэх юм. Харин сервис үүсгэсэнийхээ дараа модел(class) үүсгэх шаардлагатай.
```
ng g class Vehicle
```
```/src/app/vehicle.ts``` файл дотор ```Vehicle``` классын ```attribute```-уудыг тодорхойлно
```
export class Vehicle {
	id: string;
	plateNumber: string;
	model: string;
	manufacturer: string;
	year: number;
	type: string;
}
```
___
**5. HTTP ашиглан VehicleService бичих**
```
import { Injectable } from '@angular/core';
import { Http, Response } from '@angular/http';
import { Observable } from 'rxjs/Observable';
import { Headers, RequestOptions } from '@angular/http';

import { Vehicle } from './vehicle';

@Injectable()
export class VehicleService {
	private baseUrl = 'API_URL';

	constructor(private http: Http) { }

    //бүх Vehicle классын жагсаалтыг авах
	getVehicles (): Observable<Vehicle[]> {
		return this.http.get(this.baseUrl)
			.map(this.extractData)
			.catch(this.handleError);
	}

    //Шинэ Vehicle эсвэл хуучин Vehicle-ийн өгөгдөл хадгалах
	save(vehicle: Vehicle) {
		let headers = new Headers({ 'Content-Type': 'application/json' });
		let options = new RequestOptions({ headers: headers });
		if (vehicle.id == null) {
		    //Сервер рүү POST хүсэлт илгээх буюу шинэ өгөгдөл хадгалах
			return this.http.post(this.baseUrl, vehicle, options)
				.map(this.extractData)
				.catch(this.handleError);
		} else {
		    //Сервер рүү PUT хүсэлт илгээх буюу хуучин өгөгдлийн мэдээллийг засах
			return this.http.put(`${this.baseUrl}/${vehicle.id}`, vehicle, options)
				.map(this.extractData)
				.catch(this.handleError);
		}
	}

    //Өгөгдөл устгах
	delete(id: string) {
	    //Сервер рүү DELETE хүсэлт илгээх
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
```
Дээрхи кодонд ```VehicleService``` нь ```getVehicles, save, delete``` функцтай байх бөгөөд зорилгийг нь тайлбарлах шаардлагагүй байх гэж бодож байна :).
___
**6. Хэрэглээ**
Өгөгдлийн санд байгаа бүх машиний жагсаалтыг харъя гэвэл, ```/src/app/vehicle/vehicle.component.html``` файлд
```
<h2>Бүх машиний жагсаалт</h2>
<ul>
    <li*ngFor="let item of vehicles">
        {{ item.plateNumber }} - {{ item.manufacturer }} {{ item.model }} - {{ item.year }}
    </li>
</ul>
```
Харин ```/src/app/vehicle/vehicle.component.ts``` файл дотор
```
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

	constructor(private vehicleService: VehicleService) { }

	ngOnInit() {
		this.model = new Vehicle();
		this.vehicleService.getVehicles()
			.subscribe(
				vehicles => this.vehicles = vehicles,
				error =>  this.errorMessage = <any>error);
	}
}
```
кодыг бичиж өгнө. Эцэст нь ```/src/app/app.component.html``` файл дотор
```
<app-vehicle></app-vehicle>
```
```tag``` оруулаад болж байна :+1:
____
# Angular2 HTTP - д зориулан API бэлдэх
Энэхүү API-г [Lumen](https://lumen.laravel.com/) ашиглан хийсэн болно. Lumen нь Laravel-ийн микро хувилбар юм.
**1. Lumen project үүсгэх**
```
composer create-project --prefer-dist laravel/lumen api
cd api
```
Дээрхи коммандын үр дүнд ```/api``` нэртэй фолдер үүснэ.
___
**2. vluzrmos/lumen-cors package ашиглах**
```
composer require vluzrmos/lumen-cors 
```
```vluzrmos/lumen-cors``` суулгасаны дараа ```/app/bootstrap/app.php``` файл дотор доорхи кодыг ```return $app;```-аас өмнө бичиж хадгалана
```
$app->middleware([
    'Vluzrmos\LumenCors\CorsMiddleware'
]);
```
___
**3. API Routes**
```/app/Http/routes.php``` файл
```
use Illuminate\Http\Request;
$app->group(['prefix' => 'path/to/folder/public'], function () use ($app) {
	$app->get('/vehicle', function () use ($app) {
		return [
			'data' => \DB::table('vehicles')->orderby('created_at', 'desc')->get(),
		];
	});
	$app->post('/vehicle', function (Request $request) use ($app) {
		$data = [
			'uid' => $request->input('uid'),
			'manufacturer' => $request->input('manufacturer'),
			'model' => $request->input('model'),
			'year' => $request->input('year'),
		];
		$id = \DB::table('vehicles')->insertGetId($data);
		$model = \DB::table('vehicles')->where('id', $id)->first();
		return ['data' => $model];
	});
	$app->put('/vehicle/{id}', function (Request $request, $id) use ($app) {
		$data = [
			'uid' => $request->input('uid'),
			'manufacturer' => $request->input('manufacturer'),
			'model' => $request->input('model'),
			'year' => $request->input('year'),
		];
		\DB::table('vehicles')->where('id', $id)->update($data);
		$model = \DB::table('vehicles')->where('id', $id)->first();
		return ['data' => $model];
	});
	$app->delete('/vehicle/{id}', function (Request $request, $id) use ($app) {
		\DB::table('vehicles')->where('id', $id)->delete();
		return ['data' => $id];
	});
});
```
___
**Github Angular2 - 6. Http:** https://github.com/felagund18/lessons/tree/master/angular2/6-http

**Github Lumen API:** https://github.com/felagund18/lessons/tree/master/api/auto-rent

**Heroku:** https://ebulan-angular2-autorent.herokuapp.com/

**Facebook:** https://www.facebook.com/ebulanforum

**Web site:** https://www.ebulan.com/d/209-angular-6-http-api