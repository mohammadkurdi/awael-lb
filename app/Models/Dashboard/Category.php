<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'image',
    ];

    public function sub_categories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
