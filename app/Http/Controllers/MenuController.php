<?php

namespace App\Http\Controllers;

use App\Components\MenuRecusive;
use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    private $menuRecusive;

    public function __construct(MenuRecusive $menuRecusive, Menu $menu)
    {
        $this->menuRecusive = $menuRecusive;
        $this->menu = $menu;

    }

    public function index()
    {
        $menus = $this->menu->paginate(10);
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        $optionSelect = $this->menuRecusive->menuRecusiveAdd();
        return view('menus.add', compact('optionSelect'));

    }

    public function store(Request $request)
    {
        $this->menu->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str_slug($request->name)
        ]);

        return redirect()->route('menus.index');

    }

    public function edit($id)
    {
        $menuFind = $this ->menu->find($id);
        $optionSelectIdParent = $this->menuRecusive->menuRecusiveEdit($menuFind->parent_id);
        return view('menus.edit', compact('menuFind','optionSelectIdParent'));
    }


    public function update($id,Request $request)
    {
        $this ->menu->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str_slug($request ->name)
        ]);

        return redirect()->route('menus.index');

    }
}
