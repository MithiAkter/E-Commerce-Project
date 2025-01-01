<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        echo("done1");
    }
    public function create(){
        $category=DB::table('categories')->get();
        $brand=DB::table('brands')->get();
        return view('admin.product.index', compact('category','brand'));
    }
}
