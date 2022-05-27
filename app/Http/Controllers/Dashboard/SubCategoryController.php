<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Dashboard\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategory\StoreRequest;
use App\Http\Requests\SubCategory\UpdateRequest;

class SubCategoryController extends Controller
{

    public function index()
    {
        // view all the subcategory
        $subcategories = SubCategory::all();
        return view('dashboard.subcategories.index')->with('subcategories',$subcategories);
    }


    public function create()
    {
        // create new subcategory
        return view('dashboard.subcategories.create');
    }


    public function store(StoreRequest $request)
    {
        // store new subcategory
        $image = $request->image;
        $newImage = time() . $image->getClientOrginalName();
        $image->move('uploads/subcategories', $newImage);

        $subcategory = SubCategory::create([
            'name'        =>  $request->name,
            'image'       =>  'uploads/subcategories/' . $newImage,
            'category_id' =>  $request->category_id,
        ]);
        return redirect()->route('subcategory.index');
    }


    public function edit($id)
    {
         // show category
         $subcategory = SubCategory::find($id);
         if($subcategory == null){
            return redirect()->back();
        }
        return view('dashboard.subcategories.edit')->with('subcategory',$subcategory);
    }


    public function update(UpdateRequest $request, $id)
    {
        // update subcategory
        $subcategory = SubCategory::find($id);
        if($request->has('image')){
            $image = $request->image;
            $newImage = time().$image->getClientOriginalName();
            $image->move('uploads/subcategories',$newImage);
            $subcategory->image = 'uploads/subcategories/'.$newImage;
        }
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category_id;

        return redirect()->back();
    }


    public function destroy($id)
    {
        // delete subcategory
        $subcategory = SubCategory::find($id);
        if($subcategory == null){
            return redirect()->back()->withErrors("There is no such subcategory");
        }
        $subcategory->delete($id);
        return redirect()->back();
    }
}
