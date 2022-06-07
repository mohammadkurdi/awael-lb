<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Dashboard\Subcategory;
use App\Models\Dashboard\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Subcategory\StoreRequest;
use App\Http\Requests\Subcategory\UpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Exports\SubcategoriesExport;
use App\Exports\SubcategoriesItemsExport;
use Maatwebsite\Excel\Facades\Excel;


class SubcategoryController extends Controller
{

    public function index()
    {
        // view all the Subcategory
        if((Auth::user())->ability('admin|dataEntry|readOnly', 'subcategories-read')){
            $subcategories = Subcategory::select('*')->paginate(10);
            return view('dashboard.subcategories.index')->with('subcategories',$subcategories);
        }
        else {
            return view('dashboard.permission_denied');
        }
    }


    public function create()
    {
        // create new Subcategory
        if((Auth::user())->ability('admin|dataEntry', 'subcategories-create')){
            $categories = Category::all();
            return view('dashboard.subcategories.create')->with('categories',$categories);
        }
        else {
            return view('dashboard.permission_denied');
        }
    }


    public function store(StoreRequest $request)
    {
        // store new Subcategory
        $image = $request->image;
        $newImage = time() . $image->getClientOriginalName();
        $image->move('uploads/subcategories', $newImage);

        $Subcategory = Subcategory::create([
            'name'        =>  $request->name,
            'image'       =>  'uploads/subcategories/' . $newImage,
            'category_id' =>  $request->category_id,
        ]);
        return redirect()->route('subcategory.index');
    }


    public function edit($id)
    {
         // show category
         if((Auth::user())->ability('admin|dataEntry', 'subcategories-edit')){

            $categories = Category::all();
            $Subcategory = Subcategory::find($id);
            if($Subcategory == null){
                return redirect()->back();
            }
            return view('dashboard.subcategories.edit')->with('Subcategory',$Subcategory)->with('categories',$categories);
        }
        else {
            return view('dashboard.permission_denied');
        }
    }


    public function update(UpdateRequest $request, $id)
    {
        // update Subcategory
        $Subcategory = Subcategory::find($id);
        if($request->has('image')){
            @unlink($Subcategory->image);
            $image = $request->image;
            $newImage = time().$image->getClientOriginalName();
            $image->move('uploads/subcategories',$newImage);
            $Subcategory->image = 'uploads/subcategories/'.$newImage;
        }
        $Subcategory->name = $request->name;
        $Subcategory->category_id = $request->category_id;
        $Subcategory->save();

        return redirect()->back();
    }


    public function destroy($id)
    {
        // delete Subcategory
        if((Auth::user())->ability('admin|dataEntry', 'subcategories-delete')){

            $Subcategory = Subcategory::find($id);
            if($Subcategory == null){
                return redirect()->back()->withErrors("There is no such Subcategory");
            }
            $Subcategory->delete($id);
            return redirect()->back();
        }
        else {
            return view('dashboard.permission_denied');
        }
    }

    public function export()
    {
        return Excel::download(new SubcategoriesExport , 'Subcategories.xlsx');
    }

    public function exportItems($id)
    {
        return Excel::download(new SubcategoriesItemsExport($id) , 'Subcategories.xlsx');
    }
}
