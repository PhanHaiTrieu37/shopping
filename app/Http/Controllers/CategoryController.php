<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\This;
use App\Components\Recusive;

class CategoryController extends Controller
{
    private $category;
    public function __construct(Category $category)
    {
        $this -> category = $category;
    }

    public function getCategory($parentId)
    {
        $data = $this ->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive ->categoryRecusive($parentId);
        return $htmlOption;
    }

    public function create()
    {
        $htmlOption = $this ->getCategory($parentId = '');
        return view('category.add', compact('htmlOption'));

    }

    public function edit($id)
    {
        $category = $this ->category->find($id);
        $htmlOption = $this ->getCategory($category->parent_id);
        return view('category.edit', compact('category', 'htmlOption'));

    }

    public function update($id,Request $request)
    {
        $this ->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str_slug($request ->name)
        ]);

        return redirect()->route('categories.index');

    }

    public function delete($id)
    {
        $this ->category->find($id)->delete();
        return redirect()->route('categories.index');
    }

    public function store(Request $request)
    {
        $this ->category->create([
           'name' => $request->name,
           'parent_id' => $request->parent_id,
            'slug' => str_slug($request ->name)
        ]);

        return redirect()->route('categories.index');
    }

    public function index()
    {
        $categories = $this ->category->latest()->paginate(5);
        return view('category.index', compact('categories'));
    }
}
