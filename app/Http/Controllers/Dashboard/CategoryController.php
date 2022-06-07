<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Dashboard\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Exports\CategoriesExport;
use Maatwebsite\Excel\Facades\Excel;

class CategoryController extends Controller
{

    public function index()
    {
        // view all the category
        if((Auth::user())->ability('admin|dataEntry|readOnly', 'categories-read')){
            $categories = Category::select('*')->paginate(10);
            return view('dashboard.categories.index')->with('categories',$categories);
        }
        else {
           return view('dashboard.permission_denied');
        }
    }


    public function create()
    {
        // create new category
        if((Auth::user())->ability('admin|dataEntry', 'categories-create')){

            return view('dashboard.categories.create');
        }
        else {
            return view('dashboard.permission_denied');
        }
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
        if((Auth::user())->ability('admin|dataEntry', 'categories-edit')){

            $category = Category::find($id);
            if($category == null){
                return redirect()->back();
            }
            return view('dashboard.categories.edit')->with('category',$category);
        }
        else {
            return view('dashboard.permission_denied');
        }
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
        if((Auth::user())->ability('admin|dataEntry', 'categories-delete')){

            $category = Category::find($id);
            if($category == null){
                return redirect()->back()->withErrors("There is no such category");
            }
            $category->delete($id);
            return redirect()->back();
        }
        else {
            return view('dashboard.permission_denied');
        }
    }

    public function export()
    {
        return Excel::download(new CategoriesExport , 'Categories.xlsx');
    }
}
