<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\Dashboard\Category;
use App\Models\Dashboard\Subcategory;
use App\Models\Dashboard\Item;
use App\Models\User;
use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
    //

    public function index()
    {
        // view all the category
        $categories = Category::count();
        $subcategories = Subcategory::count();
        $items = Item::count();
        $users = User::count();
        return view('dashboard.index')->with('categories',$categories)->with('subcategories',$subcategories)->with('items',$items)->with('users',$users);
    }
}
