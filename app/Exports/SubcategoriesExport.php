<?php

namespace App\Exports;

use App\Models\Dashboard\Subcategory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class SubcategoriesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Subcategory::all();
    }

    public function headings(): array
    {
        return ["ID","Category_id", "Subcategory name", "image", "Created_at", "Updated_at"];
    }
}
