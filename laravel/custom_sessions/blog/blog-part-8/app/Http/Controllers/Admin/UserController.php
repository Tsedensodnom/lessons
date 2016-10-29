<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends BaseController
{
    public $pageTitle = 'Хэрэглэгч';
    public $secondTitle = 'Хэрэглэгчийн жагсаалт';
    public $createTitle = 'Шинэ хэрэглэгч бүртгэх';
    public $updateTitle = 'Хэрэглэгчийн мэдээлэл засах';
    public $columns = [
        'id' => [
            'label' => 'Дугаар',
        ],
        'name' => [
            'label' => 'Хэрэглэгчийн нэр'
        ],
        'email' => [
            'label' => 'Имейл'
        ],
        'created_at' => [
            'label' => 'Үүсгэсэн'
        ],
    ];
    public $fields = [
        'name' => [
            'label' => 'Хэрэглэгчийн нэр',
            'type' => 'text',
        ],
        'email' => [
            'label' => 'Имейл',
            'type' => 'text',
        ],
        'password' => [
            'label' => 'Нууц үг',
            'type' => 'password',
            'ignore_empty' => true,
            'hashable' => true,
        ],
        'password_confirmation' => [
            'label' => 'Нууц үг /Давтах/',
            'type' => 'password',
            'ignore_empty' => true,
            'purgeable' => true,
        ],
    ];
    public $modelClass = '\App\User';
    public $urlName = 'admin/user';
}
