<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        echo("done1");
    }
    public function create(){
        return view('admin.product.index');
    }
}
