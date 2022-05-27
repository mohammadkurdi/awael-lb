<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory; use SoftDeletes;

    protected $fillable = [
        'name', 'specifications', 'sub_category_id'
    ];

    public function item_images()
    {
        return $this->hasMany(ItemImage::class);
    }

    public function item_files()
    {
        return $this->hasMany(ItemFile::class);
    }

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
