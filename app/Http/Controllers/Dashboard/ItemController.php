<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Dashboard\Item;
use App\Models\Dashboard\Category;
use App\Models\Dashboard\SubCategory;
use App\Models\Dashboard\ItemImage;
use App\Models\Dashboard\ItemDatasheet;
use App\Models\Dashboard\ItemUsermanual;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Item\StoreRequest;
use App\Http\Requests\Item\UpdateRequest;

class ItemController extends Controller
{

    public function index()
    {
        // view all the items
        $items = Item::select('*')->paginate(10);;
        $items_images = ItemImage::all();
        return view('dashboard.items.index')->with('items',$items)->with('items_images',$items_images);
    }

    public function itemsTrashed()
    {
        // view only deleted items
        $items = Item::onlyTrashed()->get();
        return view('dashboard.items.trashed')->with('items',$items);
    }

    public function create()
    {
        // create new item
        $categories = Category::all();
        $subcategories = SubCategory::all();
        return view('dashboard.items.create')->with('categories',$categories)->with('subcategories',$subcategories);
    }


    public function store(StoreRequest $request)
    {
        // store new item
        $item = Item::create([
            'name'     =>  $request->name,
            'specifications'    =>  $request->specifications,
            'subcategory_id'   =>  $request->subcategory_id
        ]);

        // store all item images
        $images=$request->file('images');
        foreach ($images as $image) {
            $newImage = time() . $image->getClientOriginalName();
            $image->move('uploads/items/images', $newImage);
            $itemimage = ItemImage::create([
                'item_id'  =>   $item->id,
                'image'    =>  'uploads/items/images/' . $newImage,
            ]);
        }

        // store item datasheet
        $data = $request->file('data');
        $newData = time() . $data->getClientOriginalName();
        $data->move('uploads/items/files/datasheets', $newData);
        $itemdata = ItemDatasheet::create([
            'item_id' => $item->id,
            'file'    => 'uploads/items/files/datasheets/' . $newData,
        ]);

        // store item usermanual
        $manual = $request->file('manual');
        $newManual = time() . $manual->getClientOriginalName();
        $manual->move('uploads/items/files/usermanuals', $newManual);
        $itemmanual = ItemUsermanual::create([
            'item_id' => $item->id,
            'file'    => 'uploads/items/files/usermanuals/' . $newManual,
        ]);

        return redirect()->route('item.index');
        }


    public function show($id)
    {
        // show item
        $item = Item::find($id);
        $itemimages = ItemImage::where('item_id',$id)->get();
        $itemdata = ItemDatasheet::where('item_id',$id)->first();
        $itemmanual = ItemUsermanual::where('item_id',$id)->first();
        return view('dashboard.items.show')->with('item',$item)->with('itemimages',$itemimages)->with('itemdata',$itemdata)->with('itemmanual',$itemmanual);
    }


    public function edit(Item $item)
    {
         // edit category
         $item = Item::find($id);
         if($category == null){
            return redirect()->back();
        }
        return view('dashboard.items.edit')->with('item',$item);
    }


    public function update(UpdateRequest $request, $id)
    {
        // update category
        $item = Item::find($id);

        $item->name = $request->name;
        $item->specifications =  $request->specifications;
        $item->subcategory_id =  $request->subcategory_id;
        $item->save();

        if($request->has('images')){
            $itemimages = ItemImage::where('item_id',$item->id);
            foreach($itemimages as $itemimage){
            $path = $itemimage->image;
            @unlink($path);
            $itemimage->delete();
            }
            foreach ($request->images as $image) {
                $newImage = time() . $image->getClientOriginalName()();
                $image->move('uploads/items/images', $newImage);
                $itemimage = ItemImage::create([
                    'item_id'  =>   $item->id,
                    'image'    =>  'uploads/items/images/' . $newImage,
                ]);
        }
    }
        if($request->has('data')){
            $itemdata = ItemDatasheet::where('item_id',$item->id);
            $path = $itemdata->file;
            @unlink($path);
            $itemdata->delete();

            $data = $request->data;
            $newData = time() . $data->getClientOriginalName()();
            $data->move('uploads/items/files/datasheets', $newData);
            $itemdata = ItemDatasheet::create([
                'item_id' => $item->id,
                'file'    => 'uploads/items/files/datasheets/' . $newData,
            ]);
        }

        if($request->has('manual')){
            $itemmanual = ItemUsermanual::where('item_id',$item->id);
            $path = $itemmanual->file;
            @unlink($path);
            $itemmanual->delete();

            $manual = $request->manual;
            $newManual = time() . $manual->getClientOriginalName()();
            $manual->move('uploads/items/files/datasheets', $newData);
            $itemmanual = ItemUsermanual::create([
                'item_id' => $item->id,
                'file'    => 'uploads/items/files/datasheets/' . $newManual,
            ]);
        }
        return redirect()->back();
    }


    public function destroy($id)
    {
        // soft delete user
        $item = Item::find($id);
        if($item == null){
            return redirect()->back()->withErrors("There is no such user");
        }
        $item->delete($id);
        return redirect()->back();
    }


    public function hdelete($id)
    {
        // hard delete user
        $item = Item::withTrashed()->where('id',$id)->first();
        $itemimages = ItemImage::where('item_id',$item->id);
        foreach($itemimages as $itemimage){
            $itemimage->delete();
        }
        $itemdata = ItemDatasheet::where('item_id',$item->id);
        $itemdata->delete();
        $itemmanual = ItemUsermanual::where('item_id',$item->id);
        $itemmanual->delete();
        $item->forceDelete();
        return redirect()->back();
    }


    public function restore($id)
    {
        // restore deleted user
        $item = Item::withTrashed()->where('id',$id)->first();
        $item->restore();
        return redirect()->back();
    }
}
