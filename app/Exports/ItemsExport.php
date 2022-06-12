<?php

namespace App\Exports;

use App\Models\Dashboard\Item;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ItemsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Item::all();
    }

    public function headings(): array
    {
        return ["ID","Subategory_id", "Product name", "Specifications", "Description", "Created_at", "Updated_at"];
    }
}
