# Laravel + The PHP League Glide

Зургийн хэмжээ урт өргөнийг нь өөрчлөх(crop, resize) шаардлага маш их гардаг. Энэ асуудлийгд Glide санг ашиглан хялбар шийдэж болно.

1. Glide суулгах
```
composer require league/glide-laravel
```
коммандаар ```Laravel```-д зориулсан `Glide``` санг суулгана

2. Route үүсгэх
```
Route::get('/img/{path}', function() {
     $server = ServerFactory::create([
        'response' => new LaravelResponseFactory(app('request')),
        'source' => $filesystem->getDriver(),
        'cache' => $filesystem->getDriver(),
        'cache_path_prefix' => '.cache',
        'base_url' => 'img',
    ]);

    return $server->getImageResponse($path, request()->all());
})->where('path', '.*');
```

```http://localhost/img/{path}``` хаягт байгаа ```path``` хувьсагч нь тухайн зурагны зам нь юм. Энэ замыг ```storage/app``` хавтаснаас эхлэн тооцон гаргана.

3. Туршилт
```
php artisan serve
```

Туршилтийн зурагнуудаа ```storage/app``` хавтсанд хуулж өгнө, энэ туршилтийн хувьд ```storage/app/public``` хавтсанд хуулсан байгаа.

1. Зурагны хэмжээг 100x100 болгон харах ```http://localhost/img/public/image1.jpg?w=100&h100&fit=crop```
2. Зургийг зөвхөн 200 өргөнтэй болгох ```http://localhost/img/public/image1.jpg?w=200```
3. Зургийг зөвхөн 300 өндөртэй болгох ```http://localhost/img/image1.jpg?h=300```