<?php

namespace App\Exports;

use App\Models\Dashboard\Subcategory;
use App\Models\Dashboard\Item;
use Maatwebsite\Excel\Concerns\FromCollection;

class SubcategoriesItemsExport implements FromCollection
{

    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function collection()
    {
        $items = Item::where('subcategory_id', $this->id)->get();

        return $items;
    }

    public function headings(): array
    {
        return ["ID","Subategory_id", "Product name", "Specifications", "Created_at", "Updated_at"];
    }
}
