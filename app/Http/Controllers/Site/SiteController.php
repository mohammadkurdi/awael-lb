<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Models\Dashboard\Category;
use App\Models\Dashboard\Subcategory;
use App\Models\Dashboard\Item;
use App\Models\Dashboard\ItemImage;
use App\Models\Dashboard\ItemDatasheet;
use App\Models\Dashboard\ItemUsermanual;

class SiteController extends Controller
{
    //

    public function localization($locale)
    {
        App::setLocale($locale);
        Session::put("locale", $locale);
        return redirect()->back();
    }

    public function index()
    {
        return view('site.index');
    }

    public function about()
    {
        return view('site.about');
    }

    public function contact()
    {
        return view('site.contact');

    }

    public function categories()
    {
        $categories = Category::all();
        return view('site.products.index')->with('categories',$categories);

    }

    public function subcategories($id,$name)
    {
        $subcategories = Subcategory::where('category_id',$id)->get();
        return view('site.products.subcategories')->with('subcategories',$subcategories)->with('name',$name);

    }

    public function products($id,$name)
    {
        $subcategory = Subcategory::find($id);
        $items = Item::where('subcategory_id',$id)->get();

        return view('site.products.products')->with('items',$items)->with('subcategory',$subcategory);
    }

    public function product($id)
    {
        $item = Item::find($id);
        $item_images = ItemImage::where('item_id',$id)->get();
        $first_image = $item_images->slice(1,count($item_images));
        $item_data = ItemDatasheet::where('item_id',$id)->first();
        $item_manual = ItemUsermanual::where('item_id',$id)->first();
        return view('site.products.view')->with('item',$item)->with('item_data',$item_data)->with('item_manual',$item_manual)->with('item_images',$item_images);
    }
}
