<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends BaseController
{
    public $pageTitle = 'Ангилал';
    public $secondTitle = 'Ангилалийн хүснэгт';
    public $createTitle = 'Ангилал нэмэх';
    public $updateTitle = 'Ангилал засах';
    public $columns = [
        'id' => [
            'label' => 'Дугаар',
        ],
        'name' => [
            'label' => 'Нэр'
        ],
        'created_at' => [
            'label' => 'Үүсгэсэн'
        ],
    ];
    public $fields = [
        'name' => [
            'label' => 'Нэр',
            'type' => 'text',
        ],
    ];
    public $modelClass = '\App\Category';
    public $urlName = 'admin/category';
}
