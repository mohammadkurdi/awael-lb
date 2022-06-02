<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Dashboard\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;

class CategoryController extends Controller
{

    public function index()
    {
        // view all the category
        $categories = Category::select('*')->paginate(10);
        return view('dashboard.categories.index')->with('categories',$categories);
    }


    public function create()
    {
        // create new category
        return view('dashboard.categories.create');
    }


    public function store(StoreRequest $request)
    {
        // store new category
        $image = $request->image;
        $newImage = time() . $image->getClientOriginalName();
        $image->move('uploads/categories', $newImage);

        $category = Category::create([
            'name'     =>  $request->name,
            'image'    =>  'uploads/categories/' . $newImage,
        ]);
        return redirect()->route('category.index');
    }


    public function edit($id)
    {
         // edit category
         $category = Category::find($id);
         if($category == null){
            return redirect()->back();
        }
        return view('dashboard.categories.edit')->with('category',$category);
    }


    public function update(UpdateRequest $request, $id)
    {
        // update category
        $category = Category::find($id);
        if($request->has('image')){
            @unlink($category->image);
            $image = $request->image;
            $newImage = time().$image->getClientOriginalName();
            $image->move('uploads/categories',$newImage);
            $category->image = 'uploads/categories/'.$newImage;
        }
        $category->name = $request->name;
        $category->save();

        return redirect()->back();
    }


    public function destroy($id)
    {
        // delete category
        $category = Category::find($id);
        if($category == null){
            return redirect()->back()->withErrors("There is no such category");
        }
        $category->delete($id);
        return redirect()->back();
    }
}
