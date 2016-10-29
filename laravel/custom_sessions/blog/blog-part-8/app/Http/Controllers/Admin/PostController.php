<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostController extends BaseController
{
    public $pageTitle = 'Мэдээ мэдээлэл';
    public $secondTitle = 'Мэдээний жагсаалт';
    public $createTitle = 'Шинэ мэдээ оруулах';
    public $updateTitle = 'Мэдээ засах';
    public $columns = [
        'id' => [
            'label' => 'Дугаар',
        ],
        'title' => [
            'label' => 'Гарчиг'
        ],
        'created_at' => [
            'label' => 'Үүсгэсэн'
        ],
    ];
    public $fields = [
        'categories' => [
            'label' => 'Ангилал',
            'type' => 'relation',
            'model' => '\App\Category',
            'select' => ['id', 'name'],
        ],
        'title' => [
            'label' => 'Гарчиг',
            'type' => 'text',
        ],
        'content' => [
            'label' => 'Мэдээний агуулга',
            'type' => 'richeditor',
        ],
    ];
    public $modelClass = '\App\Post';
    public $urlName = 'admin/post';
}
