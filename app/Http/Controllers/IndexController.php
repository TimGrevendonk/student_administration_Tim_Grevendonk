<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        $dataList = [
            'some data in IndexController.php',
            'also made a view called index (this page) where i route to',
            'this route goes via IndexController.php'
        ];
        return view('index', [
            'dataList' => $dataList
        ]);
    }
}
