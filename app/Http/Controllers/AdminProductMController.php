<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminProductMController extends Controller
{
    public function index()
    {
        return view('admin.product.index');
    }
}
