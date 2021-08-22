<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function listProduct(){
        return view('backend.products.admin_all_product');
    }
    
}
