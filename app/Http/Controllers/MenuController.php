<?php

// app/Http/Controllers/MenuController.php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::orderby('created_at', 'desc')->get();//Sort the Menu Items in descending order
        return view('admin.menu.index', compact('menus'));
    }

    public function create()
    {
        // Fetch all categories from the database
         $categories = Category::all();
        // Pass categories to the view
       return view('admin.menu.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:3000', // Validate image
        ]);

        $menu = new Menu();
        $menu->name = $request->name;
        $menu->description = $request->description;
        $menu->price = $request->price;
        $menu->category = $request->category;

        if ($request->hasFile('image')) {
            $menu->image = file_get_contents($request->file('image')->getRealPath());
        }

        $menu->save();

        return redirect()->route('admin.menu')->with('success', 'Menu item created successfully.');
    }

    public function edit(Menu $menu)
    {
        return view('admin.menu.edit', compact('menu'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);

        $menu = Menu::findOrFail($id);
        $menu->name = $request->name;
        $menu->description = $request->description;
        $menu->price = $request->price;
        $menu->category = $request->category;

        if ($request->hasFile('image')) {
            $menu->image = file_get_contents($request->file('image')->getRealPath());
        }

        $menu->save();

        return redirect()->route('admin.menu')->with('success', 'Menu item updated successfully.');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('admin.menu')->with('success', 'Menu item deleted successfully.');
    }
}

