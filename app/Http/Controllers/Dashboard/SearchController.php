<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dashboard\Category;
use App\Models\Dashboard\Subcategory;
use App\Models\Dashboard\Item;

class SearchController extends Controller
{
    //
    public function search(Request $request){
        $categories = Category::where('name','Like', '%'.$request->search.'%')->get();
        $subcategories = Subcategory::where('name','Like', '%'.$request->search.'%')->get();
        $items = Item::where('name','Like', '%'.$request->search.'%')->get();
        return view('dashboard.search')->with('categories',$categories)->with('subcategories',$subcategories)->with('items',$items);
    }

    public function sitesearch(Request $request){

        $items = Item::where('name','Like', '%'.$request->search.'%')->get();
        return view('site.search')->with('items',$items);
    }
}
