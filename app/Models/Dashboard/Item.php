<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory; use SoftDeletes;

    protected $fillable = [
        'name', 'specifications', 'subcategory_id'
    ];

    public function item_images()
    {
        return $this->hasMany(ItemImage::class);
    }

    public function item_datasheet()
    {
        return $this->hasOne(ItemDatasheet::class);
    }

    public function item_usermanual()
    {
        return $this->hasOne(ItemUsermanual::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
