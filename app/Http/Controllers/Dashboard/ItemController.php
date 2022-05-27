<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Dashboard\Item;
use App\Models\Dashboard\ItemImage;
use App\Models\Dashboard\ItemFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Item\StoreRequest;
use App\Http\Requests\Item\UpdateRequest;

class ItemController extends Controller
{

    public function index()
    {
        // view all the items
        $items = Item::all();
        return view('dashboard.items.index')->with('items',$items);
    }

    public function usersTrashed()
    {
        // view only deleted items
        $items = Item::onlyTrashed()->get();
        return view('dashboard.items.trashed')->with('items',$items);
    }

    public function create()
    {
        // create new item
        return view('dashboard.items.create');    }


    public function store(StoreRequest $request)
    {
        // store new item
        $item = Item::create([
            'name'     =>  $request->name,
            'specifications'    =>  $request->specifications,
            'sub_category_id'   =>  $request->sub_category_id
        ]);

        $item = Item::latest()->first();
        foreach ($request->images as $image) {
            $newImage = time() . $image->getClientOrginalName();
            $image->move('uploads/items', $newImage);
            $itemimage = ItemImage::create([
                'item_id'  =>   $item->id,
                'image'    =>  'uploads/items/' . $newImage,
            ]);
        }

        return redirect()->route('item.index');
        }


    public function show(Item $item)
    {
        //
    }


    public function edit(Item $item)
    {
        //
    }


    public function update(Request $request, Item $item)
    {
        //
    }


    public function destroy(Item $item)
    {
        //
    }
}
