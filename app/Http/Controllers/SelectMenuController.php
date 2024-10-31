<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Category;
use App\Models\User;

class SelectMenuController extends Controller
{
    
    //Fetch all categories to user dashboard
    public function showCategories()
    {
        $categories = Category::all();
        $categories = Category::orderBy('created_at', 'desc')->get();
        // Fetch categories from the database
        return view('menu', ['categories' => $categories]);
    }

    //Fetch Menus all first by default
    public function showMenu()
    {
        $categories = Category::all();
        // Fetch all items initially, or based on a default category
        $menuItems = Menu::orderby('created_at', 'desc')->get(); //Sort the Menu Items in descending order
        // Convert the image data to a base64 string for each menu item
        foreach ($menuItems as $item) {
            $item->image_data = 'data:image/jpeg;base64,' . base64_encode($item->image);
        }
        return view('menu', compact('categories', 'menuItems'));
    }
// Fetch menus based on the selected category
public function fetchMenuItems(Request $request)
{
    // Fetch menu items, optionally filtering by category name if provided
    if ($request->has('categoryName')) {
        $menuItems = Menu::where('category', $request->categoryName)
            ->orderBy('created_at', 'desc')
            ->get();
    } else {
        $menuItems = Menu::orderBy('created_at', 'desc')->get();
    }

    // Convert the image data to a base64 string for each menu item (if images are included)
    $menuItemsArray = $menuItems->map(function ($item) {
        return [
            'id' => $item->id,
            'name' => $item->name,
            'description' => $item->description,
            'price' => $item->price,
            'category' => $item->category,
            'image_data' => $item->image ? 'data:image/jpeg;base64,' . base64_encode($item->image) : null,
            'created_at' => $item->created_at,
            'updated_at' => $item->updated_at,
        ];
    })->toArray();

    // Return the menu items as a JSON response
    return response()->json($menuItemsArray);
}

}
