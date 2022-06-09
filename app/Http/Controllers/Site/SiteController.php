<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Models\Dashboard\Category;
use App\Models\Dashboard\Subcategory;

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

    public function subcategories($id)
    {
        $subcategories = Subcategory::where('category_id',$id)->get();
        return view('site.products.type')->with('subcategories',$subcategories);

    }
}
