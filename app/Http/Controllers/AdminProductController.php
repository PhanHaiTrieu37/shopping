<?php

namespace App\Http\Controllers;

use App\Category;
use App\Components\Recusive;
use App\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{

    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        return view('admin.product.index');
    }

    public function create()
    {
        $htmlOption = $this ->getCategory($parentId = '');
        return view('admin.product.add', compact('htmlOption'));

    }

    public function getCategory($parentId)
    {
        $data = $this ->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive ->categoryRecusive($parentId);
        return $htmlOption;
    }

    public function store(Request $request)
    {
//        $path = Storage::putFileAs('feature_path_img', $request->file('feature_path_img'), $request->user()->id);
//        $path = $request->file('feature_path_img')->store('product');

//        return view('admin.product.index');
        return redirect()->route('product.index');

    }
}
